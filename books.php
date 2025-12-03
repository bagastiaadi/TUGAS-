<?php
require_once 'inc/config.php';
$book = new Book();
$books = $book->getAll();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Daftar Buku</title></head>
<body>
<h2>Daftar Buku</h2>
<p><a href="create.php">Tambah Buku</a></p>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Kategori</th><th>Cover</th><th>Status</th><th>Aksi</th>
    </tr>
    <?php if ($books): foreach($books as $b): ?>
    <tr>
        <td><?= htmlspecialchars($b['id']) ?></td>
        <td><?= htmlspecialchars($b['title']) ?></td>
        <td><?= htmlspecialchars($b['author']) ?></td>
        <td><?= htmlspecialchars($b['year']) ?></td>
        <td><?= htmlspecialchars($b['category']) ?></td>
        <td>
            <?php if (!empty($b['cover'])): ?>
                <img src="uploads/<?= htmlspecialchars(basename($b['cover'])) ?>" width="80" alt="cover">
            <?php endif; ?>
        </td>
        <td><?= htmlspecialchars($b['status']) ?></td>
        <td>
            <a href="edit.php?id=<?= urlencode($b['id']) ?>">Edit</a> |
            <a href="delete.php?id=<?= urlencode($b['id']) ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; else: ?>
    <tr><td colspan="8">Tidak ada data.</td></tr>
    <?php endif; ?>
</table>
</body>
</html>
