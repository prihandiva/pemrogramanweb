<?php
session_start();


include 'koneksi.php'; // Include the connection file

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

    $id_user = '';
    if ($resultUser === TRUE) {
        // Mendapatkan ID user yang baru saja dimasukkan
        $id_user = $connect->insert_id;

        echo "User ID: " . $id_user . "<br>"; // Debugging

       
    } else {
        echo "Error inserting into m_user: " . $sql . "<br>" . $connect->error;
    }
}

if (isset($_POST['nip']) && isset($_POST['unit'])) {
    $responden_id_user = $_POST['id_user'];
    $responden_nip = $_POST['nip'];
    $responden_nama = $_POST['nama'];
    $responden_unit = $_POST['unit'];


    // Melindungi dari SQL Injection
    $responden_nip = mysqli_real_escape_string($connect, $responden_nip);
    $responden_unit = mysqli_real_escape_string($connect, $responden_unit);

    $sql2 = "INSERT INTO r_dosen (dosen_nip, dosen_nama, dosen_unit, id_user) VALUES ('$responden_nip', '$responden_nama', '$responden_unit', '$responden_id_user')";

    echo "SQL2: " . $sql2 . "<br>"; // Debugging

    $resultRegister = $connect->query($sql2);

    if ($resultRegister === TRUE) {
        echo "Akun dosen berhasil didaftarkan.";
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error inserting into r_dosen: " . $sql2 . "<br>" . $connect->error;
    }
}
$connect->close();

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
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">NIP</p>
            <input type="text" name="nip" placeholder="Masukkan NIP" class="w-full border px-4 rounded-lg text-sm h-10">
            <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2 mt-2">Unit</p>
            <select name="unit" class="w-full border px-4 rounded-lg text-sm h-10 mt-4">
                                <option value="">Pilih Unit</option>
                                <option value="Jurusan Teknologi Informasi">Jurusan Teknologi Informasi</option>
                                <option value="Jurusan Administrasi Niaga">Jurusan Administrasi Niaga</option>
                                <option value="Jurusan Akutansi">Jurusan Akutansi</option>
                                <option value="Jurusan Teknik Kimia">Jurusan Teknik Kimia</option>
                                <option value="Jurusan Teknik Elektro">Jurusan Teknik Elektro</option>
                                <option value="Jurusan Teknik Mesin">Jurusan Teknik Mesin</option>
                                <option value="Jurusan Teknik Sipil">Jurusan Teknik Sipil</option>
                                <option value="Mata Kuliah Umum">Mata Kuliah Umum</option>
                            </select>
            <div class="bg-[#2D1B6B] w-full py-2 text-center rounded-md mt-4">
                <button type="submit" class="text-white font-bold">Buat Akun Baru</button>
            </div>
        </form>
    </main>
</body>
</html>
<?php



?>


