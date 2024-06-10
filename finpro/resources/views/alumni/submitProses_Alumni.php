<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION["nama"])) {
    header("location: ../index.php");
}


include 'koneksi.php'; // Include the connectection file

$nama = $_SESSION['nama'];
$GET_['id_survey'] = 6;
$id_survey = 6;

if (isset($_POST['id_survey']) && isset($_SESSION['nama']) && isset($_POST['saran']) && isset($_POST['id_kategori'])) {
    $id_survey = $_POST['id_survey'];
    $nama = $_SESSION['nama'];
    $saran = $_POST['saran'];
    $id_kategori = $_POST['id_kategori'];


    $resultUserData = $connect->query("SELECT * FROM r_alumni WHERE alumni_nama = '". $nama ."';");
    $row = $resultUserData->fetch_assoc();
    

    $stmt = $connect->prepare("INSERT INTO t_responden_alumni (id_responden_alumni, id_survey,  responden_tanggal , responden_nim, responden_nama ,responden_prodi,responden_email,responden_hp,tahun_lulus, saran,id_kategori) VALUES (null,?,NOW(),?,?,?,?,?,?,?,?)");

    $stmt->bind_param("isssssssi",  $id_survey, $row['alumni_nim'], $nama,$row['alumni_prodi'],$row['alumni_email'],$row['alumni_hp'],$row['alumni_tahunlulus'], $saran, $id_kategori);
    $status_execute = $stmt->execute();

    $new_id = $stmt->insert_id;

    if ($status_execute) {
        $sql = "SELECT id_soal FROM m_survey_soal s WHERE id_kategori = " . $_POST['id_kategori']  . " AND id_survey = " . $id_survey;
        $result = mysqli_query($connect,$sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stmt = $connect->prepare("INSERT INTO t_jawaban_alumni (id_jawaban_alumni, id_responden_alumni, id_soal, jawaban) VALUES (null, ?, ?, ?)");
                // Bind the parameters
                $stmt->bind_param("iis", $new_id, $row['id_soal'], $_POST[$row['id_soal']]);
                $status_execute = $stmt->execute();
            };
        }
    }
} else {
    echo "Failed input data";
}


$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Berhasil</title>
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
            <h1><?= $_SESSION['nama'] ?> | <?= $_SESSION['user_type'] ?></h1>
        </div>
        <hr>
    </div>
    <hr class="border-2 border-black" />


    <!--DIV 2 (BODY)-->
    <div class="grid grid-cols-5 h-screen w-full">
        <!--DIV KIRI (SIDE BAR KIRI)-->
        <div class="left bg-[#130B2d] py-20 relative">
            <ul class="grid grid-rows-3 gap-3 text-center text-sm items-center justify-center">
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="dashboardAlumni.php"><img src="../aset/dashSym.svg" class="w-10" /><span>Dashboard</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2685F5] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="surveyAlumni.php"><img src="../aset/surveySym.svg" class="w-10" /><span>Survey</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="reportAlumni.php"><img src="../aset/ReportSym.svg" class="w-10" /><span>Report</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="profileAlumni.php"><img src="../aset/profileSym.svg" class="w-10" /><span>Profile</span></a>
                </li>
                <li class="px-5 py-2 bg-[#423C57] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="../logout.php"><img src="../aset/Logout.svg" class="w-10" /><span>LOG OUT</span></a>
            </ul>
        </div>


        <!--DIV KANAN-->
        <div class="col-span-4">
            <div class="text-center mt-60">
                <?= ($status_execute == 1) ? "Data Berhasil Dikirim" : "Data Gagal Dikirim"; ?>
                <h1 class="text-5xl font-bold text-black mb-2">TERIMA KASIH</h1>
                <p class="text-black mb-10">Atas Penilaiannya</p>
                <button class="bg-[#2D1B6B] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"><a href="dashboardAlumni.php">Dashboard</a></button>
                <button class="bg-[#2D1B6B] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a href="surveyAlumni.php">Lanjut Survey</a></button>
            </div>
        </div>
    </div>
    </div>
</body>

</html>