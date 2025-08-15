<?php

class Link {
    private $pdo;
    private $table = 'links';

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($url) {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (url) VALUES (:url)");
        $stmt->bindParam(':url', $url);
        return $stmt->execute();
    }

    public function update($id, $url) {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET url = :url WHERE id = :id");
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}