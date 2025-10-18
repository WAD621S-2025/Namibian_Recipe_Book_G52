<?php if ($ingredient): ?>
    <h1><?= htmlspecialchars($ingredient['Name']) ?></h1>
    <p><strong>Quantity:</strong> <?= htmlspecialchars($ingredient['Quantity']) ?> <?= htmlspecialchars($ingredient['Unit']) ?></p>
    <p><strong>Recipe ID:</strong> <?= htmlspecialchars($ingredient['RecipeID'] ?? 'N/A') ?></p>
<?php else: ?>
    <p>Ingredient not found.</p>
<?php endif; ?>
