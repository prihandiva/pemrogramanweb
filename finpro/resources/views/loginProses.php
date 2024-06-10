<?php
session_start();
include "koneksi.php";

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

// Mendapatkan data yang dikirimkan dari JavaScript
$username = $_POST['username'];
$password = $_POST['password'];
$user_status = $_POST['user_type'];

$user_status = str_replace('-',' ',$user_status);

echo $username . $password . $user_status;


// Melindungi dari SQL Injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$user_status = mysqli_real_escape_string($conn, $user_status);

// Mencari pengguna dengan username tertentu di database
$sql = "SELECT * FROM m_user WHERE username = '$username' AND posisi = '$user_status'";
$result = $connect->query($sql);

// Periksa apakah username dan password cocok
if ($result->num_rows > 0) {
    // Pengguna ditemukan, ambil data dari database
    $row = $result->fetch_assoc();
    
    // Periksa apakah password yang dimasukkan sesuai dengan password di database
    if ($password === $row['password']) {
        // Password cocok, login berhasil

        // Check if the user belongs to the correct user type
        if ($user_status == 'Mahasiswa') {
            session_start(); // Memulai sesi
            $_SESSION['username'] = $username; // Simpan username ke sesi
            $_SESSION['user_type'] = $user_status; // Simpan user_status ke sesi
            $_SESSION['nama'] = $row['nama']; // simpan nama user ke sesi
            $_SESSION['id_user'] = $row['id_user']; // simpan id_user ke sesi
            echo "success";
            header("Location: mahasiswa/dashboardMahasiswa.php");
        exit();
        } elseif ($user_status == 'Dosen') {
            session_start(); // Memulai sesi
            $_SESSION['username'] = $username; // Simpan username ke sesi
            $_SESSION['user_type'] = $user_status; // Simpan user_status ke sesi
            $_SESSION['nama'] = $row['nama']; // simpan nama user ke sesi
            $_SESSION['id_user'] = $row['id_user']; // simpan id_user ke sesi
            echo "success";
            header("Location: dosen/dashboardDosen.php");
        exit();
        } elseif ($user_status == 'Admin') {
            session_start(); // Memulai sesi
            $_SESSION['username'] = $username; // Simpan username ke sesi
            $_SESSION['user_type'] = $user_status; // Simpan user_status ke sesi
            $_SESSION['nama'] = $row['nama']; // simpan nama user ke sesi
            $_SESSION['id_user'] = $row['id_user']; // simpan id_user ke sesi
            echo "success";
            header("Location: admin/dashboardAdmin.php");
        exit();
        } elseif($user_status == 'Wali Mahasiswa'){
            session_start(); // Memulai sesi
            $_SESSION['username'] = $username; // Simpan username ke sesi
            $_SESSION['user_type'] = $user_status; // Simpan user_status ke sesi
            $_SESSION['nama'] = $row['nama']; // simpan nama user ke sesi
            $_SESSION['id_user'] = $row['id_user']; // simpan id_user ke sesi
            echo "success";
            header("Location: wali/dashboardWali.php");
        exit();
        } elseif($user_status == 'Alumni'){
            session_start(); // Memulai sesi
            $_SESSION['username'] = $username; // Simpan username ke sesi
            $_SESSION['user_type'] = $user_status; // Simpan user_status ke sesi
            $_SESSION['nama'] = $row['nama']; // simpan nama user ke sesi
            $_SESSION['id_user'] = $row['id_user']; // simpan id_user ke sesi
            echo "success";
            header("Location: alumni/dashboardAlumni.php");
        exit();
        } elseif($user_status == 'Mitra'){
            session_start(); // Memulai sesi
            $_SESSION['username'] = $username; // Simpan username ke sesi
            $_SESSION['user_type'] = $user_status; // Simpan user_status ke sesi
            $_SESSION['nama'] = $row['nama']; // simpan nama user ke sesi
            $_SESSION['id_user'] = $row['id_user']; // simpan id_user ke sesi
            echo "success";
            header("Location: mitra/dashboardMitra.php");
        exit();
        }elseif($user_status == 'Tenaga Pendidikan'){
            session_start(); // Memulai sesi
            $_SESSION['username'] = $username; // Simpan username ke sesi
            $_SESSION['user_type'] = $user_status; // Simpan user_status ke sesi
            $_SESSION['nama'] = $row['nama']; // simpan nama user ke sesi
            $_SESSION['id_user'] = $row['id_user']; // simpan id_user ke sesi
            echo "success";
            header("Location: tendik/dashboardTendik.php");
        exit();
        }else {
            echo "user_not_found";
        }
    } else {
        // Password salah
        echo "wrong_password";
    }
} else {
    // Pengguna tidak ditemukan
    echo "user_not_found";
}

$connect->close();
