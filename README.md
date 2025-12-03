# 1. Deskripsi Aplikasi

Aplikasi ini adalah sistem sederhana untuk mengelola data buku menggunakan PHP Native (tanpa framework) dan database MySQL
Fitur yang tersedia meliputi:
* Menambah data buku
* Menampilkan daftar buku
* Mengedit data buku
* Menghapus data buku
* Upload cover buku
* Mengelola status buku (“tersedia” atau “dipinjam”)

## Entitas yang Dipilih
Aplikasi ini menggunakan entitas tunggal, yaitu **BOOK(BUKU)**
yang memuat informasi:
* id
* title
* author
* year
* category
* cover
* status
* created_at
* updated_at

## Fungsi Aplikasi
Aplikasi ini berfungsi sebagai alat untuk:
* Menyimpan dan memperbarui informasi buku
* Melihat daftar lengkap buku
* Mengelola status peminjaman


# 2. Spesifikasi Teknis
## Bahasa & Perangkat Lunak
| Komponen       | Versi                        |
| -------------- | ---------------------------- |
| **PHP**        | 8.4.14                       |
| **DBMS**       | MySQL                        |
| **Web Server** | Built-in PHP server          |

## Struktur Folder
```text
TUGAS!/
│
├── class/
│   ├── Book.php
│   ├── Database.php
│
├── inc/
│   └── config.php
│
├── uploads/
│
├── index.php
├── books.php
├── create.php
├── edit.php
├── save.php
├── update.php
├── delete.php
├── schema.sql
└── README.md
```

## Penjelasan class utama
Database.php
* Membuat koneksi database menggunakan PDO
* Menyediakan metode connect()
* Mengelola konfigurasi DB dari config.php

Book.php
* Representasi entitas buku
* Menampung properti seperti title, author, year, category, dll.
Dan berisi fungsi CRUD


# 3. Instruksi Menjalankan Aplikasi
## import atau salin file schema.sql yang sudah disediakan pada mysql
```sql
CREATE DATABASE  tugas1;
USE tugas1;

CREATE TABLE IF NOT EXISTS books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  author VARCHAR(100) NOT NULL,
  year INT NOT NULL,
  category VARCHAR(50) NOT NULL,
  cover VARCHAR(255) DEFAULT NULL,
  status ENUM('tersedia','dipinjam') NOT NULL DEFAULT 'tersedia',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
);
```
## Edit inc/config.php:
``` php
define('DB_HOST', 'localhost');
define('DB_NAME', 'tugas1');
define('DB_USER', 'root');
define('DB_PASS', '');
```

## Jalankan Aplikasi
Jika menggunakan built-in PHP server:
``` nginx
php -S localhost:8000
```

## URL Aplikasi
Akses melalui browser:
``` bash
http://localhost:8000/index.php
```

# 4. Contoh Skenario Uji Singkat
## Tambah Data
Buka create.php
Isi:
* Judul: Pemrograman PHP Dasar
* Penulis: Bagas Pramana
* Tahun: 2023
* Kategori: Teknologi
* Upload cover(gambar)
* Status: tersedia
* Tekan Simpan

## Tampilkan Daftar Buku
* Buka books.php
* Pastikan data muncul di tabel

## Ubah Data
* Klik tombol Edit
* Ganti misalnya author → “Bagas Ramayana”
* Simpan perubahan
* Periksa apakah update berhasil




