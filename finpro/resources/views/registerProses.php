<?php
include "koneksi.php"; // Mengimpor file koneksi.php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "projekakhir";

// Buat koneksi
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Mendapatkan data dari formulir pendaftaran
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

// Melindungi dari SQL Injection
$username = mysqli_real_escape_string($conn, $username);
$nama = mysqli_real_escape_string($conn, $nama);
$password = mysqli_real_escape_string($conn, $password);
$user_type = mysqli_real_escape_string($conn, $user_type);

// Query untuk memasukkan data ke dalam tabel
$sql = "INSERT INTO m_user (username, nama, password, posisi) VALUES ('$username', '$nama', '$password', '$user_type')";

if ($conn->query($sql) === TRUE) {
    echo "Akun berhasil didaftarkan.";
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
