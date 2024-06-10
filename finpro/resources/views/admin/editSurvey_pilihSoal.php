<?php
include "../koneksi.php";

session_start();
if (!isset($_SESSION["nama"]))
{
header("location: ../index.php");
}



$id_kategori = $_GET['id_kategori'];

$sqlKategori = "SELECT kategori_nama From m_kategori WHERE id_kategori = '$id_kategori'";
$resultKategori = mysqli_query($connect,$sqlKategori);

?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Pilih Soal</title>
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
        <hr />
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
            <main class="col-span-4">
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h1 class="text-6xl font-bold mb-6"> <?= ($resultKategori->num_rows > 0)? $resultKategori->fetch_assoc()['kategori_nama'] : 'Kategori Not Found' ?></h1>
                    <form action="" method="post">
                        <div class="grid gap-4 col-span-4">
                            <?php

                                $sql = "SELECT s.id_soal, s.id_survey, k.kategori_nama, k.id_kategori, soal_nama FROM m_survey_soal s LEFT JOIN m_kategori k ON s.id_kategori = k.id_kategori WHERE s.id_kategori = $id_kategori;";
                                $result = mysqli_query($connect,$sql);


                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="rounded-3xl border-[#2D1B6B] border-4 w-full flex justify-between overflow-hidden">
                                        <div class="px-5 py-4 grow">
                                            <h2 class="text-xl font-bold mb-2"><?= $row['soal_nama'] ?></h2>
                                            <div class="flex justify-evenly gap-6 w-full">
                                                <div>
                                                    <input type="radio" id="<?= $row['id_kategori'] . '1' ?>" name="<?= $row['id_soal'] ?>" value="kurang" disabled/>
                                                    <label for="<?= $row['id_kategori'] . '1' ?>" class=" text-black py-2 px-4 rounded-xl">Kurang</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="<?= $row['id_kategori'] . '2' ?>" name="<?= $row['id_soal'] ?>" value="cukup" disabled/>
                                                    <label for="<?= $row['id_kategori'] . '2' ?>" class=" text-black py-2 px-4 rounded-xl">Cukup</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="<?= $row['id_kategori'] . '3' ?>" name="<?= $row['id_soal'] ?>" value="baik" disabled/>
                                                    <label for="<?= $row['id_kategori'] . '3' ?>" class=" text-black py-2 px-4 rounded-xl">Baik</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="<?= $row['id_kategori'] . '4' ?>" name="<?= $row['id_soal'] ?>" value="sangat baik" disabled/>
                                                    <label for="<?= $row['id_kategori'] . '4' ?>" class=" text-black py-2 px-4 rounded-xl">Sangat Baik</label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <a href="editSoal.php?id_soal=<?=$row['id_soal']?>" class="">
                                                <button class="ml-4 bg-[#2D1B6B] hover:bg-blue-700 text-white font-bold py-2 px-4 h-full " type="button">Edit</button>
                                        </a>
                                        <a href="hapusSoal.php?id_soal=<?=$row['id_soal']?>" class="">
                                                <button class="ml-4 bg-[#2D1B6B] hover:bg-blue-700 text-white font-bold py-2 px-4 h-full " type="button">Hapus</button>
                                        </a>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            $connect->close();
                            ?>
                            <div class="flex justify-between w-full md-40">
                                <div>
                                    <button class="bg-white text-[#2D1B6B] border-[#2D1B6B] py-2 px-4 rounded-xl border-[#2D1B6B] border-4" type="back"><a href="editSurvey.php"><b>Kembali</b></a></button>
                                </div>
                                <div>
                                    <a class="bg-white text-[#2D1B6B] border-[#2D1B6B] py-2 px-4 rounded-xl border-[#2D1B6B] border-4" href="tambahSoal.php?id_kategori=<?=$id_kategori?>"><b>Tambah</b></a>
        
                                    <button class="end-content bg-[#2D1B6B] border-[#2D1B6B] text-white py-2 px-4 rounded-xl border-4" type="submit"><a href="editSurvey.php"><b>Simpan</b></a></button>
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