<?php
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM mahasiswa WHERE username='$username' AND password='$password'";
try {
    $result = mysqli_query($connect, $query);
    $cek = mysqli_num_rows($result);
} catch (Exception $e) {
    echo $e->getMessage();
}

if ($cek) {
    echo "Anda berhasil login. Silahkan menuju "; ?>
        <a href = "index.html">Halaman Ujian</a>
        <?php
} else {
    echo "Anda gagal login. Silahkan coba lagi"; ?>
        <a href = "login.html"> Login Kembali</a>
        <?php echo mysqli_error($connect);
}
?>