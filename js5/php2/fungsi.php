<?php 
echo "FUNGSI TANPA PARAMETER<br>";
//Deklarasi fungsi (function) dengan nama fungsi 'perkenalan'
function perkenalan(){
    echo "Assalamualaikum, ";
    echo "Perkenalkan nama saya Fitria Ramadhani Prihandiva <br/> ";
    echo "Senang berkenalan dengan Anda <br/>";
}
//memanggil fungsi yang sudah dibuat
perkenalan();
echo"<hr>";
echo"<br>";


echo "FUNGSI DENGAN PARAMETER<br>";
//Deklarasi fungsi (function) dengan nama fungsi 'perkenalan2'
//menggunakan parameter
function perkenalan2($nama,$salam){
    echo $salam.", ";
    echo "Perkenalkan nama saya " .$nama. "<br/> ";
    echo "Senang berkenalan dengan Anda <br/>";
}
//memanggil fungsi yang sudah dibuat
perkenalan2("Hamdana","Hallo");
echo"<hr>";
//Memasukkan value kedalam variable 'saya' dan 'ucapanSalam'
$saya = "Fitria Ramadhani Prihandiva";
$ucapanSalam = "Selamat Pagi";
//memanggil lagi
//mengirim isi dari variable dengan menggunakan parameter ke fungsi perkenalan2
perkenalan2($saya,$ucapanSalam);
echo"<hr>";
echo"<br>";


echo "FUNGSI DENGAN PARAMETER DEFAULT<br>";
//Deklarasi fungsi (function) dengan nama fungsi 'perkenalan3'
//menggunakan parameter default sehingga semua bentuk salam akan menjadi Assalamualaikum
function perkenalan3($nama,$salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Perkenalkan nama saya " .$nama. "<br/> ";
    echo "Senang berkenalan dengan Anda <br/>";
}
//memanggil fungsi yang sudah dibuat
perkenalan3("Hamdana","Hallo");
echo"<hr>";
//Memasukkan value kedalam variable 'saya' dan 'ucapanSalam'
$saya = "Fitria Ramadhani Prihandiva";
$ucapanSalam = "Selamat Pagi";
//memanggil lagi
//mengirim isi dari variable dengan menggunakan parameter ke fungsi perkenalan3
perkenalan3($saya);
echo"<hr>";
echo"<br>";


echo "FUNGSI DENGAN PENGEMBALIAN NILAI<br>";
//membuat fungsi dengan nama hitungUmur
function hitungUmur($thn_lahir, $thn_sekarang){
    $umur = $thn_sekarang - $thn_lahir; //operasi hitung pengurangan dari 2 variable
    return $umur;
}
//menampilkan fungsi dengan mengirimkan value melalui parameter
echo "Umur saya adalah ". hitungUmur(2003,2024)." tahun"; 
echo"<hr>";
echo"<br>";


echo "MEMANGGIL FUNGSI LAIN KE DALAM FUNGSI LAINNYA<br>";
function perkenalan4($nama1,$salam1="Assalamualaikum"){
    echo $salam1. ", ";
    echo "Perkenalkan nama saya ".$nama1. "<br/> ";
    //memanggil fungsi hitungUmur()
    echo "Saya berusia".hitungUmur(2003,2024). " tahun </br>";
    echo "Senang berkenalan dengan Anda <br/>";
}
//memanggil fungsiperkenalan4 (didalamnya terdapat fungsi hitungUmur)
perkenalan4("Fitria Ramadhani Prihandiva");
echo"<hr>";
echo"<br>";

?> 

