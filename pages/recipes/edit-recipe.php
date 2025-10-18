<?php
include_once __DIR__ . '/../../shared/header.php';
include_once __DIR__ . '/../../shared/nav.php';
?>
<link rel="stylesheet" href="assets/css/forms.css">

<div class="container text-center">
    <div class="form-container">
        <h2>Edit Recipe</h2>

        <?php if (!empty($error)): ?>
            <div class="form-messages error">
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php elseif (!empty($success)): ?>
            <div class="form-messages success">
                <p><?= htmlspecialchars($success) ?></p>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Recipe Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($recipe['Name']) ?>" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" value="<?= htmlspecialchars($recipe['Category']) ?>" required>
            </div>

            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" id="region" name="region" value="<?= htmlspecialchars($recipe['Region']) ?>" required>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea id="instructions" name="instructions" rows="5" required><?= htmlspecialchars($recipe['Instructions']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="image">Recipe Image</label><br>
                <?php if (!empty($recipe['ImagePath'])): ?>
                    <img src="<?= htmlspecialchars($recipe['ImagePath']) ?>" alt="Recipe Image" width="150"><br><br>
                <?php endif; ?>
                <input type="file" id="image" name="image">
            </div>

            <button type="submit">Update Recipe</button>
        </form>
    </div>
</div>