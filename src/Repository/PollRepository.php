<?php

namespace App\Repository;

use App\Db\Mysql;
use App\Entity\Poll;
use PDO;
use App\Repository\CategoryRepository;

class PollRepository
{
    public function __construct() {}


    public function findAll(?int $limit = null): array
    {
        $sql = 'SELECT * FROM poll ORDER BY id DESC';
        if ($limit !== null) {
            $sql .= ' LIMIT ' . intval($limit);
        }

        $stmt = Mysql::getInstance()->getPdo()->query($sql);
        $polls = [];
        // Précharge toutes les catégories pour éviter les requêtes multiples
        $catRepo = new CategoryRepository();
        $categories = [];
        foreach ($catRepo->findAll() as $cat) {
            $categories[$cat->getId()] = $cat;
        }
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category = $categories[$data['category_id']] ?? null;
            $poll = new Poll(
                $data['id'],
                $data['title'],
                $data['description'],
                $data['user_id'],
                $data['category_id'],
                $category
            );
            $polls[] = $poll;
        }
        return $polls;
    }

    public function find(int $id): ?Poll
    {
        $stmt = Mysql::getInstance()->getPdo()->prepare('SELECT * FROM poll WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) return null;
        $catRepo = new \App\Repository\CategoryRepository();
        $category = $catRepo->findById($data['category_id']);
        return new Poll(
            $data['id'],
            $data['title'],
            $data['description'],
            $data['user_id'],
            $data['category_id'],
            $category
        );
    }
    
    // TODO : Ajouter une méthode create(Poll $poll) pour insérer un nouveau sondage en base de données
    public function create(string $title, string $description, int $userId, int $categoryId): int
    {
        $stmt = Mysql::getInstance()->getPdo()->prepare('INSERT INTO poll (title, description, user_id, category_id) VALUES (?, ?, ?, ?)');
        $stmt->execute([$title, $description, $userId, $categoryId]);
        return Mysql::getInstance()->getPdo()->lastInsertId();
    }


    public function findAllByCategoryId(int $categoryId): array
    {
        $stmt = Mysql::getInstance()->getPdo()->prepare('SELECT * FROM poll WHERE category_id = ?');
        $stmt->execute([$categoryId]);
        $polls = [];
        $catRepo = new CategoryRepository();
        $category = $catRepo->findById($categoryId);
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $poll = new Poll(
                $data['id'],
                $data['title'],
                $data['description'],
                $data['user_id'],
                $data['category_id'],
                $category
            );
            $polls[] = $poll;
        }
        return $polls;
    }

    public function search(string $query): array
    {
        $stmt = Mysql::getInstance()->getPdo()->prepare('SELECT * FROM poll WHERE title LIKE ? OR description LIKE ? ORDER BY id DESC');
        $search = '%' . $query . '%';
        $stmt->execute([$search, $search]);
        $polls = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $polls[] = new Poll($data['id'], $data['title'], $data['description'], $data['user_id'], $data['category_id']);
        }
        return $polls;
    }
}
