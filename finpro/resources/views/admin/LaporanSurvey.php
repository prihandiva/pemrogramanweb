<?php
include "Crud.php";
session_start();
if (!isset($_SESSION["nama"])) {
    header("location: ../index.php");
}
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "projekakhir";

$conn = new mysqli($servername, $username_db, $password_db, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// HARUS SEMUA RESPONDEN DITAMPILKAN
$sqlAll = "SELECT jawaban, COUNT(*) as Jumlah FROM (
    SELECT rm.id_responden_mhs AS id_responden, rm.id_kategori, jm.jawaban, jm.id_jawaban_mhs
    FROM t_jawaban_mhs jm 
    LEFT JOIN t_responden_mhs rm ON jm.id_responden_mhs = rm.id_responden_mhs
    WHERE rm.id_kategori = 1 
    UNION 
    SELECT rd.id_responden_dosen, rd.id_kategori, jd.jawaban, jd.id_jawaban_dosen
    FROM t_jawaban_dosen jd 
    LEFT JOIN t_responden_dosen rd ON jd.id_responden_dosen = rd.id_responden_dosen
    WHERE rd.id_kategori = 1 
    UNION 
    SELECT ri.id_responden_industri, ri.id_kategori, ji.jawaban, ji.id_jawaban_industri
    FROM t_jawaban_industri ji 
    LEFT JOIN t_responden_industri ri ON ji.id_responden_industri = ri.id_responden_industri
    WHERE ri.id_kategori = 1 
    UNION 
    SELECT ro.id_responden_ortu, ro.id_kategori, jo.jawaban, jo.id_jawaban_ortu
    FROM t_jawaban_ortu jo 
    LEFT JOIN t_responden_ortu ro ON jo.id_responden_ortu = ro.id_responden_ortu
    WHERE ro.id_kategori = 1 
    UNION 
    SELECT rt.id_responden_tendik, rt.id_kategori, jt.jawaban, jt.id_jawaban_tendik
    FROM t_jawaban_tendik jt 
    LEFT JOIN t_responden_tendik rt ON jt.id_responden_tendik = rt.id_responden_tendik
    WHERE rt.id_kategori = 1 
    UNION 
    SELECT ra.id_responden_alumni, ra.id_kategori, ja.jawaban, ja.id_jawaban_alumni
    FROM t_jawaban_alumni ja 
    LEFT JOIN t_responden_alumni ra ON ja.id_responden_alumni = ra.id_responden_alumni
    WHERE ra.id_kategori = 1
) AS all_responden 
GROUP BY jawaban ORDER BY Jumlah DESC";

$result2 = $conn->query($sqlAll);

$sqlKategori = "SELECT kategori_nama FROM m_kategori;";
$resultKategori = $conn->query($sqlKategori);

$sqlMax = "SELECT jawaban, COUNT(*) as Jumlah FROM (
    SELECT rm.id_responden_mhs AS id_responden, rm.id_kategori, jm.jawaban, jm.id_jawaban_mhs
    FROM t_jawaban_mhs jm 
    LEFT JOIN t_responden_mhs rm ON jm.id_responden_mhs = rm.id_responden_mhs
    WHERE rm.id_kategori = 1 AND jm.jawaban IS NOT NULL
    UNION 
    SELECT rd.id_responden_dosen, rd.id_kategori, jd.jawaban, jd.id_jawaban_dosen
    FROM t_jawaban_dosen jd 
    LEFT JOIN t_responden_dosen rd ON jd.id_responden_dosen = rd.id_responden_dosen
    WHERE rd.id_kategori = 1 AND jd.jawaban IS NOT NULL
    UNION 
    SELECT ri.id_responden_industri, ri.id_kategori, ji.jawaban, ji.id_jawaban_industri
    FROM t_jawaban_industri ji 
    LEFT JOIN t_responden_industri ri ON ji.id_responden_industri = ri.id_responden_industri
    WHERE ri.id_kategori = 1 AND ji.jawaban IS NOT NULL
    UNION 
    SELECT ro.id_responden_ortu, ro.id_kategori, jo.jawaban, jo.id_jawaban_ortu
    FROM t_jawaban_ortu jo 
    LEFT JOIN t_responden_ortu ro ON jo.id_responden_ortu = ro.id_responden_ortu
    WHERE ro.id_kategori = 1 AND jo.jawaban IS NOT NULL
    UNION 
    SELECT rt.id_responden_tendik, rt.id_kategori, jt.jawaban, jt.id_jawaban_tendik
    FROM t_jawaban_tendik jt 
    LEFT JOIN t_responden_tendik rt ON jt.id_responden_tendik = rt.id_responden_tendik
    WHERE rt.id_kategori = 1 AND jt.jawaban IS NOT NULL
    UNION 
    SELECT ra.id_responden_alumni, ra.id_kategori, ja.jawaban, ja.id_jawaban_alumni
    FROM t_jawaban_alumni ja 
    LEFT JOIN t_responden_alumni ra ON ja.id_responden_alumni = ra.id_responden_alumni
    WHERE ra.id_kategori = 1 AND ja.jawaban IS NOT NULL
) AS all_responden
GROUP BY jawaban ORDER BY Jumlah DESC LIMIT 1";
$resultMax = $conn->query($sqlMax);
$maxJawaban = $resultMax->fetch_assoc()['jawaban'];
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
                <div>
                    <table class="border-collapse table-auto w-full text-sm mb-2">
                        <thead>
                            <tr>
                                <th class="text-left">Jenis Penilaian</th>
                                <th class="text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // AMBIL HASIL SURVEY DARI DATABASE
                            if ($resultKategori->num_rows > 0) {
                                // output data of each row
                                while ($row = $resultKategori->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td class="">Hasil Keseluruhan <?= $row['kategori_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= $maxJawaban; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="justify center">
                    <button class="bg-violet-950 rounded-[15px] text-center text-white px-4 py-3 text-lg font-bold capitalize leading-normal">
                        <a href="lihatSaran.php"><b>Tampilkan Saran Dan Kritik User</b></a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
