<?php
//Membuat variable dengan tipe data integer
$angka1 = 10;
$angka2 = 5;
$hasil = $angka1 + $angka2;
//Menampilkan hasil penjumlahan dari 2 variable (int)
echo "Hasil penjumlahan $angka1 dan $angka2 adalah $hasil";

echo "<br>"; //Membuat breakline

//Membuat variable dengan tipe data boolean
$benar = true;
$salah = false;
echo "Variable benar : $benar, Variable salah : $salah";
echo "<br>";

//Membuat konstanta
define("NAMA_SITUS","WebsiteKu.com");
define("TAHUN_PENDIRIAN", 2023);

//Menampilkan hasil dari pemanggilan konstanta yang sudah dibuat
echo "Selamat datang di " . NAMA_SITUS . ", situs yang didirikan pada tahun " 
. TAHUN_PENDIRIAN . ".";

/*Apa yang anda pahami dari penggunaan 
variable pada file tersebut. 
Catat di bawah ini pemahaman anda. (soal no 1)*/

?>
