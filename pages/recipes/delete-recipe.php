<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../controllers/RecipeController.php';

$id = $_GET['id'] ?? null;

// Create controller instance
$controller = new RecipeController($pdo);

// Include shared header & navigation
include_once __DIR__ . '/../shared/header.php';
include_once __DIR__ . '/../shared/nav.php';
?>

<main class="container" style="padding: 40px 20px;">
    <?php if ($id && $controller->delete($id)): ?>
        <div class="alert alert-success">
            Recipe deleted successfully!
        </div>
    <?php else: ?>
        <div class="alert alert-danger">
            Failed to delete recipe.
        </div>
    <?php endif; ?>

    <p>
        <a href="/pages/recipes/all-recipes.php" class="btn btn-primary">⬅ Back to All Recipes</a>
    </p>
</main>

<?php include_once __DIR__ . '/../shared/footer.php'; ?>