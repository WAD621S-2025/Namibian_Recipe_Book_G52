<?php
include_once __DIR__ . '/../../shared/header.php';
include_once __DIR__ . '/../../shared/nav.php';
?>
<link rel="stylesheet" href="assets/css/forms.css">

<div class="container text-center">
    <h1>Add New Recipe</h1>

    <?php if (!empty($errors)): ?>
        <div class="form-messages error">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="form-messages success">
            <p><?= htmlspecialchars($success) ?></p>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="form-container">
        <div class="form-group">
            <label>Recipe Name:</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Category:</label>
            <input type="text" name="category" placeholder="e.g. Dessert, Main Dish">
        </div>

        <div class="form-group">
            <label>Region:</label>
            <input type="text" name="region" placeholder="e.g. Oshiwambo, Herero, Nama">
        </div>

        <div class="form-group">
            <label>Instructions:</label>
            <textarea name="instructions" rows="6" required></textarea>
        </div>

        <div class="form-group">
            <label>Image:</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit">Add Recipe</button>
    </form>
</div>