<?php
require_once 'inc/config.php';

$errors = [];
$old = ['title'=>'','author'=>'','year'=>'','category'=>'Teknologi','status'=>'tersedia'];
$categories = ['Teknologi','Sejarah','Pendidikan'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}?>

<!doctype html>
<html>
<head><meta charset="utf-8"><title>Tambah Buku</title></head>
<body>
<h2>Tambah Buku</h2>
<?php if ($errors): ?>
    <?php foreach($errors as $e): ?>
        <p style="color:red"><?= htmlspecialchars($e) ?></p>
    <?php endforeach; ?>
<?php endif; ?>
<form action="save.php" method="post" enctype="multipart/form-data">
    Judul: <input type="text" name="title" value="<?= htmlspecialchars($old['title']) ?>"><br><br>
    Penulis: <input type="text" name="author" value="<?= htmlspecialchars($old['author']) ?>"><br><br>
    Tahun Terbit: <input type="number" name="year" value="<?= htmlspecialchars($old['year']) ?>"><br><br>
    Kategori:
    <select name="category">
        <?php foreach($categories as $c): ?>
            <option value="<?= $c ?>"><?= $c ?></option>
        <?php endforeach; ?>
    </select><br><br>
    Cover (jpg/png, max 2MB): <input type="file" name="cover"><br><br>
    Status:
    <select name="status">
        <option value="tersedia">tersedia</option>
        <option value="dipinjam">dipinjam</option>
    </select><br><br>
    <button type="submit">Simpan</button>
</form>
<p><a href="books.php">Kembali</a></p>
</body>
</html>
