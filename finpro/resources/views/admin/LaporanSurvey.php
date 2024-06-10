<?php

include "Crud.php";
include "../koneksi.php";
session_start();
if (!isset($_SESSION["nama"])) {
    header("location: ../index.php");
}

$crud = new Crud();
$kategoriList = $crud->tampilKategori(); // Mendapatkan daftar kategori
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Survey</title>
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
                    <a class="flex items-center gap-3" href="../logout.php"><img src="../aset/Logout.svg" class="w-10" /><span>LOG OUT</span></a>
                </li>
            </ul>
        </div>
        <!--DIV KANAN-->
        <div class="col-span-4">
            <h1 class="text-4xl font-bold mb-6 mt-8 px-6">Laporan Survey</h1>
            <div class="w-[900px] mx-auto bg-white p-10 rounded-lg shadow-md mt-4">
                <!--Tabel-->
                <div>
                    <table class="border-collapse table-auto w-full text-sm mb-2">
                        <thead>
                            <tr class="mt-4 mb-4">
                                <th class="text-center text-lg">Jenis Penilaian</th>
                                <th class="text-center text-lg">Hasil Keseluruhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategoriList as $kategori): ?>
                                <?php 
                                    $id_kategori = $kategori['id_kategori'];
                                    $maxJawaban = $crud->tampilMaxJawaban($id_kategori);
                                ?>
                                <tr>
                                    <td class="py-2 px-4 border-b text-base">Hasil Keseluruhan <?= htmlspecialchars($kategori['kategori_nama']) ?></td>
                                    <td class="py-2 px-4 border-b bg-violet-950 rounded-[15px] text-center text-white px-4 py-3 text-base font-bold"><?= htmlspecialchars($maxJawaban) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
                
                
                <div class="justify center mt-10">
                    <button class="bg-violet-950 rounded-[15px] text-center text-white px-4 py-3 text-lg font-bold capitalize leading-normal">
                        <a href="lihatSaran.php"><b>Tampilkan Saran Dan Kritik User</b></a>
                    </button>
                    <!--<button class="bg-violet-950 rounded-[15px] text-center text-white px-4 py-3 text-lg font-bold capitalize leading-normal">
                        <a href="hitungBobot.php"><b>Bobot</b></a>
                    </button>-->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
