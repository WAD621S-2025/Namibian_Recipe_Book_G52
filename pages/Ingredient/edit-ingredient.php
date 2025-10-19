<?php
include_once __DIR__ . '/../shared/header.php';
include_once __DIR__ . '/../shared/nav.php';
?>

<h1>Edit Ingredient</h1>

<?php if (!empty($message)) : ?>
    <p style="color:green;"><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<?php if (!empty($error)) : ?>
    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label>Name:</label><br>
    <input type="text" name="name" required
        value="<?php echo htmlspecialchars($_POST['name'] ?? $ingredient['Name']); ?>"><br><br>

    <label>Quantity:</label><br>
    <input type="number" step="0.01" name="quantity" required
        value="<?php echo htmlspecialchars($_POST['quantity'] ?? $ingredient['Quantity']); ?>"><br><br>

    <label>Unit:</label><br>
    <input type="text" name="unit" placeholder="e.g. grams, cups"
        value="<?php echo htmlspecialchars($_POST['unit'] ?? $ingredient['Unit']); ?>"><br><br>

    <button type="submit">Update Ingredient</button>
</form>

<?php include_once __DIR__ . '/../shared/footer.php'; ?>
