<h1>Edit Ingredient</h1>

<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color: green;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($ingredient['Name']) ?>" required><br><br>

    <label>Quantity:</label><br>
    <input type="number" step="0.01" name="quantity" value="<?= htmlspecialchars($ingredient['Quantity']) ?>" required><br><br>

    <label>Unit:</label><br>
    <input type="text" name="unit" value="<?= htmlspecialchars($ingredient['Unit']) ?>"><br><br>

    <button type="submit">Update Ingredient</button>
</form>
