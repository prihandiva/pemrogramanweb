<?php
require_once 'Crud.php';
include '../koneksi.php';
session_start();
if (!isset($_SESSION["nama"]))
{
header("location: ../index.php");
}

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
$id_soal = $_GET['id_soal'];
$sqlSoal = "SELECT soal_nama From m_survey_soal WHERE id_soal = '$id_soal'";
$resultSoal = $connect->query($sqlSoal);

// Mengambil nilai dari hasil query
$row = $resultSoal->fetch_assoc();
$soal_nama = $row['soal_nama'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hapus Soal</title>
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
                    <a class="flex items-center gap-3" href="../logout.php"><img src="../aset/Logout.svg" class="w-10" /><span>LOG OUT</span></a></li>
            </ul>
        </div>
        <!--DIV KANAN-->
        <div class="col-span-4">
        <div>
            <h1 class="font-bold text-3xl ps-10 mt-6">Hapus Pertanyaan</h1>
        </div>
        <div class="w-[900px] mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="" method="POST" class="flex flex-col">
        <div class="mb-4">
            <label for="question" class="block text-gray-700 text-lg font-bold mb-2">Pertanyaan</label>
            <input type="text" id="question" name="question"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   value="<?= $soal_nama ?>" readonly>
        </div>
        <div class="">
            <span class="block text-gray-700 text-lg font-bold mb-2">Keterangan</span>
            <label class="inline-flex items-center mt-3 mr-4">
                <input type="radio" name='rating' value='kurang'
                       class='form-radio h-5 w-5 text-gray-600' disabled><span
                        class='ml-2 text-gray'>Kurang</span>
            </label>
            <label class="inline-flex items-center mt-3 mr-4">
                <input type="radio" name='rating' value='cukup'
                       class='form-radio h-5 w-5 text-gray-600' disabled><span
                        class='ml-2 text-gray'>Cukup</span>
            </label>
            <label class="inline-flex items-center mt-3 mr-4">
                <input type="radio" name='rating' value='baik'
                       class='form-radio h-5 w-5 text-gray-600' disabled><span
                        class='ml-2 text-gray'>Baik</span>
            </label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name='rating' value='sangat_baik'
                       class='form-radio h-5 w-5 text-gray-600' disabled><span
                        class='ml-2 text-gray'>Sangat Baik</span>
            </label>
        </div>
        <button class=" self-end" type="submit">
            <div class="bg-violet-950 rounded-[15px] text-center text-white px-4  py-3 text-lg font-bold capitalize leading-normal" >Hapus</div>
        </button>
    

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id_soal'])) {
            // Ambil nilai dari input teks
            $question = $_POST['question'];
            $id_soal = $_GET['id_soal'];
            
            $crud = new Crud();

            if ($crud->hapusSoal($question, $id_soal)) {
                echo "Data berhasil dihapus dari tabel soal.";
            } else {
                echo "Error: Data tidak berhasil dihapus.";
            }
        }
    ?>
    </form>
    </div>
    </div>
    </div>
    </div>
</body>
</html>
