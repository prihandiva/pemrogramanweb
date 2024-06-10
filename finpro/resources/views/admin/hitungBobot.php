<?php 

session_start();
include "Crud.php";

if (!isset($_SESSION["nama"])) {
    header("location: ../index.php");
}



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define weights
$criteria_weights = [
    'Fasilitas' => 0.15,
    'Dosen' => 0.25,
    'Sistem' => 0.10,
    'Kurikulum' => 0.30,
    'Mahasiswa' => 0.20,
];

// Fetch categories
$sql = "SELECT kategori_nama FROM m_kategori";
$result = $connect->query($sql);

$categories = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categories[] = strtolower($row['kategori_nama']);
    }
} else {
    echo "0 results";
    exit;
}

// Map string values to numeric
function mapValue($value) {
    switch (strtolower($value)) {
        case 'sangat baik':
            return 4;
        case 'baik':
            return 3;
        case 'cukup':
            return 2;
        case 'kurang':
            return 1;
        default:
            return 0;
    }
}

// Fetch answers from all tables and union them
$tables = [
    't_jawaban_mhs', 't_jawaban_dosen', 't_jawaban_tendik', 
    't_jawaban_ortu', 't_jawaban_industri', 't_jawaban_alumni'
];

$answers = [];
foreach ($tables as $table) {
    $sql = "SELECT jawaban FROM $table";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $row['fasilitas'] = mapValue($row['fasilitas']);
            $row['dosen'] = mapValue($row['dosen']);
            $row['sistem'] = mapValue($row['sistem']);
            $row['kurikulum'] = mapValue($row['kurikulum']);
            $row['mahasiswa'] = mapValue($row['mahasiswa']);
            $answers[] = $row;
        }
    }
}

// Normalize the scores
$normalized_matrix = [];
foreach ($answers as $answer) {
    $normalized_answer = [];
    foreach ($categories as $category) {
        $max_value = max(array_column($answers, $category));
        $normalized_answer[$category] = $answer[$category] / $max_value;
    }
    $normalized_matrix[$answer['id']] = $normalized_answer;
}

// Calculate the weighted sum for each answer
$weighted_sum = [];
foreach ($normalized_matrix as $id => $values) {
    $weighted_sum[$id] = 0;
    foreach ($values as $category => $normalized_value) {
        $weighted_sum[$id] += $normalized_value * $criteria_weights[ucfirst($category)];
    }
}

// Display the results
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Score</th></tr>";
foreach ($weighted_sum as $id => $score) {
    echo "<tr><td>$id</td><td>$score</td></tr>";
}
echo "</table>";

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SBP</title>
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
            <h1 class="text-4xl font-bold mb-6 mt-8 px-6">Perhitungan Menggunakan Metode SAW (Simple Additive Weighting)</h1>
            
        </div>
    </div>
</body>
</html>
