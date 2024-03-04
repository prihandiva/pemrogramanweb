<?php
/*< Apa yang anda pahami dari penggunaan 
tipe data pada file tersebut. Catat di bawah ini pemahaman anda. (soal no 2)*/

//Membuat variable berisikan angka sebagai data (int)
$a = 10;
$b = 5;
$c = $a + 5;
$d = $b + (10 * 5);
$e = $d - $c;

//Menampilkan isi dari masing masing variable
echo "Variabel a : {$a} <br>";
echo "Variabel b : {$b} <br>";
echo "Variabel c : {$c} <br>";
echo "Variabel d : {$d} <br>";
echo "Variabel e : {$e} <br>";

//Menghapus suatu variable (bila di run muncul tipe datanya int)
var_dump($e);
echo "<br>";
//
//Membuat variable berisikan angka sebagai data (float)
$nilaiMatematika = 5.1;
$nilaiIPA = 6.7;
$nilaiBahasaIndonesia = 9.3;

//Melakukan operasi perhitungan rata rata dari 3 variable
$rataRata= ($nilaiMatematika+$nilaiBahasaIndonesia+$nilaiIPA) /3;

//Menampilkan isi dari masing masing variable
echo "Matematika : {$nilaiMatematika}<br>";
echo "IPA : {$nilaiIPA}<br>";
echo "Bahasa Indonesia : {$nilaiBahasaIndonesia}<br>";
echo "Rata - rata : {$rataRata}<br>";
//Menghapus suatu variable (bila di run muncul tipe datanya float)
var_dump($rataRata);
echo "<br>";
//
//Membuat variale baru bertipe boolean
$apakahSiswaLulus = true;
$apakahSiswaSudahUjian = false;
//Menghapus suatu variable (bila di run muncul tipe datanya boolean)
var_dump($apakahSiswaLulus);
echo "<br>";
var_dump($apakahSiswaSudahUjian);
echo "<br>";
//

//Membuat variable baru bertipe String
$namaDepan = "Ibnu";
$namaBelakang = "Jakaria";
//Menggabungkan 2 variable String
$namaLengkap = "{$namaDepan} {$namaBelakang}";
$namaLengkap2 = $namaDepan .' '. $namaBelakang;
//Menampilkan variable String dengan {} dan . .
echo "Nama depan: {$namaDepan} <br>";
echo 'Nama belakang : ' . $namaBelakang . '<br>';

echo $namaLengkap;
echo "<br>";
//Membuat array dengan type data String
$listMahasiswa = ["Wahid Abdullah", "Elmo Bachtiar","Lendis Fabri"];
//Menampilkan isi data dalam array berindeks 0 (Wahid Abdullah)
echo $listMahasiswa[0];
?>