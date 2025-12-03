<?php
class Book {

    public function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM books ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([(int)$id]);
        return $stmt->fetch();
    }

    public function insert($data) {
        $db = Database::connect();
        $sql = "INSERT INTO books (title, author, year, category, cover, status) VALUES (:title,:author,:year,:category,:cover,:status)";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':title' => $data['title'],
            ':author' => $data['author'],
            ':year' => $data['year'],
            ':category' => $data['category'],
            ':cover' => $data['cover'],
            ':status' => $data['status']
        ]);
    }
}