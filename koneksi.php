<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user database hosting Anda
$pass = ""; // Sesuaikan dengan password database hosting Anda
$db   = "db_seamitra";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>