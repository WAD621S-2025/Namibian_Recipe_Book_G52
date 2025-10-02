<h1>Add Ingredient</h1>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Quantity:</label><br>
    <input type="number" step="0.01" name="quantity" required><br><br>

    <label>Unit:</label><br>
    <input type="text" name="unit" placeholder="e.g. grams, cups"><br><br>

    <label>Recipe ID (optional):</label><br>
    <input type="number" name="recipeId"><br><br>

    <button type="submit">Add Ingredient</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $quantity = trim($_POST['quantity']);
    $unit = trim($_POST['unit']);
    $recipeId = $_POST['recipeId'] ?? null;

    if ($name && $quantity) {
        $ingredientModel = new Ingredient($pdo);
        $ingredientModel->insert($name, $quantity, $unit, $recipeId);
        echo "<p style='color:green;'>Ingredient added successfully!</p>";
    }
}
?>