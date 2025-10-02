<h1>All Recipes</h1>

<a href="?page=add-recipe">➕ Add New Recipe</a><br><br>

<?php if (!empty($recipes)): ?>
    <ul>
        <?php foreach ($recipes as $recipe): ?>
            <li>
                <a href="?page=single-recipe&id=<?= $recipe['RecipeID'] ?>">
                    <?= htmlspecialchars($recipe['Name']) ?>
                </a>
                (<?= htmlspecialchars($recipe['Category']) ?> - <?= htmlspecialchars($recipe['Region']) ?>)
                | <a href="?page=edit-recipe&id=<?= $recipe['RecipeID'] ?>">✏️ Edit</a>
                | <a href="?page=delete-recipe&id=<?= $recipe['RecipeID'] ?>" onclick="return confirm('Delete this recipe?')">🗑️ Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No recipes found.</p>
<?php endif; ?>