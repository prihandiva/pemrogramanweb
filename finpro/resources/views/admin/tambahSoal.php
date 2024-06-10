<?php

require_once 'Crud.php';

session_start();
if (!isset($_SESSION["nama"])) {
    header("location: ../index.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Pertanyaan</title>
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
                    <a class="flex items-center gap-3" href="../logout.php"><img src="../aset/Logout.svg" class="w-10" /><span>LOG OUT</span></a>
                </li>
            </ul>
        </div>
        <!--DIV KANAN-->
        <div class="col-span-4">
            <div>
                <h1 class="font-bold text-3xl ps-10 mt-6">Tambah Pertanyaan Survey Fasilitas Polinema</h1>
            </div>
            <div class="w-[900px] mx-auto bg-white p-6 rounded-lg shadow-md">
                <form action="" method="POST"> <!--Harus pindah file kah?-->
                    <div class="mb-4">
                        <label for="question" class="block text-gray-700 text-lg font-bold mb-2">Pertanyaan</label>
                        <input type="text" id="question" name="question" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="">
                        
                            <select name="user_type" class="w-full border px-4 rounded-lg text-sm h-10 mt-10">
                                <option value="">Tujuan Responden</option>
                                <option value="1">Mahasiswa</option>
                                <option value="2">Dosen</option>
                                <option value="3">Wali Mahasiswa</option>
                                <option value="4">Tenaga Pendidikan</option>
                                <option value="5">Mitra</option>
                                <option value="6">Alumni</option>
                            </select>
                            
                        <?php
                        // Periksa apakah form telah dikirim
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id_kategori'])) {
                            // Ambil nilai dari input teks
                            $question = $_POST['question'];
                            $id_kategori = $_GET['id_kategori'];
                            $id_survey = $_POST['user_type'];

                            //OOP
                            $crud = new Crud();

                            if ($crud->tambahSoal($question, $id_kategori,$id_survey)) {
                                echo "Data berhasil ditambahkan ke tabel soal.";
                            } else {
                                echo "Error: Data tidak berhasil ditambahkan.";
                            }
                        }
                        ?>
                    </div>

                    <div class="">
                        <span class="block text-gray-700 text-lg font-bold mb-2">Keterangan</span>
                        <label class="inline-flex items-center mt-3 mr-4"> <!--HARUS E BULLET E GABISA DI KLIK-->
                            <input type="radio" name='rating' value='kurang' class='form-radio h-5 w-5 text-gray-600' disabled><span class='ml-2 text-gray'>Kurang</span>
                        </label>
                        <label class="inline-flex items-center mt-3 mr-4">
                            <input type="radio" name='rating' value='cukup' class='form-radio h-5 w-5 text-gray-600' disabled><span class='ml-2 text-gray'>Cukup</span>
                        </label>
                        <label class="inline-flex items-center mt-3 mr-4">
                            <input type="radio" name='rating' value='baik' class='form-radio h-5 w-5 text-gray-600' disabled><span class='ml-2 text-gray'>Baik</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="radio" name='rating' value='sangat_baik' class='form-radio h-5 w-5 text-gray-600' disabled><span class='ml-2 text-gray'>Sangat Baik</span>
                        </label>
                    </div>

                    <div type="submit" class="w-[130px] h-[53px] relative">
                        <button type="submit" class="end-content bg-[#2D1B6B] border-[#2D1B6B] text-white py-2 px-4 rounded-xl border-4"><b>Simpan</b></button>
                    </div> 
                </form>

            </div>
        </div>
    </div>
</body>

</html>