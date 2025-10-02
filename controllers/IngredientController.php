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

    public function add()
    {
        include __DIR__ . '/../pages/Ingredient/add-ingredient.php';
    }

    public function showList()
    {
        $ingredients = $this->ingredientModel->getAll();
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
            header("Location: index.php?page=list-ingredients");
            exit;
        } else {
            echo "<p>No ingredient selected to delete.</p>";
        }
    }
}
