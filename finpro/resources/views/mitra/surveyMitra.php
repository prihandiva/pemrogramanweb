<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION["nama"]))
{
header("location: ../index.php");
}

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Survey</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
<style>
    body {
        font-family: "Montserrat";
        font-style: normal;
        font-weight: 400;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>

<body>
    <!--DIV 1 (HEADER)-->
    <div class="grid grid-cols-2">
        <div class="left relative">
            <div class="flex items-center gap-4 mb-2 ps-4">
                <img src="lambang-polinema1.png" class="w-20" />
                <div>
                    <h1 class="font-bold text-xl">SISKA - POLINEMA</h1>
                    <p class="text-xs font-bold">SURVEY KEPUASAN PELANGGAN POLINEMA</p>
                </div>
            </div>
        </div>
        <div class="text-sm text-end mt-10">
            <h1><b><?= $_SESSION['nama'] ?> | <?= $_SESSION['user_type'] ?></b></h1>
        </div>
        <hr>
    </div>
    <hr class="border-2 border-black" />


    <!--DIV 2 (BODY)-->
    <div class="grid grid-cols-5 h-screen">
        <!--DIV KIRI (SIDE BAR KIRI)-->
        <div class="left bg-[#130B2d] py-20 relative">
            <ul class="grid grid-rows-3 gap-3 text-center text-sm items-center justify-center">
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="dashboardMitra.php"><img src="../aset/dashSym.svg" class="w-10" /><span>Dashboard</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2685F5] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="surveyMitra.php"><img src="../aset/surveySym.svg" class="w-10" /><span>Survey</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="reportMitra.php"><img src="../aset/ReportSym.svg" class="w-10" /><span>Report</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="profileMitra.php"><img src="../aset/profileSym.svg" class="w-10" /><span>Profile</span></a>
                </li>
                <li class="px-5 py-2 bg-[#423C57] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="../logout.php"><img src="../aset/Logout.svg" class="w-10" /><span>LOG OUT</span></a>
            </ul>
        </div>





        <!--DIV KANAN-->
        <div class="col-span-4">
            <h1 class="font-bold text-5xl mt-20 mb-10 px-10">Pilih Penilaian</h1>
            <div>
            </div>


            <!--KONTEN-->
            <ul class="grid grid-rows-3 gap-3 text-sm  px-10">
                <!--FASILITAS-->
                <a class="w-full" href="penilaianFasilitas_Mitra.php">
                    <li class="flex items-center justify-start gap-4 w-full px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                        <img src="../aset/Facility.svg">
                        <div>
                            <h1 class="font-bold text-xl">Penilaian Fasilitas dan Layanan</h1>
                            <p class="text-xs font-bold">Berikan Penilaian anda untuk fasilitas pada kampus Polinema</p>
                        </div>
                    </li>
                </a>
                <!--KURIKULUM-->
                <a class="w-full" href="penilaianMahasiswa_Mitra.php">
                    <li class="flex items-center justify-start gap-4 w-full px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                        <img src="../aset/mhsSurvey.svg">
                        <div>
                            <h1 class="font-bold text-xl">Penilaian Kualitas Mahasiswa</h1>
                            <p class="text-xs font-bold">Berikan Penilaian anda untuk Kinerja para dosen di Polinema</p>
                        </div>
                    </li>
                </a>
            </ul>
        </div>
    </div>
    </div>

    <div>

    </div>
</body>

</html>