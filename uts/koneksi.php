<?php
// Informasi koneksi ke database
$host = "localhost"; // Host database (biasanya "localhost")
$username = "root"; // Username database
$password = ""; // Password database
$database = "uts_web"; // Nama database

// Membuat koneksi ke database
$connect = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$connect) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
