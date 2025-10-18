<?php
include 'confiig.php';

// Check if recipe ID is provided
if (!isset($_GET['RecipeID'])) {
    die("Recipe ID not specified.");
}
$recipe_id = intval($_GET['RecipeID']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];

    $stmt = $conn->prepare("INSERT INTO ingredients (RecipeID, name, quantity, unit) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $recipe_id, $name, $quantity, $unit);
    $stmt->execute();

    echo "<p>Ingredient added successfully!</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ingredient</title>
</head>
<body>
<h2>Add Ingredient to Recipe #<?php echo $recipe_id; ?></h2>
<form method="POST">
    <label>Ingredient Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Quantity:</label><br>
    <input type="number" step="0.01" name="quantity" required><br><br>

    <label>Unit:</label><br>
    <input type="text" name="unit" placeholder="e.g. grams, cups"><br><br>

    <button type="submit">Add Ingredient</button>
</form>
</bod>
</html>


