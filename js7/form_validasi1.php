<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Input dengan Validasi</title>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post" action="proses_validasi.php">
        <!--nama-->
        <label for="nama">Nama :</label>
        <input type="text" id="nama" name="nama">

        <!--email-->
        <label for="email">Email :</label>
        <input type="text" id="email" name="email">
       
        <!-- Tombol submit -->
        <input type="submit" value="Submit">
    </form>
    </body>
    </html>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $errors = array();

        if(empty($nama)){
            $errors[]="Nama harus diisi.";
        }

        if(empty($email)){
            $errors[]="Email harus diisi.";
        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[]="Format Email tidak valid.";
        }

        if(empty($errors)){
            foreach ($errors as $error){
                echo $error . "<br>";
            }
        }else{
            echo "Data berhasil dikirim : Nama =  $nama , Email = $email";
        }
    }
    ?>