<?php
session_start();
if (!isset($_SESSION["nama"]))
{
header("location: ../index.php");
}

include 'koneksi.php'; // Include the connection file


$sql = "SELECT * FROM t_responden_alumni r INNER JOIN m_kategori k ON r.id_kategori = k.id_kategori WHERE responden_nama = '" . $_SESSION['nama']."';";
$result = mysqli_query($connect,$sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report</title>
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
                    <a class="flex items-center gap-3" href="dashboardAlumni.php"><img src="../aset/dashSym.svg" class="w-10" /><span>Dashboard</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl">
                    <a class="flex items-center gap-3" href="surveyAlumni.php"><img src="../aset/surveySym.svg" class="w-10" /><span>Survey</span></a>
                </li>
                <li class="px-5 py-2 bg-[#2685F5] font-bold text-white rounded-xl">
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
            <h1 class="text-4xl font-bold mb-6 mt-8 px-6">Report Survey</h1>
            <div class="w-[900px] mx-auto bg-white p-10 rounded-lg shadow-md  mt-4">
        <div>
            <table class="border-collapse table-auto w-full text-sm mb-2">
                <thead>
                    <tr>
                        <th class="text-left">Jenis Penilaian</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Waktu Pengisian</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    //AMBIL HASIL SURVEY DARI DATABASE
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>    
                    <tr>
                        <td class=""><?= $row['kategori_nama']; ?></td>
                        <td class=""><?= ($row['responden_nama']) ? "Telah Diisi" : "Belum Terisi"; ?></td>
                        <td class=""><?= $row['responden_tanggal']; ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
            </table>
        </div>
        </div>
    </div>
</body>

</html>