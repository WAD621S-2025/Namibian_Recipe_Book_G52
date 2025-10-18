<?php
require_once __DIR__ . '/../models/Recipe.php';

class RecipeController
{
    private $pdo;
    private $model;

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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $category = trim($_POST['category'] ?? '');
            $region = trim($_POST['region'] ?? '');
            $instructions = trim($_POST['instructions'] ?? '');
            $imagePath = '';

            if (empty($name)) {
                $errors[] = 'Recipe name is required.';
            }
            if (empty($instructions)) {
                $errors[] = 'Instructions are required.';
            }

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../assets/uploads/recipes/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $imagePath = 'assets/uploads/recipes/' . $fileName;
                } else {
                    $errors[] = 'Failed to upload image.';
                }
            }

            if (empty($errors)) {
                if ($this->model->insert($name, $instructions, $category, $region, $imagePath)) {
                    $success = 'Recipe added successfully!';
                    // Clear form
                    $_POST = [];
                } else {
                    $errors[] = 'Failed to add recipe.';
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

    // Show single recipe
    public function singleRecipe($id)
    {
        $recipe = $this->model->getById($id);
        include __DIR__ . '/../pages/recipes/recipe.php';
    }

    // Edit recipe
    public function edit($id)
    {
        $recipe = $this->model->getById($id);
        $errors = [];
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $category = trim($_POST['category'] ?? '');
            $region = trim($_POST['region'] ?? '');
            $instructions = trim($_POST['instructions'] ?? '');
            $imagePath = $recipe['ImagePath'] ?? '';

            if (empty($name)) {
                $errors[] = 'Recipe name is required.';
            }
            if (empty($instructions)) {
                $errors[] = 'Instructions are required.';
            }

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../assets/uploads/recipes/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $imagePath = 'assets/uploads/recipes/' . $fileName;
                } else {
                    $errors[] = 'Failed to upload image.';
                }
            }

            if (empty($errors)) {
                if ($this->model->update($id, $name, $instructions, $category, $region, $imagePath)) {
                    $success = 'Recipe updated successfully!';
                    $recipe = $this->model->getById($id); // Refresh data
                } else {
                    $errors[] = 'Failed to update recipe.';
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
