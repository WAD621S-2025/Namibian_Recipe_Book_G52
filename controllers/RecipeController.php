<?php
require_once __DIR__ . '/../models/Recipe.php';

class RecipeController
{
    private $pdo;
    private $model;
    private $ingredientController;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->model = new Recipe($pdo);
    }

    // Show Add Form
    public function add()
    {
        $errors = [];
        $success = '';

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $category = $_POST['category'] ?? '';
            $region = $_POST['region'] ?? '';
            $instructions = $_POST['instructions'] ?? '';
            $imagePath = null;

            // Handle image upload
            if (!empty($_FILES['image']['name'])) {
                $targetDir = __DIR__ . '/../assets/uploads/recipes';
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $targetFile = $targetDir . $fileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $imagePath = $fileName;
                } else {
                    $errors[] = "Image upload failed.";
                }
            }

            // Simple validation
            if (empty($name) || empty($instructions)) {
                $errors[] = "Please fill in all required fields.";
            }

            // If no errors → Insert into DB
            if (empty($errors)) {
                $inserted = $this->model->insert($name, $instructions, $category, $region, $imagePath);
                if ($inserted) {
                    $success = "Recipe added successfully!";
                } else {
                    $errors[] = "Failed to add recipe.";
                }
            }
        }

        include __DIR__ . '/../pages/recipes/add-recipe.php';
    }

    // List all recipes
    public function showList()
    {
        $recipes = $this->model->getAll();
        include __DIR__ . '/../pages/recipes/all-recipes.php';
    }

    // Show home page with featured recipes
    public function home()
    {
        $featuredRecipes = $this->model->getFeatured(6);
        include __DIR__ . '/../pages/home.php';
    }

    // Search recipes
    public function search()
    {
        $searchTerm = $_GET['search'] ?? '';
        $recipes = $searchTerm ? $this->model->search($searchTerm) : $this->model->getAll();
        include __DIR__ . '/../pages/recipes/all-recipes.php';
    }

    // Show single recipe
    public function singleRecipe($id)
    {
        require_once __DIR__ . '/../models/Ingredient.php';

        // Fetch recipe
        $recipe = $this->model->getById($id);

        $ingredientModel = new Ingredient($this->pdo);
        $ingredients = $ingredientModel->getByRecipeId($id);

        include __DIR__ . '/../pages/recipes/recipe.php';
    }


    // Edit recipe
    public function edit($id)
    {
        $recipe = $this->model->getById($id);
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $category = $_POST['category'] ?? '';
            $region = $_POST['region'] ?? '';
            $instructions = $_POST['instructions'] ?? '';
            $imagePath = $recipe['ImagePath']; // Keep old image by default

            // Define upload directory
            $uploadDir = __DIR__ . '/../assets/uploads/recipes/';
            $relativeDir = 'assets/uploads/recipes/';

            // Ensure folder exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Handle image upload if new image is selected
            if (!empty($_FILES['image']['name'])) {
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    // Save relative path for database
                    $imagePath = $relativeDir . $fileName;
                } else {
                    $error = " Image upload failed. Check folder permissions or path.";
                }
            }

            // Update recipe if no errors
            if (!$error) {
                $updated = $this->model->update($id, $name, $instructions, $category, $region, $imagePath);

                if ($updated) {
                    $success = "Recipe updated successfully!";
                    $recipe = $this->model->getById($id);
                } else {
                    $error = " Failed to update recipe in the database.";
                }
            }
        }

        include __DIR__ . '/../pages/recipes/edit-recipe.php';
    }

    // Delete recipe
    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: index.php?page=all-recipes");
        exit;
    }
}
