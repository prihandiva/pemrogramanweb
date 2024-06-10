<?php
session_start();
include "koneksi.php"; // Mengimpor file koneksi.php



$id_user = '';
if (isset($_POST['username']) && isset($_POST['nama']) && isset($_POST['password']) && isset($_POST['user_type'])) {
    // Mendapatkan data dari formulir pendaftaran
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Melindungi dari SQL Injection
    $username = mysqli_real_escape_string($connect, $username);
    $nama = mysqli_real_escape_string($connect, $nama);
    $password = mysqli_real_escape_string($connect, $password);
    $user_type = mysqli_real_escape_string($connect, $user_type);

    // Query untuk memasukkan data ke dalam tabel
    $sql = "INSERT INTO m_user (username, nama, password, posisi) VALUES ('$username', '$nama', '$password', '$user_type')";
    $resultUser = $connect->query($sql);

    if ($resultUser === TRUE) {
        // Mendapatkan ID user yang baru saja dimasukkan
        $id_user = $connect->insert_id;
        echo "User ID: " . $id_user . "<br>"; // Debugging
    } else {
        echo "Error inserting into m_user: " . $sql . "<br>" . $connect->error;
    }
}

if (isset($_POST['ortu_nama']) && isset($_POST['ortu_jk']) && isset($_POST['ortu_umur']) && isset($_POST['ortu_hp']) && isset($_POST['ortu_pendidikan']) && isset($_POST['ortu_pekerjaan']) && isset($_POST['ortu_penghasilan']) && isset($_POST['mhs_nim']) && isset($_POST['mhs_nama']) && isset($_POST['mhs_prodi']) && isset($_POST['id_user'])) {
    $responden_id_user = $_POST['id_user'];
    $responden_nama = $_POST['ortu_nama'];
    $responden_jk = $_POST['ortu_jk'];
    $responden_umur = $_POST['ortu_umur'];
    $responden_hp = $_POST['ortu_hp'];
    $responden_pendidikan = $_POST['ortu_pendidikan'];
    $responden_pekerjaan = $_POST['ortu_pekerjaan'];
    $responden_penghasilan = $_POST['ortu_penghasilan'];
    $mhs_nim = $_POST['mhs_nim'];
    $mhs_nama = $_POST['mhs_nama'];
    $mhs_prodi = $_POST['mhs_prodi'];

    // Melindungi dari SQL Injection
    $responden_id_user = mysqli_real_escape_string($connect, $responden_id_user);
    $responden_nama = mysqli_real_escape_string($connect, $responden_nama);
    $responden_jk = mysqli_real_escape_string($connect, $responden_jk);
    $responden_umur = mysqli_real_escape_string($connect, $responden_umur);
    $responden_hp = mysqli_real_escape_string($connect, $responden_hp);
    $responden_pendidikan = mysqli_real_escape_string($connect, $responden_pendidikan);
    $responden_pekerjaan = mysqli_real_escape_string($connect, $responden_pekerjaan);
    $responden_penghasilan = mysqli_real_escape_string($connect, $responden_penghasilan);
    $mhs_nim = mysqli_real_escape_string($connect, $mhs_nim);
    $mhs_nama = mysqli_real_escape_string($connect, $mhs_nama);
    $mhs_prodi = mysqli_real_escape_string($connect, $mhs_prodi);

    // Query untuk memasukkan data ke dalam tabel r_ortu
    $sql2 = "INSERT INTO r_ortu (id_user, ortu_nama, ortu_jk, ortu_umur, ortu_hp, ortu_pendidikan, ortu_pekerjaan, ortu_penghasilan, mhs_nim, mhs_nama, mhs_prodi) VALUES ('$responden_id_user', '$responden_nama', '$responden_jk', '$responden_umur', '$responden_hp', '$responden_pendidikan', '$responden_pekerjaan', '$responden_penghasilan', '$mhs_nim', '$mhs_nama', '$mhs_prodi')";

    echo "SQL2: " . $sql2 . "<br>"; // Debugging

    $resultRegister = $connect->query($sql2);

    if ($resultRegister === TRUE) {
        echo "Akun Wali mahasiswa berhasil didaftarkan.";
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error inserting into r_ortu: " . $sql2 . "<br>" . $connect->error;
    }
}
$connect->close();
?>


