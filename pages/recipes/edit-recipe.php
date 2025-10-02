<h1>Edit Recipe</h1>

<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color: green;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <label>Recipe Name:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($recipe['Name']) ?>" required><br><br>

    <label>Category:</label><br>
    <input type="text" name="category" value="<?= htmlspecialchars($recipe['Category']) ?>"><br><br>

    <label>Region:</label><br>
    <input type="text" name="region" value="<?= htmlspecialchars($recipe['Region']) ?>"><br><br>

    <label>Instructions:</label><br>
    <textarea name="instructions" rows="6" required><?= htmlspecialchars($recipe['Instructions']) ?></textarea><br><br>

    <label>Image:</label><br>
    <?php if (!empty($recipe['ImagePath'])): ?>
        <img src="<?= $recipe['ImagePath'] ?>" width="150"><br>
    <?php endif; ?>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit">Update Recipe</button>
</form>