<?php
echo "SEMUA KATA DAN HURUF DARI PALING AKHIR <br>";
$pesan = "Saya arek malang";
echo strrev($pesan). "<br>"; 
//Teks ditampilkan secara terbalik dari kata belakang dan huruf paling belakang
echo"<hr>";
echo"<br>";


echo "SEMUA HURUF DARI PALING AKHIR namun KATA MASIH URUT <br>";
//Ubah variabble pesan menkado array dengan perintah explode
$pesanPerKata = explode(" ",$pesan);
//Ubah setiap kata dalam array menjadi kebalikkannya
$pesanPerKata = array_map(fn($pesan)=> strrev($pesan),$pesanPerKata);
//Gabungkan kembali array menjadi string
$pesan = implode(" ", $pesanPerKata);

echo $pesan. "<br>";
?>