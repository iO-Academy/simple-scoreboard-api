<?php

declare(strict_types=1);


namespace App\Models;


use PDO;

class ScoresModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getScores(): array
    {
        $stmt = $this->db->prepare("SELECT `id`, `name`, `score` FROM `scores`;");
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addScore(string $name, int $score): bool
    {
        $stmt = $this->db->prepare("INSERT INTO `scores` (`name`, `score`) VALUES (:name, :score);");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':score', $score);
        return $stmt->execute();
    }

    public function resetScoreboard(): bool
    {
        $stmt = $this->db->prepare("TRUNCATE TABLE `scores`;");
        return $stmt->execute();
    }

}