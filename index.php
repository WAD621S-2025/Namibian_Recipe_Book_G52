<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Namibian Recipe Book</title>
</head>
<body>
    <h1>Namibian Recipes Book</h1>

<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/shared/bootstrap.php';
require_once __DIR__ . '/controllers/RecipeController.php';
require_once __DIR__ . '/controllers/IngredientController.php';

// Controllers
$recipeController = new RecipeController($pdo);
$ingredientController = new IngredientController($pdo);

$page = $_GET['page'] ?? 'home';

// Header
include __DIR__ . '/shared/header.php';

switch ($page) {
    // Home
    case 'home':
        $recipeController->home();
        break;

    // Recipes
    case 'add-recipe':
        $recipeController->add();
        break;
    case 'all-recipes':
        $recipeController->showList();
        break;
    case 'search-recipes':
        $recipeController->search();
        break;
    case 'single-recipe':
        $recipeController->singleRecipe($_GET['id'] ?? null);
        break;
    case 'edit-recipe':
        $recipeController->edit($_GET['id'] ?? null);
        break;
    case 'delete-recipe':
        $recipeController->delete($_GET['id'] ?? null);
        break;

    // Ingredients
    case 'add-ingredient':
        $ingredientController->add();
        break;
    case 'list-ingredients':
        $ingredientController->showList();
        break;
    case 'single-ingredient':
        $ingredientController->singleIngredient($_GET['id'] ?? null);
        break;
    case 'edit-ingredient':
        $ingredientController->edit($_GET['id'] ?? null);
        break;
    case 'delete-ingredient':
        $ingredientController->delete($_GET['id'] ?? null);
        break;
    default:
        echo "<h2>404 - Page Not Found</h2>";
}

// Footer
include __DIR__ . '/shared/footer.php';
?>

</body>
</html>