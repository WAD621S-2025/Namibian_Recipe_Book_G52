<?php
include_once __DIR__ . '/../../shared/header.php';
include_once __DIR__ . '/../../shared/nav.php';
?>
<link rel="stylesheet" href="assets/css/forms.css">

<div class="container text-center">
    <h1>Add Ingredient</h1>

    <?php if (!empty($message)) : ?>
        <div class="form-messages success">
            <p><?= htmlspecialchars($message); ?></p>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)) : ?>
        <div class="form-messages error">
            <p><?= htmlspecialchars($error); ?></p>
        </div>
    <?php endif; ?>

    <form method="POST" class="form-container">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? ''); ?>">
        </div>

        <div class="form-group">
            <label>Quantity:</label>
            <input type="number" step="0.01" name="quantity" required value="<?= htmlspecialchars($_POST['quantity'] ?? ''); ?>">
        </div>

        <div class="form-group">
            <label>Unit:</label>
            <input type="text" name="unit" placeholder="e.g. grams, cups" value="<?= htmlspecialchars($_POST['unit'] ?? ''); ?>">
        </div>

        <div class="form-group">
            <label>Recipe ID (optional):</label>
            <input type="number" name="recipeId" value="<?= htmlspecialchars($_POST['recipeId'] ?? ''); ?>">
        </div>

        <button type="submit">Add Ingredient</button>
    </form>
</div>