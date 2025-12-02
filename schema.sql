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

INSERT INTO books (title, author, year, category, cover, status)
VALUES
('Teknologi Informasi Modern', 'Rizky Saputra', 2021, 'Teknologi', 'uploads/ti.png', 'tersedia'),
('Sejarah Nusantara', 'Made Hartawan', 2019, 'Sejarah', 'uploads/sejarah.png', 'dipinjam'),
('Pendidikan Anak Usia Dini', 'Rini Utami', 2023, 'Pendidikan', 'uploads/paud.png', 'tersedia');