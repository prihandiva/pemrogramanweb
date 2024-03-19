<?php 
echo "FUNGSI REKURSIF TANPA KONDISI PEMBATAS<br>";
//Deklarasi fungsi (function) dengan nama fungsi 'tampilkanHaloDunia()'
function tampilkanHaloDunia(){
    echo "Halo dunia! <hr>";

    tampilkanHaloDunia();
}
//tampilkanHaloDunia();
echo"<hr>";
echo"<br>";


echo "PERULANGAN DENGAN KONDISI PEMBATAS<br>";
for ($i=1; $i<= 25; $i++){
    echo "Perulangan ke-{$i} <br>";
}
echo"<hr>";
echo"<br>";


echo "FUNGSI REKURSIF DENGAN KONDISI PEMBATAS<br>";
function tampilkanAngka(int $jumlah, int $indeks = 1){
    echo "Perulangan ke-{$indeks} <br>";

    //panggil diri sendiri selama $indeks <= $jumlah
    if ($indeks < $jumlah){
        tampilkanAngka($jumlah, $indeks + 1);
    }
} 
tampilkanAngka(20); //mengirim 20 sebagai $jumlah
echo"<hr>";
echo"<br>";

?>