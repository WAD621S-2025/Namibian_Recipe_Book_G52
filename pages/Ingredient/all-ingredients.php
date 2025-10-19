<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Ingredients</title>
</head>
<body>

<h1>All Ingredients</h1>

<a href="?page=add-ingredient">➕ Add New Ingredient</a><br><br>

<?php if (!empty($ingredients)): ?>
    <ul>
        <?php foreach ($ingredients as $ingredient): ?>
            <li>
                <?= htmlspecialchars($ingredient['Name']) ?> - <?= htmlspecialchars($ingredient['Quantity']) ?> <?= htmlspecialchars($ingredient['Unit']) ?>
                | <a href="?page=edit-ingredient&id=<?= $ingredient['IngredientID'] ?>">✏️ Edit</a>
                | <a href="?page=delete-ingredient&id=<?= $ingredient['IngredientID'] ?>" onclick="return confirm('Delete this ingredient?')">🗑️ Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No ingredients found.</p>
<?php endif; ?>
</body>
</html>