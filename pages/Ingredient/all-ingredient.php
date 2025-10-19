<?php
include_once __DIR__ . '/../shared/header.php';
include_once __DIR__ . '/../shared/nav.php';
?>

<h1>All Ingredients</h1>

<?php if ($status === 'added') : ?>
    <p style="color:green;">Ingredient added successfully!</p>
<?php elseif ($status === 'updated') : ?>
    <p style="color:green;">Ingredient updated successfully!</p>
<?php elseif ($status === 'deleted') : ?>
    <p style="color:green;">Ingredient deleted successfully!</p>
<?php endif; ?>

<table id="ingredientsTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Recipe ID</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ingredients as $ingredient) : ?>
            <tr>
                <td><?php echo htmlspecialchars($ingredient['IngredientID']); ?></td>
                <td><?php echo htmlspecialchars($ingredient['Name']); ?></td>
                <td><?php echo htmlspecialchars($ingredient['Quantity']); ?></td>
                <td><?php echo htmlspecialchars($ingredient['Unit']); ?></td>
                <td><?php echo htmlspecialchars($ingredient['RecipeID']); ?></td>
                <td><?php echo htmlspecialchars($ingredient['CreatedAt']); ?></td>
                <td>
                    <a href="index.php?page=edit-ingredient&id=<?php echo $ingredient['IngredientID']; ?>">Edit</a> |
                    <a href="index.php?page=delete-ingredient&id=<?php echo $ingredient['IngredientID']; ?>"
                        onclick="return confirm('Are you sure you want to delete this ingredient?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- DataTables CSS/JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#ingredientsTable').DataTable({
            "order": [
                [0, "desc"]
            ],
            "pageLength": 10
        });
    });
</script>

<?php include_once __DIR__ . '/../shared/footer.php'; ?>