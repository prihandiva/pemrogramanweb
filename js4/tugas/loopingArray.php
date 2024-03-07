<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Array Multidimensi</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        .student-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            border: 1px solid #ccc; 
            padding: 10px; 
        }
        .student-profile {
            width: 100px;
            height: 130px; 
            object-fit: cover; 
            margin-right: 20px;
        }
        .student-details {
            display: flex;
            flex-direction: column;
            margin: 10px 0;
        }
        .student-details p {
            margin: 0;
        }
        .symbol {
            font-size: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <h2>Data Mahasiswa Array Multidimensi</h2>
    <h2>Nama : Fitria Ramadhani Prihandiva<br></h2>
    <h2>Kelas : SIB 2D / 09 <br><hr></h2>
    <?php
    // Array multidimensi untuk data mahasiswa
    $daftarMahasiswa = [
        ["Nama" => "Kageyama Tobio", "NIM" => "543210", "Jurusan" => "Teknik Elektro", "Email" => "tobio9@gmail.com", "Foto Profile" => "foto1.jpg"],
        ["Nama" => "Gojou Satoru", "NIM" => "987654", "Jurusan" => "Teknik Mesin", "Email" => "satoru89@gmail.com", "Foto Profile" => "foto2.jpg"],
        ["Nama" => "Armin Artlert", "NIM" => "112233", "Jurusan" => "Teknik Industri", "Email" => "aaarminart14@gmail.com", "Foto Profile" => "foto3.jpg"],
        ["Nama" => "Sasuke Uchiha", "NIM" => "334455", "Jurusan" => "Teknik Biomedis", "Email" => "ssuchiha6@gmail.com", "Foto Profile" => "foto4.jpg"],
        ["Nama" => "Yuno", "NIM" => "667788", "Jurusan" => "Teknik Lingkungan", "Email" => "yunoo87@gmail.com", "Foto Profile" => "foto5.jpg"]
    ];

    // Loop menggunakan foreach melalui array untuk menampilkan data mahasiswa
    foreach ($daftarMahasiswa as $data) {
        echo '<div class="student-container">';
        echo '<img src="' . $data["Foto Profile"] . '" alt="Foto Profile" class="student-profile">';//Gambar
        echo '<div class="student-details">';
        echo '<p><span class="symbol">⦾</span> Nama: ' . $data["Nama"] . '</p>';//Nama
        echo '<p><span class="symbol">⦾</span> NIM: ' . $data["NIM"] . '</p>'; //NIM
        echo '<p><span class="symbol">⦾</span> Jurusan: ' . $data["Jurusan"] . '</p>'; //Jurusan
        echo '<p><span class="symbol">⦾</span> Email: ' . $data["Email"] . '</p>'; //Email
        echo "<hr>";
        echo '</div>';
        echo '</div>';
    }
    ?>

</body>
</html>
