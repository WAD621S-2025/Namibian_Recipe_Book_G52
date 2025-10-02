<?php
class Recipe
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM recipes ORDER BY CreatedAt DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM recipes WHERE RecipeID = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($name, $instructions, $category, $region, $imagePath)
    {
        $stmt = $this->pdo->prepare("INSERT INTO recipes (Name, Instructions, Category, Region, ImagePath) 
                                     VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $instructions, $category, $region, $imagePath]);
    }

    public function update($id, $name, $instructions, $category, $region, $imagePath = null)
    {
        if ($imagePath) {
            $stmt = $this->pdo->prepare("UPDATE recipes 
                                         SET Name=?, Instructions=?, Category=?, Region=?, ImagePath=? 
                                         WHERE RecipeID=?");
            return $stmt->execute([$name, $instructions, $category, $region, $imagePath, $id]);
        } else {
            $stmt = $this->pdo->prepare("UPDATE recipes 
                                         SET Name=?, Instructions=?, Category=?, Region=? 
                                         WHERE RecipeID=?");
            return $stmt->execute([$name, $instructions, $category, $region, $id]);
        }
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM recipes WHERE RecipeID = ?");
        return $stmt->execute([$id]);
    }
}
