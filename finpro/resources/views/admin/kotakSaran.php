<?php
include "Crud.php";
include "../koneksi.php";
session_start();
if (!isset($_SESSION["nama"]))
{
header("location: ../index.php");
}


///HARUS SEMUA RESPONDEN DITAMPILKAN
$sqlAll = "SELECT * FROM (
    SELECT rm.responden_nama, rm.saran, u.posisi 
    FROM t_responden_mhs rm 
    LEFT JOIN m_user u ON u.nama = rm.responden_nama
    WHERE rm.responden_nama = '" . $_GET['responden_nama'] . "'
    UNION 
    SELECT rd.responden_nama, rd.saran, u.posisi 
    FROM t_responden_dosen rd 
    LEFT JOIN m_user u ON u.nama = rd.responden_nama
    WHERE rd.responden_nama = '" . $_GET['responden_nama'] . "'
    UNION
    SELECT ri.responden_nama, ri.saran, u.posisi 
    FROM t_responden_industri ri 
    LEFT JOIN m_user u ON u.nama = ri.responden_nama
    WHERE ri.responden_nama = '" . $_GET['responden_nama'] . "'
    UNION
    SELECT ro.responden_nama, ro.saran, u.posisi 
    FROM t_responden_ortu ro 
    LEFT JOIN m_user u ON u.nama = ro.responden_nama
    WHERE ro.responden_nama = '" . $_GET['responden_nama'] . "'
    UNION
    SELECT rt.responden_nama, rt.saran, u.posisi 
    FROM t_responden_tendik rt 
    LEFT JOIN m_user u ON u.nama = rt.responden_nama
    WHERE rt.responden_nama = '" . $_GET['responden_nama'] . "'
    UNION
    SELECT ra.responden_nama, ra.saran, u.posisi 
    FROM t_responden_alumni ra 
    LEFT JOIN m_user u ON u.nama = ra.responden_nama
    WHERE ra.responden_nama = '" . $_GET['responden_nama'] . "') 
    AS all_responden";

$result2 = $connect->query($sqlAll);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kotak Saran</title>
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
            <h1 class="text-4xl font-bold mb-6 mt-8 px-6">Kotak Saran</h1>
            <div class="w-[900px] mx-auto bg-white p-10 rounded-lg shadow-md mt-4">
                <div>
                    <?php
                    //AMBIL HASIL SARAN DARI DATABASE
                    if ($result2->num_rows > 0) {
                        // output data of each row
                        while ($row = $result2->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><hr><?= $row['saran']; ?> <br><hr></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>