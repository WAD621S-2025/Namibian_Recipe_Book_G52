<?php
include_once __DIR__ . '/../../shared/nav.php';
?>

<link rel="stylesheet" href="assets/css/all-recipes.css">

<div class="recipes-header">
    <div class="container">
        <h1>All Recipes</h1>
        <div class="header-actions">
            <a href="?page=add-recipe" class="btn btn-primary">Add New Recipe</a>
        </div>
    </div>
</div>

<!-- Search and Filter Section -->
<section class="search-section">
    <div class="container">
        <form method="GET" class="search-form">
            <input type="hidden" name="page" value="search-recipes">
            <div class="search-input-group">
                <input type="text" name="search" placeholder="Search recipes..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                <button type="submit" class="btn btn-search">Search</button>
            </div>
        </form>
    </div>
</section>

<!-- Recipes Grid -->
<section class="recipes-section">
    <div class="container">
        <?php if (!empty($recipes)): ?>
            <div class="recipes-grid">
                <?php foreach ($recipes as $recipe): ?>
                    <div class="recipe-card">
                        <?php if (!empty($recipe['ImagePath'])): ?>
                            <div class="recipe-image">
                                <img src="<?= htmlspecialchars($recipe['ImagePath']) ?>" alt="<?= htmlspecialchars($recipe['Name']) ?>">
                            </div>
                        <?php else: ?>
                            <div class="recipe-image-placeholder">
                                <span>No Image</span>
                            </div>
                        <?php endif; ?>
                        <div class="recipe-content">
                            <h3><?= htmlspecialchars($recipe['Name']) ?></h3>
                            <div class="recipe-meta">
                                <span class="category"><?= htmlspecialchars($recipe['Category']) ?></span>
                                <span class="region"><?= htmlspecialchars($recipe['Region']) ?></span>
                            </div>
                            <p class="recipe-description"><?= htmlspecialchars(substr($recipe['Instructions'], 0, 150)) ?>...</p>
                            <div class="recipe-actions">
                                <a href="?page=single-recipe&id=<?= $recipe['RecipeID'] ?>" class="btn btn-primary">View Recipe</a>
                                <a href="?page=edit-recipe&id=<?= $recipe['RecipeID'] ?>" class="btn btn-primary">Edit</a>
                                <a href="?page=delete-recipe&id=<?= $recipe['RecipeID'] ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-recipes">
                <h2>No Recipes Found</h2>
                <p>Start by adding your first recipe to the collection.</p>
                <a href="?page=add-recipe" class="btn btn-primary">Add Recipe</a>
            </div>
        <?php endif; ?>
    </div>
</section>
