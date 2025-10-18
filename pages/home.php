<?php
include_once __DIR__ . '/../shared/nav.php';
?>

<link rel="stylesheet" href="assets/css/home.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Welcome to Namibian Recipe Book</h1>
        <p>Discover authentic Namibian cuisine with traditional recipes passed down through generations</p>
        <div class="hero-actions">
            <a href="?page=all-recipes" class="btn btn-primary">Explore Recipes</a>
            <a href="?page=add-recipe" class="btn btn-secondary">Add Recipe</a>
        </div>
    </div>
</section>
<!-- Featured Recipes Section -->
<section class="featured-recipes">
    <div class="container">
        <h2>Featured Recipes</h2>
        <div class="recipe-grid">
            <?php if (!empty($featuredRecipes)): ?>
                <?php foreach ($featuredRecipes as $recipe): ?>
                    <div class="recipe-card">
                        <?php if (!empty($recipe['ImagePath'])): ?>
                            <div class="recipe-image">
                                <img src="<?= htmlspecialchars($recipe['ImagePath']) ?>" alt="<?= htmlspecialchars($recipe['Name']) ?>">
                            </div>
                        <?php endif; ?>
                        <div class="recipe-content">
                            <h3><?= htmlspecialchars($recipe['Name']) ?></h3>
                            <div class="recipe-meta">
                                <span class="category"><?= htmlspecialchars($recipe['Category']) ?></span>
                                <span class="region"><?= htmlspecialchars($recipe['Region']) ?></span>
                            </div>
                            <p class="recipe-description"><?= htmlspecialchars(substr($recipe['Instructions'], 0, 100)) ?>...</p>
                            <a href="?page=single-recipe&id=<?= $recipe['RecipeID'] ?>" class="btn btn-small">View Recipe</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-recipes">No recipes available yet. <a href="?page=add-recipe">Add the first recipe!</a></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Quick Actions Section -->
<section class="quick-actions">
    <div class="container">
        <h2>Quick Actions</h2>
        <div class="action-grid flex-column">
            <div class="action-card">
                <h3>Browse by Category</h3>
                <p>Explore recipes organized by food categories</p>
                <a href="?page=all-recipes" class="btn">Browse Categories</a>
            </div>
            <div class="action-card">
                <h3>Regional Specialties</h3>
                <p>Discover recipes from different Namibian regions</p>
                <a href="?page=all-recipes" class="btn ">Explore Regions</a>
            </div>
            <div class="action-card">
                <h3>Add Your Recipe</h3>
                <p>Share your traditional family recipes</p>
                <button href="?page=add-recipe" class="btn">Add Recipe</button>
            </div>
        </div>
    </div>
</section>