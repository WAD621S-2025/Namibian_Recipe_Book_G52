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
        include __DIR__ . '/../pages/recipes/add-recipe.php';
    }

    // List all recipes
    public function showList()
    {
        $recipes = $this->model->getAll();
        include __DIR__ . '/../pages/recipes/add-recipes.php';
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
