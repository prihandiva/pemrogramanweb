<?php
session_start();
include "koneksi.php"; // Mengimpor file koneksi.php

$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "projekakhir";

// Buat koneksi
$conn = new mysqli($servername, $username_db, $password_db, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['nama']) && isset($_POST['password']) && isset($_POST['user_type'])) {
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
    $resultUser = $conn->query($sql);

    $id_user = '';
    if ($resultUser === TRUE) {
        // Mendapatkan ID user yang baru saja dimasukkan
        $id_user = $conn->insert_id;

        echo "User ID: " . $id_user . "<br>"; // Debugging

       
    } else {
        echo "Error inserting into m_user: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['nim']) && isset($_POST['prodi']) && isset($_POST['email']) && isset($_POST['nohp']) && isset($_POST['tahunmasuk']) && isset($_POST['id_user'])) {
    $responden_id_user = $_POST['id_user'];
    $responden_nim = $_POST['nim'];
    $responden_nama = $_POST['nama'];
    $responden_prodi = $_POST['prodi'];
    $responden_email = $_POST['email'];
    $responden_hp = $_POST['nohp'];
    $tahun_masuk = $_POST['tahunmasuk'];

    // Melindungi dari SQL Injection
    $responden_nim = mysqli_real_escape_string($conn, $responden_nim);
    $responden_prodi = mysqli_real_escape_string($conn, $responden_prodi);
    $responden_email = mysqli_real_escape_string($conn, $responden_email);
    $responden_hp = mysqli_real_escape_string($conn, $responden_hp);
    $tahun_masuk = mysqli_real_escape_string($conn, $tahun_masuk);

    $sql2 = "INSERT INTO r_mhs (mhs_nim, mhs_nama, mhs_prodi, mhs_email, mhs_hp, mhs_tahunmasuk, id_user) VALUES ('$responden_nim', '$responden_nama', '$responden_prodi', '$responden_email', '$responden_hp', '$tahun_masuk', '$responden_id_user')";

    echo "SQL2: " . $sql2 . "<br>"; // Debugging

    $resultRegister = $conn->query($sql2);

    if ($resultRegister === TRUE) {
        echo "Akun mahasiswa berhasil didaftarkan.";
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error inserting into r_mhs: " . $sql2 . "<br>" . $conn->error;
    }
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        body {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-20 mt-20 w-[700px] mx-auto bg-white p-10 rounded-lg shadow-md ">
        <!---->

        <div class="pt-10">
            <div class="flex items-center justify-center gap-4 mb-10">
                <img src="../aset/lambang-polinema1.png" class="w-20">
                <div class="font-bold">
                    <h1 class="">POLITEKNIK<br> NEGERI MALANG</h1>
                </div>
            </div>
        </div>

        <!--KONTEN-->
        <div class="text-center mb-10">
            <h1 class="font-bold text-2xl">Buat Akun Baru</h1>
            <p class="text-sm">Buat Akun Baru Untuk Memulai Isi Survey
                <br>Silahkan masukkan data diri di bawah ini
            </p>
        </div>
        <!---->
        <form action="" method="post">
            <input type="text" name="id_user" value="<?= $id_user ?>" hidden>
            <input type="text" value="<?= $nama ?>" name="nama" hidden>
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">NIM</p>
            <input type="text" name="nim" placeholder="Masukkan NIM" class="w-full border px-4 rounded-lg text-sm h-10">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Program Studi</p>
            <input type="text" name="prodi" placeholder="Masukkan Prodi" class="w-full border px-4 rounded-lg text-sm h-10">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Email</p>
            <input type="email" name="email" placeholder="Masukkan Email" class="w-full border px-4 rounded-lg text-sm h-10">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Nomor HP</p>
            <input type="text" name="nohp" placeholder="Masukkan Nomor Handphone" class="w-full border px-4 rounded-lg text-sm h-10">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Tahun Masuk</p>
            <input type="text" name="tahunmasuk" placeholder="Masukkan Tahun Masuk" class="w-full border px-4 rounded-lg text-sm h-10">
            <div class="bg-[#2D1B6B] w-full py-2 text-center rounded-md mt-4">
                <button type="submit" class="text-white font-bold">Buat Akun Baru</button>
            </div>
        </form>
    </main>
</body>
</html>
<?php



?>


