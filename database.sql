CREATE DATABASE IF NOT EXISTS db_seamitra;
USE db_seamitra;

CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    no_hp VARCHAR(20),
    alamat TEXT,
    layanan VARCHAR(50),
    tipe_ac VARCHAR(50),
    keluhan TEXT,
    tanggal DATE,
    status VARCHAR(20) DEFAULT 'Pending',
    waktu_pesan TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);