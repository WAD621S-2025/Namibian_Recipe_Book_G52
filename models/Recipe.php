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

    public function getFeatured($limit = 6)
    {
        $limit = (int)$limit;
        $stmt = $this->pdo->query("SELECT * FROM recipes ORDER BY CreatedAt DESC LIMIT $limit");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCategory($category)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM recipes WHERE Category = ? ORDER BY CreatedAt DESC");
        $stmt->execute([$category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByRegion($region)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM recipes WHERE Region = ? ORDER BY CreatedAt DESC");
        $stmt->execute([$region]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search($searchTerm)
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM recipes 
            WHERE Name LIKE ? OR Instructions LIKE ? OR Category LIKE ? OR Region LIKE ? 
            ORDER BY CreatedAt DESC
        ");
        $searchPattern = "%{$searchTerm}%";
        $stmt->execute([$searchPattern, $searchPattern, $searchPattern, $searchPattern]);
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
        $stmt = $this->pdo->prepare("
            INSERT INTO recipes (Name, Instructions, Category, Region, ImagePath) 
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$name, $instructions, $category, $region, $imagePath]);
    }

    public function update($id, $name, $instructions, $category, $region, $imagePath = null)
    {
        if ($imagePath) {
            $sql = "UPDATE recipes SET Name=?, Instructions=?, Category=?, Region=?, ImagePath=? WHERE RecipeID=?";
            $params = [$name, $instructions, $category, $region, $imagePath, $id];
        } else {
            $sql = "UPDATE recipes SET Name=?, Instructions=?, Category=?, Region=? WHERE RecipeID=?";
            $params = [$name, $instructions, $category, $region, $id];
        }

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM recipes WHERE RecipeID = ?");
        return $stmt->execute([$id]);
    }

    public function count()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM recipes");
        return $stmt->fetchColumn();
    }
}
