<?php 


//Membuat variable bertipe data integer (int)
$a = 10;
$b = 5;
//OPERATOR ARITMATIKA 
$hasilTambah = $a + $b; //Jumlah
$hasilKurang = $a - $b; //Kurang
$hasilKali = $a * $b; //Kali 
$hasilBagi = $a / $b; //Bagi
$sisaBagi = $a % $b; //Modulo
$pangkat = $a ** $b; //Pangkat
//Menampilkan Hasilnya
echo "OPERATOR ARITMATIKA<br>";// (Saya beri echo agar mudah dibaca saat dirun di browser)
echo "Hasil Tambah dari $a + $b adalah $hasilTambah <br>";
echo "Hasil Kurang dari $a - $b adalah $hasilKurang <br>";
echo "Hasil Kali dari $a x $b adalah $hasilKali <br>";
echo "Hasil Bagi dari $a ÷  $b adalah $hasilBagi <br>";
echo "Hasil Sisa Bagi dari $a % $b adalah $sisaBagi <br>";
echo "Hasil Pangkat dari $a ** $b adalah $pangkat <br>";

//
echo "<br>";
//OPERATOR PERBANDINGAN
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;
//Menampilkan Hasilnya dengan nilai boolean
$benar = true;
$salah = false;
echo "OPERATOR PERBANDINGAN<br>";
echo "Jika benar : $benar, Jika salah : $salah";
echo "<br>";
echo "Hasil dari $a = $b adalah $hasilSama <br>";
echo "Hasil dari $a != $b adalah $hasilTidakSama <br>";
echo "Hasil dari $a < $b adalah $hasilLebihKecil <br>";
echo "Hasil dari $a >  $b adalah $hasilLebihBesar <br>";
echo "Hasil dari $a <= $b adalah $hasilLebihKecilSama <br>";
echo "Hasil dari $a >= $b adalah $hasilLebihBesarSama <br>";
//
echo "<br>";
//OPERATOR LOGIKA
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;
//Menampilkan Hasilnya dengan nilai boolean
echo "OPERATOR LOGIKA<br>";
echo "Jika benar : $benar, Jika salah : $salah";
echo "<br>";
echo "Hasil dari $a && $b adalah $hasilAnd <br>";
echo "Hasil dari $a || $b adalah $hasilOr <br>";
echo "Hasil dari notA adalah $hasilNotA <br>";
echo "Hasil dari notB adalah $hasilNotB <br>";
echo "<br>";

//OPERATOR PENUGASAN
//Menampilkan Hasilnya
echo "OPERATOR PENUGASAN <br>";
$a += $b;
echo "Hasil dari a += b adalah $a <br>";
$a -= $b;
echo "Hasil dari a -= b adalah $a <br>";
$a *= $b;
echo "Hasil dari a *= b adalah $a <br>";
$a /= $b;
echo "Hasil dari a /= b adalah $a <br>";
$a %= $b;
echo "Hasil dari a %= b adalah $a <br>";
echo "<br>";

//OPERATOR PERBANDINGAN STRICT
$hasilIdentik = $a === $b; //Strict equality (===)
$hasilTidakIdentik = $a !== $b; //Strict inequality (!==)
/*Berbeda dengan operator kesetaraan (==) dan (!=), operator 
kesetaraan ketat(===) selalu menganggap operan dari tipe yang berbeda sebagai berbeda
Hasilnya sama yaitu berupa nilai boolean true dan false.*/ 
echo "OPERATOR PERBANDINGAN KETAT (STRICT)<br>";
echo "Jika benar : $benar, Jika salah : $salah";
echo "<br>";
echo "Hasil dari $a === $b adalah $hasilIdentik <br>";
echo "Hasil dari $a !== $b adalah $hasilTidakIdentik <br>";
echo "<br>";

/*
Ada soal cerita : Sebuah restoran memiliki 45 kursi di dalamnya. 
Pada suatu malam, 28 kursi telah ditempati oleh pelanggan. 
Berapa persen kursi yang masih kosong di restoran tersebut?
*/

//Jawaban Saya
echo "SOAL CERITA<br>";
echo "Sebuah restoran memiliki 45 kursi di dalamnya.<br>
Pada suatu malam, 28 kursi telah ditempati oleh pelanggan.<br> 
Berapa persen kursi yang masih kosong di restoran tersebut?<br>";

$totalKursi = 45; // Jumlah total kursi di restoran
$kursiDitempati = 28; // Jumlah kursi yang telah ditempati oleh pelanggan
$kursiKosong = $totalKursi - $kursiDitempati; // Menghitung jumlah kursi yang masih kosong

// Menghitung persentase kursi yang masih kosong
$persentaseKosong = ($kursiKosong / $totalKursi) * 100;

// Menampilkan hasil
echo "JAWABAN <br>";
echo "Jumlah total kursi = $totalKursi <br>";
echo "Jumlah total kursi ditempati = $kursiDitempati<br>";
echo "Jumlah kursi yang masih kosong: $kursiKosong <br>";
echo "Persentase kursi yang masih kosong: $persentaseKosong%";
?>

