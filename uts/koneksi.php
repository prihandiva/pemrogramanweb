<?php
    $namaHost = "localhost";
    $username = "root";
    $password = "";
    $database = "uts_web";
    try {
        $connect = mysqli_connect($namaHost, $username, $password, $database);
        if ($connect) {
            echo "Koneksi dengan MySQL Berhasil <br>";
        } else {
            echo "Koneksi dengan MySQL Gagal " . mysqli_connect_error();
        }
        //$insert = "INSERT INTO user(id, username, password) VALUES('1', 'admin', '123')";

        // if (mysqli_query($connect, $insert)) {
        //     echo "Table Berhasil Ditambahkan";
        // } else {
        //     throw new Exception("Record Gagal Ditambahkan: " . mysqli_error($connect));
        // }
        // mysqli_close($connect);
    } 
    catch (Exception $e) {
        echo $e->getMessage();
    }
?>