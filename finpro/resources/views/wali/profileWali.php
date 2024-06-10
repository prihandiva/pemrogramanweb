<?php
session_start();
include "koneksi.php"; // Mengimpor file koneksi.php

// Proses login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melindungi dari SQL Injection
    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);

    $sql = "SELECT id_user, nama FROM m_user WHERE username='$username' AND password='$password'";
    $result = $connect->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['user_type'] = 'Wali Mahasiswa'; // Contoh user type
        header("Location: profileWali.php");
        exit();
    } else {
        echo "Username atau password salah.";
    }
}

// Memastikan `id_user` ada di sesi
if (!isset($_SESSION['id_user'])) {
    echo "Anda belum login.";
    exit();
}

$id_user = $_SESSION['id_user']; // Ambil id_user dari sesi

// Query untuk mendapatkan data Wali Mahasiswa berdasarkan id_user
$sql = "SELECT * FROM r_ortu WHERE id_user = $id_user";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Mendapatkan data Wali Mahasiswa
    $ortu_nama = $row['ortu_nama'];
    $ortu_jk = $row['ortu_jk'];
    $ortu_umur = $row['ortu_umur'];
    $ortu_hp = $row['ortu_hp'];
    $ortu_pendidikan = $row['ortu_pendidikan'];
    $ortu_pekerjaan = $row['ortu_pekerjaan'];
    $ortu_penghasilan = $row['ortu_penghasilan'];
    $mhs_nim = $row['mhs_nim'];
    $mhs_nama = $row['mhs_nama'];
    $mhs_prodi = $row['mhs_prodi'];
} else {
    echo "Tidak ada data Wali Mahasiswa ditemukan.";
    exit();
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ortu_hp'])) {
        $ortu_hp = $_POST['ortu_hp'];

        // Melindungi dari SQL Injection
        $ortu_hp = mysqli_real_escape_string($connect, $ortu_hp);

        $sql = "UPDATE r_ortu SET ortu_hp = ? WHERE id_user = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("si", $ortu_hp, $id_user);
        $stmt->close();
    }
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Wali</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <style>
        body {
            font-family: "Montserrat";
            font-style: normal;
            font-weight: 400;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .profile-card h2 {
            margin: 0;
            margin-bottom: 10px;
        }

        .profile-card p {
            margin: 0;
            margin-bottom: 20px;
        }

        .profile-card a {
            display: block;
            background-color: #2685F5;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .profile-card a:hover {
            background-color: #1A62B5;
        }

        .photo-caption {
            text-align: center;
            margin-top: 10px;
        }

        .profile-info-label {
            font-weight: bold;
            font-size: 16px;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!--DIV 1 (HEADER)-->
    <div class="grid grid-cols-2">
        <div class="left relative">
            <div class="flex items-center gap-4 mb-2 ps-4">
                <img src="../aset/lambang-polinema1.png" class="w-20" />
                <div>
                    <h1 class="font-bold text-xl">SISKA - POLINEMA</h1>
                    <p class="text-xs font-bold">SURVEY KEPUASAN PELANGGAN POLINEMA</p>
                </div>
            </div>
        </div>
        <div class="text-sm text-end mt-10">
            <h1><b><?= $_SESSION['nama'] ?> | <?= $_SESSION['user_type'] ?></b></h1>
        </div>
        <hr />
    </div>
    <hr class="border-2 border-black" />
    <!--DIV 2 (BODY)-->
    <div class="grid grid-cols-5 h-screen">
        <!--DIV KIRI (SIDE BAR KIRI)-->
        <div class="left bg-[#130B2d] py-20 relative">
            <ul class="grid grid-rows-3 gap-3 text-center text-sm items-center justify-center">
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="dashboardWali.php"><img src="../aset/dashSym.svg" class="w-10" /><span>Dashboard</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="surveyWali.php"><img src="../aset/surveySym.svg" class="w-10" /><span>Survey</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="reportWali.php"><img src="../aset/ReportSym.svg" class="w-10" /><span>Report</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2685F5] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="profileWali.php"><img src="../aset/profileSym.svg" class="w-10" /><span>Profile</span></a>
                </li>
                <li class="px-5 py-2 bg-[#423C57] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="../logout.php"><img src="../aset/Logout.svg" class="w-10" /><span>LOG OUT</span></a>
                </li>
            </ul>
        </div>
        <!--DIV KANAN (PROFILE CONTENT)-->
        <div class="col-span-4 p-10">
            <div class="flex">
                <div class="card-container flex">
                    <div class="flex justify-end">
                        <form action="profileWali.php" method="POST">
                            <div class="form">
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Nama</p>
                                <input type="text" name="nama" value="<?= $ortu_nama ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Jenis Kelamin</p>
                                <input type="text" name="jk" value="<?= $ortu_jk ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Umur</p>
                                <input type="text" name="umur" value="<?= $ortu_umur ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">No HP</p>
                                <input type="text" name="ortu_hp" value="<?= $ortu_hp ?>" class="px-3 py-2 mb-3 bg-white rounded-xl w-full" />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Pendidikan</p>
                                <input type="text" name="ortu_pendidikan" value="<?= $ortu_pendidikan ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Pekerjaan</p>
                                <input type="text" name="ortu_pekerjaan" value="<?= $ortu_pekerjaan ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Penghasilan</p>
                                <input type="text" name="ortu_penghasilan" value="<?= $ortu_penghasilan ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">NIM Mahasiswa</p>
                                <input type="text" name="mhs_nim" value="<?= $mhs_nim ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Nama Mahasiswa</p>
                                <input type="text" name="mhs_nama" value="<?= $mhs_nama ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Prodi Mahasiswa</p>
                                <input type="text" name="mhs_prodi" value="<?= $mhs_prodi ?>" class="px-3 py-2 mb-3 bg-[#F4F4F4] rounded-xl w-full" readonly />
                                <div class="mt-40 mb-36 ps-80">
                                <button type="submit" class="btn btn-primary fw-bold tombol bg-[#2D1B6B] text-white px-5 py-2" style="border-radius: 10px; width: 100%;">Simpan</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="circle" style="margin-top: 20px; margin-left: 100px;">
                        <img src="../aset/lambang-polinema1.png" alt="Placeholder Image" width="250" height="285">
                        <div class="photo-caption">
                            <button class="btn btn-primary fw-bold tombol bg-[#2D1B6B] text-white px-5 py-2" style="border-radius: 10px; width: 100%;">WALI MAHASISWA</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
