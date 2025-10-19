<<<<<<< Updated upstream
<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/shared/bootstrap.php';
require_once __DIR__ . '/controllers/RecipeController.php';
require_once __DIR__ . '/controllers/IngredientController.php';
=======
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Namibian Recipe Book</title>
</head>

<body>
    <?php
    require_once __DIR__ . '/config.php';
    require_once __DIR__ . '/controllers/RecipeController.php';
    require_once __DIR__ . '/controllers/IngredientController.php';

    // Controllers
    $recipeController = new RecipeController($pdo);
    $ingredientController = new IngredientController($pdo);
>>>>>>> Stashed changes

    $page = $_GET['page'] ?? 'home'; //This renders the page based on the page parameter

    // Header
    include __DIR__ . '/shared/header.php';

    switch ($page) {
        // Home
        case 'home':
            $recipeController->home();
            break;

<<<<<<< Updated upstream
switch ($page) {
    // Home
    case 'home':
        include __DIR__ . '/pages/home.php';
        break;

    // Recipes
    case 'add-recipe':
        $recipeController->add();
        break;
    case 'list-recipes':
        $recipeController->showList();
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

    // Default
    default:
        echo "<h1>Welcome to Namibian Recipe Book</h1><p>Browse traditional recipes from Namibia.</p>";
        break;
}

// Footer
include __DIR__ . '/shared/footer.php';
=======
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
>>>>>>> Stashed changes
