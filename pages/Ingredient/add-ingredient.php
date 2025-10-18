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


