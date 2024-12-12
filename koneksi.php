<?php
$host = "localhost";      // Nama host database
$user = "root";           // Nama pengguna database
$password = "";           // Password untuk database
$database = "bendicar"; // Nama database yang digunakan

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