<!DOCTYPE html>
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
    <main class="mx-20 mt-20 w-[700px] mx-auto bg-white p-10 rounded-lg shadow-md">
        <div class="pt-10">
            <div class="flex items-center justify-center gap-4 mb-10">
                <img src="../aset/lambang-polinema1.png" class="w-20">
                <div class="font-bold">
                    <h1 class="">POLITEKNIK<br> NEGERI MALANG</h1>
                </div>
            </div>
        </div>

        <div class="text-center mb-10">
            <h1 class="font-bold text-2xl">Buat Akun Baru</h1>
            <p class="text-sm">Buat Akun Baru Untuk Memulai Isi Survey
                <br>Silahkan masukkan data diri di bawah ini
            </p>
        </div>

        <form action="" method="post">
        <input type="text" name="id_user" value="<?= $id_user ?>" hidden>
            <input type="text" value="<?= $nama ?>" name="ortu_nama" hidden>
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Jenis Kelamin</p>
            <select name="ortu_jk" class="w-full border px-4 rounded-lg text-sm h-10 mt-2">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Umur</p>
            <input type="text" name="ortu_umur" placeholder="Masukkan Umur" class="w-full border px-4 rounded-lg text-sm h-10">
            
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Nomor HP</p>
            <input type="text" name="ortu_hp" placeholder="Masukkan Nomor Handphone" class="w-full border px-4 rounded-lg text-sm h-10">
            
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Pendidikan</p>
            <input type="text" name="ortu_pendidikan" placeholder="Masukkan Pendidikan" class="w-full border px-4 rounded-lg text-sm h-10">
            
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Pekerjaan</p>
            <input type="text" name="ortu_pekerjaan" placeholder="Masukkan Pekerjaan" class="w-full border px-4 rounded-lg text-sm h-10">
            
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Penghasilan</p>
            <input type="text" name="ortu_penghasilan" placeholder="Masukkan Penghasilan" class="w-full border px-4 rounded-lg text-sm h-10">
            
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">NIM Mahasiswa</p>
            <input type="text" name="mhs_nim" placeholder="Masukkan NIM Mahasiswa" class="w-full border px-4 rounded-lg text-sm h-10">
            
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Nama Mahasiswa</p>
            <input type="text" name="mhs_nama" placeholder="Masukkan Nama Mahasiswa" class="w-full border px-4 rounded-lg text-sm h-10">
            
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Program Studi</p>
            <select name="mhs_prodi" class="w-full border px-4 rounded-lg text-sm h-10 mt-2">
                <option value="">Pilih Program Studi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi Bisnis">Sistem Informasi Bisnis</option>
                <option value="Teknik Elektronika">Teknik Elektronika</option>
                <option value="Sistem Kelistrikan">Sistem Kelistrikan</option>
                <option value="Jaringan Telekomunikasi Digital">Jaringan Telekomunikasi Digital</option>
                <option value="Teknologi Kimia Industri">Teknologi Kimia Industri</option>
                <option value="Teknik Otomotif Elektronik">Teknik Otomotif Elektronik</option>
                <option value="Teknik Mesin Produksi Dan Perawatan">Teknik Mesin Produksi Dan Perawatan</option>
                <option value="Manajemen Rekayasa Konstruksi">Manajemen Rekayasa Konstruksi</option>
                <option value="Teknologi Rekayasa Konstruksi Jalan Dan Jembatan">Teknologi Rekayasa Konstruksi Jalan Dan Jembatan</option>
                <option value="Akuntansi Manajemen">Akuntansi Manajemen</option>
                <option value="Keuangan">Keuangan</option>
                <option value="Manajemen Pemasaran">Manajemen Pemasaran</option>
                <option value="Pengelolaan Arsip Dan Rekaman Informasi">Pengelolaan Arsip Dan Rekaman Informasi</option>
                <option value="Usaha Perjalanan Wisata">Usaha Perjalanan Wisata</option>
                <option value="Bahasa Inggris Untuk Komunikasi Bisnis Dan Profesional">Bahasa Inggris Untuk Komunikasi Bisnis Dan Profesional</option>
                <option value="Bahasa Inggris Untuk Industri Pariwisata">Bahasa Inggris Untuk Industri Pariwisata</option>
            </select>
            
            <div class="bg-[#2D1B6B] w-full py-2 text-center rounded-md mt-4">
                <button type="submit" class="text-white font-bold">Buat Akun Baru</button>
            </div>
        </form>
    </main>
</body>
</html>




