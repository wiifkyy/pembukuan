<?php
$host = 'localhost';
$user = 'root';
$password = 'litbang123'; // Jika ada password MySQL, masukkan di sini
$dbname = 'pembukuan_db';

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
