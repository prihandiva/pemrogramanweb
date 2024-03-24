<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css">
<style>
    /* style internal */
table {
    width: 70%;
    border-collapse: collapse;
    margin: 10px auto;
}
th, td {
    padding: 15px;
    border: 1px solid black;
}
th {
    background-color: #728B90;
} </style>
</head>
<body>
    <?php
    // Mendefinisikan array berisi 1 data dari seorang dosen
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'
    ];

    // Mencetak informasi dosen dengan menggunakan indeks 'nama', 'domisili, 'jenis_kel' dari array list Dosen
    echo "<table>";
    echo "<tr><th>Informasi Dosen</th><th>Data</th></tr>";
    foreach ($Dosen as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";
?>
</body>
</html>