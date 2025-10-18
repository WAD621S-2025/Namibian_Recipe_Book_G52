<?php
include_once __DIR__ . '/../../shared/nav.php';
?>

<link rel="stylesheet" href="assets/css/recipe.css">

<?php if ($recipe): ?>
    <div class="recipe-detail">
        <div class="container">
            <!-- Recipe Header -->
            <div class="recipe-header">
                <div class="recipe-title-section">
                    <h1><?= htmlspecialchars($recipe['Name']) ?></h1>
                    <div class="recipe-meta">
                        <span class="category"><?= htmlspecialchars($recipe['Category']) ?></span>
                        <span class="region"><?= htmlspecialchars($recipe['Region']) ?></span>
                    </div>
                </div>
                <div class="recipe-actions">
                    <a href="?page=edit-recipe&id=<?= $recipe['RecipeID'] ?>" class="btn btn-secondary">Edit Recipe</a>
                    <a href="?page=delete-recipe&id=<?= $recipe['RecipeID'] ?>"
                        class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this recipe?')">Delete Recipe</a>
                </div>
            </div>

            <!-- Recipe  -->
            <div class="recipe-content">
                <div class="recipe-main">
                    <?php if (!empty($recipe['ImagePath'])): ?>
                        <div class="recipe-image">
                            <img src="<?= htmlspecialchars($recipe['ImagePath']) ?>" alt="<?= htmlspecialchars($recipe['Name']) ?>">
                        </div>
                    <?php endif; ?>

                    <div class="recipe-instructions">
                        <h2>Instructions</h2>
                        <div class="instructions-content">
                            <?= nl2br(htmlspecialchars($recipe['Instructions'])) ?>
                        </div>
                    </div>
                </div>
                <div class="recipe-sidebar">
                    <div class="recipe-info-card">
                        <h3>Recipe Information</h3>
                        <div class="info-item">
                            <strong>Category:</strong>
                            <span><?= htmlspecialchars($recipe['Category']) ?></span>
                        </div>
                        <div class="info-item">
                            <strong>Region:</strong>
                            <span><?= htmlspecialchars($recipe['Region']) ?></span>
                        </div>
                        <?php if (!empty($recipe['CreatedAt'])): ?>
                            <div class="info-item">
                                <strong>Added:</strong>
                                <span><?= date('F j, Y', strtotime($recipe['CreatedAt'])) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Ingredients -->
                    <div class="ingredients-card mb-4 p-3 border rounded bg-light">
                        <h3>Ingredients</h3>
                        <?php if (!empty($ingredients)): ?>
                            <ul class="list-unstyled">
                                <?php foreach ($ingredients as $ingredient): ?>
                                    <li>
                                        <?= htmlspecialchars($ingredient['Quantity']) . ' ' .
                                            htmlspecialchars($ingredient['Unit']) . ' ' .
                                            htmlspecialchars($ingredient['Name']) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No ingredients listed for this recipe.</p>
                        <?php endif; ?>
                    </div>
                    <div class="related-actions">
                        <h3>Quick Actions</h3>
                        <button href="?page=all-recipes" class="btn">Back to Recipes</button>
                        <button href="?page=add-recipe" class="btn">Add New Recipe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recipe Sidebar -->

    </div>
<?php else: ?>
    <div class="error-page">
        <div class="container">
            <h1>Recipe Not Found</h1>
            <p>The recipe you're looking for doesn't exist or has been removed.</p>
            <a href="?page=all-recipes" class="btn btn-primary">Back to Recipes</a>
        </div>
    </div>
<?php endif; ?>