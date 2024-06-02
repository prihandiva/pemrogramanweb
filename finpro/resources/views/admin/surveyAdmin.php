<?php
include "Crud.php";
session_start();
if (!isset($_SESSION["nama"]))
{
header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Survey</title>
    <link rel="stylesheet" href="mahasiswa-beranda.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <style>
        body {
            font-family: "Montserrat";
            font-style: normal;
            font-weight: 400;
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
    </div>
    <hr class="border-2 border-black" />
    <!--DIV 2 (BODY)-->
    <div class="grid grid-cols-5 h-screen">
        <!--DIV KIRI (SIDE BAR KIRI)-->
        <div class="left bg-[#130B2d] py-20 relative">
            <ul class="grid grid-rows-3 gap-3 text-center text-sm items-center justify-center">
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="dashboardAdmin.php"><img src="../aset/dashSym.svg" class="w-10" /><span>Dashboard</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2685F5] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="surveyAdmin.php"><img src="../aset/surveySym.svg" class="w-10" /><span>Survey</span></a>
                </li>
                <li class="px-5 py-2 bg-[#423C57] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="../logout.php"><img src="../aset/Logout.svg" class="w-10" /><span>LOG OUT</span></a></li>
            </ul>
        </div>
        <!--DIV KANAN-->
        <div class="col-span-4">
            <div class="flex items-center gap-4 mb-20 mt-10">
                <img src="lambang-polinema1.png" class="w-20" />
                <div>
                    <h1 class="font-bold text-xl">SISKA - POLINEMA</h1>
                    <hr class="border-2 border-black" />
                    <p class="text-xs font-bold">SURVEY KEPUASAN PELANGGAN POLINEMA</p>
                </div>
            </div>
            <!--KONTEN-->
            <div class="flex items-center justify-center gap-8 w-full start-6">
                <div>
                    <a href= "editSurvey.php"> <img src="../aset/edit.svg" class="w-40 mb-10">
                        <h1 class="text-center text-2xl"><b>EDIT SURVEY</b></h1>
                    </a>
                </div>
                <div>
                    <a href="respondenSurvey.php"> <img src="../aset/responden_survey.png" class="w-40">
                        <h1 class="text-center text-2xl"><b>RESPONDEN SURVEY</b></h1>
                    </a>
                </div>
                <div>
                    <a href="LaporanSurvey.php"> <img src="../aset/Laporan_survey.svg" class="w-40">
                        <h1 class="text-center text-2xl"><b>LAPORAN SURVEY</b></h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>