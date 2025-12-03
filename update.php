<?php
require_once 'inc/config.php';
$bookObj = new Book();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: books.php'); exit;
}

$id = (int)($_POST['id'] ?? 0);
if (!$id) { header('Location: books.php'); exit; }

$title = trim($_POST['title'] ?? '');
$author = trim($_POST['author'] ?? '');
$year = intval($_POST['year'] ?? 0);
$category = $_POST['category'] ?? '';
$status = $_POST['status'] ?? 'tersedia';

$allowed_ext = ['jpg','jpeg','png'];
$max_size = 2 * 1024 * 1024;

$errors = [];
if ($title === '') $errors[] = 'Judul wajib diisi.';
if ($author === '') $errors[] = 'Penulis wajib diisi.';
if ($year <= 0) $errors[] = 'Tahun harus angka dan > 0.';
$allowed_categories = ['Teknologi','Sejarah','Pendidikan'];
if (!in_array($category, $allowed_categories)) $errors[] = 'Kategori tidak valid.';

$existing = $bookObj->find($id);
$cover_path = $existing['cover'] ?? null;


if (!empty($_FILES['cover']['name'])) {
    $tmp = $_FILES['cover']['tmp_name'];
    $name = $_FILES['cover']['name'];
    $size = $_FILES['cover']['size'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed_ext)) $errors[] = 'Cover harus jpg/jpeg/png.';
    if ($size > $max_size) $errors[] = 'Ukuran file maksimal 2MB.';
    if (empty($errors)) {
        if (!is_dir(__DIR__ . '/uploads')) mkdir(__DIR__ . '/uploads', 0755, true);
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $name);
        $target = __DIR__ . '/uploads/' . $filename;
        if (!move_uploaded_file($tmp, $target)) $errors[] = 'Gagal menyimpan file cover.';
        else {
            
            if ($cover_path && file_exists(__DIR__ . '/' . $cover_path)) {
                @unlink(__DIR__ . '/' . $cover_path);
            }
            $cover_path = 'uploads/' . $filename;
        }
    }
}

if ($errors) {
    foreach($errors as $e) echo '<p style="color:red">'.htmlspecialchars($e).'</p>';
    echo '<p><a href="edit.php?id='.urlencode($id).'">Kembali</a></p>';
    exit;
}


$data = [
    'title' => $title,
    'author' => $author,
    'year' => $year,
    'category' => $category,
    'cover' => $cover_path,
    'status' => $status
];
$bookObj->update($id, $data);
header('Location: books.php');
exit;
