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

    public function update($id, $data) {
        $db = Database::connect();
        $sql = "UPDATE books SET title=:title, author=:author, year=:year, category=:category, cover=:cover, status=:status WHERE id=:id";
        $stmt = $db->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute([
            ':title' => $data['title'],
            ':author' => $data['author'],
            ':year' => $data['year'],
            ':category' => $data['category'],
            ':cover' => $data['cover'],
            ':status' => $data['status'],
            ':id' => $data['id']
        ]);
    }

    public function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([(int)$id]);
    }
}