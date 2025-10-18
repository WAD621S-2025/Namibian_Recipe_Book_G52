<?php
class IngredientController
{
    private $pdo;
    private $ingredientModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        require_once __DIR__ . '/../models/Ingredient.php';
        $this->ingredientModel = new Ingredient($pdo);
    }

    // Display Add Ingredient Form & Handle POST
    public function add()
    {
        $message = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $quantity = trim($_POST['quantity'] ?? '');
            $unit = trim($_POST['unit'] ?? '');
            $recipeId = !empty($_POST['recipeId']) ? (int)$_POST['recipeId'] : null;

            // Validation
            if (empty($name)) {
                $error = "Name is required.";
            } elseif (!is_numeric($quantity) || $quantity <= 0) {
                $error = "Quantity must be a positive number.";
            } else {
                // Insert ingredient
                $inserted = $this->ingredientModel->insert($name, $quantity, $unit, $recipeId);
                if ($inserted) {
                    $message = "Ingredient added successfully!";
                    // Optionally, redirect to list page:
                    // header("Location: index.php?page=list-ingredients&status=added");
                    // exit;
                } else {
                    $error = "Failed to add ingredient. Please try again.";
                }
            }
        }

        include __DIR__ . '/../pages/Ingredient/add-ingredient.php';
    }

    public function showList()
    {
        $ingredients = $this->ingredientModel->getAll();
        $status = $_GET['status'] ?? '';
        include __DIR__ . '/../pages/Ingredient/all-ingredient.php';
    }

    public function singleIngredient($id)
    {
        if ($id) {
            $ingredient = $this->ingredientModel->getById($id);
            include __DIR__ . '/../pages/Ingredient/ingredient.php';
        } else {
            echo "<p>Ingredient not found.</p>";
        }
    }

    public function edit($id)
    {
        if ($id) {
            $ingredient = $this->ingredientModel->getById($id);
            include __DIR__ . '/../pages/Ingredient/edit-ingredient.php';
        } else {
            echo "<p>No ingredient selected to edit.</p>";
        }
    }

    public function delete($id)
    {
        if ($id) {
            $this->ingredientModel->delete($id);
            header("Location: index.php?page=list-ingredients&status=deleted");
            exit;
        } else {
            echo "<p>No ingredient selected to delete.</p>";
        }
    }
}
