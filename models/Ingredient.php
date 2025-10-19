<?php
class Ingredient
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getByRecipeId($recipeId)
    {
        $stmt = $this->pdo->prepare("
            SELECT IngredientID, Name, Quantity, Unit 
            FROM ingredients 
            WHERE RecipeID = ?
            ORDER BY CreatedAt ASC
        ");
        $stmt->execute([$recipeId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM ingredients ORDER BY CreatedAt DESC");
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ingredients WHERE IngredientID = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function insert($name, $quantity, $unit, $recipeId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO ingredients (Name, Quantity, Unit, RecipeID) 
                                     VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $quantity, $unit, $recipeId]);
    }

    public function update($id, $name, $quantity, $unit)
    {
        $stmt = $this->pdo->prepare("UPDATE ingredients SET Name=?, Quantity=?, Unit=? WHERE IngredientID=?");
        return $stmt->execute([$name, $quantity, $unit, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM ingredients WHERE IngredientID=?");
        return $stmt->execute([$id]);
    }
}
