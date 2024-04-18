<?php 
    include "koneksi.php";

    // Ambil data dari formulir login
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Query untuk memeriksa keberadaan pengguna dalam database
    $query = "SELECT * FROM mahasiswa WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);
    $cek = mysqli_num_rows($result);

    if($cek){
        // Jika login berhasil, buat session
        session_start(); // Memulai session
        $_SESSION['username'] = $username; // Menyimpan username dalam session

        // Set cookie jika Anda ingin menyimpan informasi login dalam cookies
        // Cookie akan berakhir dalam waktu 1 jam
        $cookie_name = "user_login";
        $cookie_value = $username;
        setcookie($cookie_name, $cookie_value, time() + (3600), "/"); // Cookie berlaku untuk seluruh domain

        // Redirect ke halaman pemesanan makanan
        header("Location: index.html");
        exit();
    } else {
        // Jika login gagal, kembali ke halaman login
        header("Location: login.html");
        exit();
    }
?>    
