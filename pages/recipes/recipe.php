<?php if ($recipe): ?>
    <h1><?= htmlspecialchars($recipe['Name']) ?></h1>
    <p><strong>Category:</strong> <?= htmlspecialchars($recipe['Category']) ?></p>
    <p><strong>Region:</strong> <?= htmlspecialchars($recipe['Region']) ?></p>
    <p><strong>Instructions:</strong><br><?= nl2br(htmlspecialchars($recipe['Instructions'])) ?></p>

    <?php if (!empty($recipe['ImagePath'])): ?>
        <img src="<?= $recipe['ImagePath'] ?>" width="300">
    <?php endif; ?>
<?php else: ?>
    <p>Recipe not found.</p>
<?php endif; ?>