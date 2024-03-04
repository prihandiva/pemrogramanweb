<?php 

//IF ELSE (Saya beri echo agar mudah dibaca saat dirun di browser)
echo "IF - ELSE<br>";
//Membuat variable tipe data int
$nilaiNumerik = 92;

/*Membuat kondisi if else untuk menampilkan kategori nilai berdasarkan
nilai int yang kondisinya benar
*/
if($nilaiNumerik >= 90 && $nilaiNumerik <= 100){
    echo "Nilai huruf : A";
}elseif ($nilaiNumerik >= 80 && $nilaiNumerik <= 90){
    echo "Nilai huruf : B";
}elseif ($nilaiNumerik >= 70 && $nilaiNumerik <= 80){
    echo "Nilai huruf : C";
}elseif($nilaiNumerik <70){
    echo "Nilai huruf : D";
}
echo "<br>";
echo "<br>";


//WHILE
echo "WHILE<br>"; //(Saya beri echo agar mudah dibaca saat dirun di browser)
$jarakSaatIni = 0; 
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while($jarakSaatIni < $jarakTarget){
    $jarakSaatIni += $peningkatanHarian; 
    $hari++;
    /*
Perulangan while akan terus berjalan selama $jarakSaatIni kurang dari $jarakTarget.
Pada setiap iterasi, $jarakSaatIni ditambahkan dengan $peningkatanHarian.
Variabel $hari ditambah 1 setiap harinya. (Increment)
Perulangan berhenti saat $jarakSaatIni mencapai atau melebihi $jarakTarget.
    */
}
echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer";
echo "<br>";
echo "<br>";


//FOR
echo "FOR <br>"; //(Saya beri echo agar mudah dibaca saat dirun di browser)
$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for($i = 1; $i <= $jumlahLahan;$i++){
    $jumlahBuah+=($tanamanPerLahan * $buahPerTanaman);
/*
Perulangan for digunakan untuk mengulang sebanyak $jumlahLahan.
Variabel $i diinisialisasi dengan nilai 1, dan perulangan akan terus berjalan 
selama $i kurang dari atau sama dengan $jumlahLahan.
Pada setiap iterasi, $jumlahBuah ditambahkan dengan 
hasil perkalian antara $tanamanPerLahan dan $buahPerTanaman.
Variabel $i ditambah 1 setiap iterasi. (Increment)
*/
}

echo "Jumlah buah yang akan dipanen adalah : $jumlahBuah";
echo "<br>";
echo "<br>";


//FOREACH
echo "FOREACH <br>"; //(Saya beri echo agar mudah dibaca saat dirun di browser)
$skorUjian = [85,92,78,96,88];
$totalSkor = 0;

foreach($skorUjian as $skor){
    $totalSkor += $skor;
/*
Perulangan foreach digunakan untuk mengiterasi setiap elemen dalam array $skorUjian.
Pada setiap iterasi, nilai dari elemen array disimpan dalam variabel $skor.
Variabel $totalSkor ditambah dengan nilai $skor pada setiap iterasi.
*/
}
echo "Total Skor ujian adalah : $totalSkor";
echo "<br>";
echo "<br>";

//FOREACH DAN IF
echo "FOREACH DAN IF <br>"; //(Saya beri echo agar mudah dibaca saat dirun di browser)
$nilaiSiswa = [85,92,58,64,90,55,88,79,70,96];
/* 
Perulangan foreach digunakan untuk mengiterasi setiap elemen dalam array $nilaiSiswa.
*/
foreach($nilaiSiswa as $nilai){
    if($nilai < 60){
        echo "Nilai: $nilai (Tidak lulus)<br>";
        continue;
/*
Di dalam perulangan foreach, terdapat struktur kondisional if yang mengecek nilai setiap siswa.
Jika nilai kurang dari 60, maka akan ditampilkan pesan "Tidak lulus".
Jika nilai 60 atau lebih, maka akan ditampilkan pesan "LULUS".
Continue Statement:
Jika nilai siswa kurang dari 60, maka akan ditampilkan pesan "Tidak lulus" dan 
eksekusi akan melanjutkan ke iterasi berikutnya menggunakan pernyataan continue.
*/
    }
    echo "Nilai : $nilai (LULUS) <br>";
}
echo "<br>";


//=========================================
//SOAL CERITA 1
//Jawaban Saya
echo "SOAL CERITA 1<br>";
echo "Ada seorang guru ingin menghitung total nilai dari 10 siswa dalam ujian matematika. 
Guru ini ingin mengabaikan dua nilai tertinggi dan dua nilai terendah. Bantu guru ini 
menghitung total nilai yang akan digunakan untuk menentukan nilai rata-rata setelah 
mengabaikan nilai tertinggi dan terendah. 
Berikut daftar nilai dari 10 siswa (85, 92, 78, 64, 90, 75, 88, 79, 70, 96)<br>";
echo "<br>";
echo "JAWABAN 1 <br>";
$daftarNilai = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];// Daftar nilai dari 10 siswa
$jumlahSiswa = count($daftarNilai); // Menghitung jumlah

// Mengurutkan nilai dari terendah ke tertinggi
for ($i = 0; $i < $jumlahSiswa - 1; $i++) {
    for ($j = 0; $j < $jumlahSiswa - $i - 1; $j++) {
        // Jika elemen saat ini lebih besar dari elemen berikutnya, tukar posisinya
        if ($daftarNilai[$j] > $daftarNilai[$j + 1]) {
            $temp = $daftarNilai[$j];
            $daftarNilai[$j] = $daftarNilai[$j + 1];
            $daftarNilai[$j + 1] = $temp;
        }
    }
}
echo "Nilai siswa setelah diurutkan: <br> ";
foreach ($daftarNilai as $nilai) {
    echo  $nilai . " ";
}
echo "<br>";
$totalNilai = 0;
// Menghitung rata-rata nilai dengan mengabaikan nilai indeks 0,1,8,9
for($f=2; $f<8; $f++){
    $totalNilai += $daftarNilai[$f]; 
}
echo "<br>";
echo "Tampilkan total Nilai indeks 2-7 (Tanpa 2 tertinggi dan 2 terendah) = $totalNilai <br>";
$rataRata = $totalNilai/(10-4); 

// Menampilkan hasil akhir
echo "Rata-rata nilai setelah mengabaikan dua nilai terendah dan dua nilai tertinggi: $rataRata <br>";
echo "<br>";

//=========================================
//SOAL CERITA 2
//Jawaban Saya
echo "SOAL CERITA 2<br>";
echo "Seorang pelanggan ingin membeli sebuah produk dengan harga Rp 120.000. 
Toko tersebut menawarkan diskon sebesar 20% untuk pembelian di atas Rp 100.000. 
Bantu pelanggan ini untuk menghitung harga yang harus dibayar setelah mendapatkan diskon.<br>";

echo "<br>";
echo "JAWABAN 2 <br>";


echo "<br>";

//=========================================
//SOAL CERITA 3
//Jawaban Saya
echo "SOAL CERITA 3<br>";
echo "Seorang pemain game ingin menghitung total skor mereka dalam permainan. 
Mereka mendapatkan skor berdasarkan poin yang mereka kumpulkan. 
Jika mereka memiliki lebih dari 500 poin, maka mereka akan mendapatkan hadiah tambahan. 
Buat tampilan baris pertama “Total skor pemain adalah: (poin)”. 
Dan baris kedua “Apakah pemain mendapatkan hadiah tambahan? (YA/TIDAK)<br>";

echo "<br>";
echo "JAWABAN 3 <br>";
?>

