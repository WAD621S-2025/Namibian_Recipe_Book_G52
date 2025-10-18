<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
</head>
<body>
<h1>Add New Recipe</h1>

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
    <input type="text" name="name" required><br><br>

    <label>Category:</label><br>
    <input type="text" name="category" placeholder="e.g. Dessert, Main Dish"><br><br>

    <label>Region:</label><br>
    <input type="text" name="region" placeholder="e.g. Oshiwambo, Herero, Nama"><br><br>

    <label>Instructions:</label><br>
    <textarea name="instructions" rows="6" required></textarea><br><br>

    <label>Image:</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit">Add Recipe</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $stmt = $conn->prepare("INSERT INTO recipes (title, ingredients, instructions) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $ingredients, $instructions);
    $stmt->execute();

    echo "<p>Recipe added successfully!</p>";
}
?>
</body>
</html>