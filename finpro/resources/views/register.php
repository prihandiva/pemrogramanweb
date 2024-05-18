<?php
include "koneksi.php";
session_start();

$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "projekakhir";


$conn = new mysqli($servername, $username_db, $password_db, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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
                <img src="aset/lambang-polinema1.png" class="w-20">
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
        <form action="" method="post" id="form">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Username</p>
            <input type="text" name="username" placeholder="Masukkan Username" class="w-full border px-4 rounded-lg text-sm h-10">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Nama Lengkap</p>
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" class="w-full border px-4 rounded-lg text-sm h-10">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Password</p>
            <input type="password" name="password" placeholder="Masukkan Password" class="w-full border px-4 rounded-lg text-sm h-10">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Posisi</p>
            <select name="user_type" class="w-full border px-4 rounded-lg text-sm h-10">
                <option value="">Select Role</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Dosen">Dosen</option>
                <option value="Wali Mahasiswa">Wali Mahasiswa</option>
                <option value="Tenaga Pendidikan">Tenaga Pendidikan</option>
                <option value="Mitra">Mitra</option>
                <option value="Alumni">Alumni</option>
            </select>
            <div class=" bg-[#2D1B6B] w-full py-2 text-center rounded-md mt-4">
                <button type="submit" class="text-white font-bold">Buat Akun Baru</button>
            </div>
        </form>
    </main>
    <script> 
    let form = document.getElementById('form');
    let user_type = document.querySelector('select[name="user_type"]');
    user_type.addEventListener('change',(e)=>{

        switch (user_type.value) {
            case 'Mahasiswa':
                form.action = 'mahasiswa/registerMahasiswa.php'
                break;
            case 'Dosen':
                form.action = 'dosen/registerDosen.php'
                break;
            case 'Wali Mahasiswa':
                form.action = 'wali/registerWali.php'
                break;
            case 'Tenaga Pendidikan':
                form.action = 'tendik/registerTendik.php'
                break;
            case 'Mitra':
                form.action = 'mitra/registerMitra.php'
                break;
            case 'Alumni':
                form.action = 'alumni/registerAlumni.php'
                break;
            default:
                break;
        }    
    })
    </script>
</body>
</html>
<?php 
if(isset($_POST["user_type"])){
    if($_POST["user_type"] == 'Mahasiswa'){
        header("Location: mahasiswa/registerMahasiswa.php");
        die();
    }else if($_POST["user_type"] == 'Dosen'){
        
    }
}
?>