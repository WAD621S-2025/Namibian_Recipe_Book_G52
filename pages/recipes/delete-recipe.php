<?php
$id = $_GET['id'] ?? null;

if ($id && deleteRecipe($pdo, $id)) {
    echo "<p style='color:green;'>Recipe deleted successfully!</p>";
    echo "<a href='index.php?page=home'>Back to Home</a>";
} else {
    echo "<p style='color:red;'>Failed to delete recipe.</p>";
}
