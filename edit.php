<?php
require_once 'inc/config.php';
$bookObj = new Book();
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: books.php'); exit;
}
$data = $bookObj->find($id);
if (!$data) {
    echo "Data tidak ditemukan. <a href='books.php'>Kembali</a>"; exit;
}
$categories = ['Teknologi','Sejarah','Pendidikan'];
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit Buku</title></head>
<body>
<h2>Edit Buku</h2>
<form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
    Judul: <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>"><br><br>
    Penulis: <input type="text" name="author" value="<?= htmlspecialchars($data['author']) ?>"><br><br>
    Tahun Terbit: <input type="number" name="year" value="<?= htmlspecialchars($data['year']) ?>"><br><br>
    Kategori:
    <select name="category">
        <?php foreach($categories as $c): ?>
            <option value="<?= $c ?>" <?= $data['category']==$c ? 'selected' : '' ?>><?= $c ?></option>
        <?php endforeach; ?>
    </select><br><br>
    Cover Saat Ini:
    <?php if ($data['cover']): ?>
        <br><img src="<?= htmlspecialchars($data['cover']) ?>" width="100"><br>
    <?php else: ?>
        <br>Tidak ada cover<br>
    <?php endif; ?>
    Ganti Cover (biarkan kosong untuk mempertahankan): <input type="file" name="cover"><br><br>
    Status:
    <select name="status">
        <option value="tersedia" <?= $data['status']=='tersedia' ? 'selected' : '' ?>>tersedia</option>
        <option value="dipinjam" <?= $data['status']=='dipinjam' ? 'selected' : '' ?>>dipinjam</option>
    </select><br><br>
    <button type="submit">Update</button>
</form>
<p><a href="books.php">Kembali</a></p>
</body>
</html>
