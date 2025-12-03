<?php
require_once 'inc/config.php';
$bookObj = new Book();
$id = $_GET['id'] ?? null;
if (!$id) { header('Location: books.php'); exit; }



$data = $bookObj->find($id);
$deleted = $bookObj->delete($id);
if ($deleted && !empty($data['cover'])) {
    $file = __DIR__ . '/' . $data['cover'];
    if (file_exists($file)) @unlink($file);
}
header('Location: books.php');
exit;
