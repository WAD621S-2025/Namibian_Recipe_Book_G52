<?php
$model = new Recipe($pdo);
$recipes = $model->getAll();
?>

<!-- Navbar -->
<div class="navbar">
    <div class="logo">🍴 MyRecipeBook</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#">Top Recipes</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</div>

<!-- Hero Section -->
<div class="hero">
    <h1>Discover Delicious Recipes</h1>
    <p>Find the perfect meal for any occasion.</p>
    <a href="#recipes" class="btn-primary">Browse Recipes</a>
</div>

<!-- Recipe Section -->
<h1 id="recipes" style="text-align:center; margin-top:30px;">All Recipes</h1>

<?php if ($recipes): ?>
    <div class="recipe-grid">
        <?php foreach ($recipes as $recipe): ?>
            <div class="card">
                <img src="<?= $recipe['Image'] ?? 'assets/images/placeholder.jpg' ?>" alt="<?= htmlspecialchars($recipe['Name']) ?>">
                <div class="card-body">
                    <h3><?= htmlspecialchars($recipe['Name']) ?></h3>
                    <span class="badge"><?= htmlspecialchars($recipe['Category'] ?? 'Uncategorized') ?></span>
                    <p><?= substr(htmlspecialchars($recipe['Description']), 0, 100) ?>...</p>
                    <a href="index.php?page=recipe&id=<?= $recipe['RecipeID'] ?>" class="btn-secondary">View Recipe</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Carousel Section -->
    <div class="section">
        <h2 style="text-align:center;">More Like This</h2>
        <div class="carousel">
            <button class="prev">&#10094;</button>
            <div class="carousel-inner">
                <?php foreach ($recipes as $recipe): ?>
                    <div class="card">
                        <img src="<?= $recipe['Image'] ?? 'assets/images/placeholder.jpg' ?>" alt="">
                        <div class="card-content">
                            <h3><?= htmlspecialchars($recipe['Name']) ?></h3>
                            <span class="badge"><?= htmlspecialchars($recipe['Category'] ?? 'General') ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="next">&#10095;</button>
        </div>
    </div>
<?php else: ?>
    <p style="text-align:center;">No recipes found.</p>
<?php endif; ?>