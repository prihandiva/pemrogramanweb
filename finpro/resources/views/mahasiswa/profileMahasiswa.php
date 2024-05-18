<?php 
session_start();
if (!isset($_SESSION["nama"]))
{
header("location: ../index.php");
}
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "projekakhir";

$conn = new mysqli($servername, $username_db, $password_db, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Profile</title>
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
                    <a class="flex items-center gap-3" href="dashboardMahasiswa.php"><img src="../aset/dashSym.svg" class="w-10" /><span>Dashboard</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="surveyMahasiswa.php"><img src="../aset/surveySym.svg" class="w-10" /><span>Survey</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="reportMahasiswa.php"><img src="../aset/ReportSym.svg" class="w-10" /><span>Report</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2685F5] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="profileMahasiswas.php"><img src="../aset/profileSym.svg" class="w-10" /><span>Profile</span></a>
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
            <form class="" action="profileMahasiswaEdit.php">
                <div class="form">
                    <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">NIM</p>
                    <input type="text" name="username" id="username" class="form-control pb-2 px-2" placeholder="111xxxxxxxx" style="border-radius: 15px; border-width: 2px; width: 600px; height: 57px;" disabled>
                </div>
                <div class="form">
                    <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Nama Lengkap</p>
                    <input type="text" name="username" id="nama" class="form-control pb-2 px-2" placeholder="Fahmi Mardiansyah" style="border-radius: 15px; border-width: 2px; width: 600px; height: 57px;" disabled>
                </div>
                <div class="form">
                    <p style="text-align: left; font-weight: bold; font-size: 15px; color: #000000; opacity: 75%; padding-left: 5px;" class="mb-2">Nomor HP</p>
                    <input type="text" name="username" id="no" class="form-control pb-2 px-2" placeholder="0812xxxxxxxx" style="border-radius: 15px; border-width: 2px; width: 600px; height: 57px;" disabled>
                </div>
                <!-- <div>
                    <button type="submit" id="edit" class="btn btn-primary fw-bold tombol bg-[#2D1B6B] text-white px-5 py-2" value="edit" style="border-radius: 10px; width: 100%;" href="profileDosenEdit.php">Edit</button>
                </div> -->
                <div class="mt-40 mb-36 ps-80">
                <a href="profileMahasiswaEdit.php" class="btn btn-primary fw-bold tombol bg-[#2D1B6B] text-white px-5 py-2" style="border-radius: 10px; width: 100%;"class="mb-2">Edit</a>
            </div>
</form>
        </div>
        <div class="circle" style="margin-top: 20px; margin-left: 100px;">
            <img src="../aset/lambang-polinema1.png" alt="Placeholder Image" width="250" height="285">
                <div class="photo-caption">
                <button class="btn btn-primary fw-bold tombol bg-[#2D1B6B] text-white px-5 py-2" style="border-radius: 10px; width: 100%;">MAHASISWA</button>
                </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>