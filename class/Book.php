<?php

class Book {

    public function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM books ORDER BY id DESC");
        return $stmt->fetchAll();
    }
}