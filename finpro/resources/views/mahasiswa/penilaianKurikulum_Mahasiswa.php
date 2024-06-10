<?php 
session_start();
if (!isset($_SESSION["nama"]))
{
header("location: ../index.php");
}
include 'koneksi.php'; // Include the connection file

/// Set id_kategori ke dalam session
$_SESSION['id_kategori'] = 4;

// Check apakah session 'nama' sudah diset
if (isset($_SESSION['nama'])) {
    $sql = "SELECT * FROM t_responden_mhs WHERE id_kategori = 4 AND responden_nama = '" . $_SESSION['nama'] . "'" ;
    $result = mysqli_query($connect, $sql);
    if ($result->num_rows > 0) {
        header("Location: sudahIsi_Mahasiswa.php");
        die();
    }
}
$sql = "SELECT s.id_soal, s.id_survey id_survey, k.kategori_nama, k.id_kategori id_kategori, soal_nama FROM m_survey_soal s LEFT JOIN m_kategori k ON s.id_kategori = k.id_kategori WHERE s.id_kategori = 4 && s.id_survey = 1;";
$result = mysqli_query($connect, $sql);
?>







<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Survey Kurikulum</title>
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
                <img src="../aset/lambang-polinema1.png" class="w-20" />
                <div>
                    <h1 class="font-bold text-xl">SISKA - POLINEMA</h1>
                    <p class="text-xs font-bold">SURVEY KEPUASAN PELANGGAN POLINEMA</p>
                </div>
            </div>
        </div>
        <div class="text-sm text-end mt-10">
            <h1><b><?=$_SESSION['nama']?> | <?=$_SESSION['user_type']?></b></h1>
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
                <li class="px-5 py-2 bg-[#2685F5] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="surveyMahasiswa.php"><img src="../aset/surveySym.svg" class="w-10" /><span>Survey</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="reportMahasiswa.php"><img src="../aset/ReportSym.svg" class="w-10" /><span>Report</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="profileMahasiswa.php"><img src="../aset/profileSym.svg" class="w-10" /><span>Profile</span></a>
                </li>
                <li class="px-5 py-2 bg-[#423C57] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="../logout.php"><img src="../aset/Logout.svg" class="w-10" /><span>LOG OUT</span></a>
                </li>
            </ul>
        </div>
        <!--DIV KANAN-->
        <div class="col-span-4">
        <main class="col-span-4">
        <div class="bg-white p-8 rounded-xl shadow-md">
        <h1 class="text-6xl font-bold mb-6">Penilaian Kurikulum</h1>
        <form action = "submitProses_Mahasiswa.php" method= "post">
            <div class="grid gap-4 col-span-4">
                <?php 
                if ($result->num_rows > 0) {
                    
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      ?>
                <div class="border rounded-3xl px-5 py-4 border-[#2D1B6B] border-4 w-full">
                    <input type="hidden" name="id_survey" value="<?= $row['id_survey']?>">
                    <input type="hidden" name="id_kategori" value="<?=$row['id_kategori']?>">
                    <h2 class="text-xl font-bold mb-2"><?=$row['soal_nama']?></h2>
                    <div class="flex justify-evenly gap-6 w-full">
                    <div>
                        <input type="radio" id="<?=$row['id_kategori'].'1'?>" name="<?=$row['id_soal']?>" value="kurang"  />
                        <label for="<?=$row['id_kategori'].'1'?>" class=" text-black py-2 px-4 rounded-xl">Kurang</label>
                    </div>
                    <div>
                        <input type="radio" id="<?=$row['id_kategori'].'2'?>" name="<?=$row['id_soal']?>" value="cukup" />
                        <label for="<?=$row['id_kategori'].'2'?>" class=" text-black py-2 px-4 rounded-xl">Cukup</label>
                    </div>
                    <div>
                        <input type="radio" id="<?=$row['id_kategori'].'3'?>" name="<?=$row['id_soal']?>" value="baik" />
                        <label for="<?=$row['id_kategori'].'3'?>" class=" text-black py-2 px-4 rounded-xl">Baik</label>
                    </div>
                    <div>
                        <input type="radio" id="<?=$row['id_kategori'].'4'?>" name="<?=$row['id_soal']?>" value="sangat baik" />
                        <label for="<?=$row['id_kategori'].'4'?>" class=" text-black py-2 px-4 rounded-xl">Sangat Baik</label>
                    </div>
                    </div>
                </div>
                <?php
                    }
                  } else {
                    echo "0 results";
                  }
                  $connect->close();
                ?>
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-2">Kolom Kritik dan Saran</h2>
                <textarea class="w-full p-4 rounded-xl border border-[#2D1B6B]" name="saran"></textarea>
            </div>
            <div>
            <div class="flex justify-between w-full">
            <button class="bg-white text-[#2D1B6B] border-[#2D1B6B] py-2 px-4 rounded-xl border-[#2D1B6B] border-4" type="back"><a href="surveyMahasiswa.php"><b>Survey Page</b></a></button>
            <button class="end-content bg-[#2D1B6B] text-white py-2 px-4 rounded-xl" type="submit">Simpan</button>
            </div>
            </div>
        </form>
    </div>
</main>
        </div>
    </div>
    <div class=""></div>
    <div></div>
</body>

</html>