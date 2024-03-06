<?php 
//ARRAY SATU DIMENSI
echo "ARRAY SATU DIMENSI <br>";
//Membuat array berisi nilai int dan array tanpa nilai (kosong)
$nilaiSiswa = [85,92,78,64,90,55,88,79,70,96];
$nilaiLulus = [];
/* Melakukan perulangan dengan mengidentifikasi nilaiSiswa sebagai nilai
yang kemudian dilakukan pengecekan dengan if ($nilai >=70) yaitu 
nilai yang 70 ke atas akan dimasukkan ke dalam array $nilaiLulus[]
*/
foreach($nilaiSiswa as $nilai){
    if($nilai >= 70){
        $nilaiLulus[] = $nilai;
    }
}
//Array $nilaiLulus diprint
echo "Daftar Nilai siswa yang lulus: " .implode(',',$nilaiLulus);
echo "<br>";
echo "<hr>";
//ARRAY DUA DIMENSI
echo "ARRAY DUA DIMENSI <br>";
// Membuat array 2 dimensi
$daftarKaryawan =[
    ['Alice', 7],
    ['Bob', 3],
    ['Charlie', 9],
    ['David', 5],
    ['Eva', 6],
];
//Membuat array kosong
$karyawanPengalamanLimaTahun = [] ;
/* Melakukan perulangan dengan mengidentifikasi $daftarKaryawan sebagai $karyawan
yang kemudian dilakukan pengecekan dengan if ($karyawan[1]>5) yaitu 
karyawan yang pengalaman kerja di atas 5 akan dimasukkan ke dalam array $karyawanPengalamanLimaTahun[]
*/
foreach($daftarKaryawan as $karyawan){
    //angka 1 mendefinisikan Tahun bekerja sedangkan 0 adalah nama karyawan
    if($karyawan[1]>5){
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}
//Array $karyawanPengalamanLimaTahun diprint
echo "Daftar Karyawan dengan pengalaman kerja lebih dari 5 tahun: " .implode(',',$karyawanPengalamanLimaTahun);
echo "<br>";
echo "<hr>";
echo "ARRAY ASOSIATIF <br>";
// Membuat array ASOSIATIF
/*
Array $daftarNilai berisikan 3 Mata Kuliah yaitu Matematika Fisika dan Kimia
Kemudian disetiap mata kuliah mengandung array lagi berisi nama dan nilai siswa
Nama dan siswa menggunakan Array 2 dimensi
Dengan definisi indeks 'Nama' diindekskan dengan 0
dan Nilai diindekskan dengan 1 (Sama seperti percobaan sebelumnya) 
*/
$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie',85],
    ],
];

$mataKuliah = 'Fisika';

echo "Daftar nilai mahasiswa dalam mata kuliah $mataKuliah : <br>";

foreach($daftarNilai[$mataKuliah] as $nilai){
    echo "Nama : {$nilai[0]}, Nilai : {$nilai[1]}<br>";
}
echo "<br>";
echo "<hr>";
echo "SOAL CERITA <br>";
// SOAL CERITA
// Data siswa dengan Array
echo "Seorang guru ingin mencetak daftar nilai siswa dalam ujian matematika. 
Guru tersebut memiliki data setiap siswa terdrir dari nama dan nilai. 
Bantu guru ini mencetak daftar nilai siswa yang mencapai nilai di atas rata-rata kelas. 
Dengan ketentuan nama dan nilai siswa Alice dapat 85, Bob dapat 92, Charlie dapat 78, 
David dapat 64, Eva dapat 90 <br>";
$nilaiSiswa = [
    "Alice" => 85,
    "Bob" => 92,
    "Charlie" => 78,
    "David" => 64,
    "Eva" => 90
];

// Menghitung rata-rata nilai kelas dengan array_sum
$rataRataKelas = array_sum($nilaiSiswa) / count($nilaiSiswa);

// Menampilkan daftar nilai siswa di atas rata-rata kelas
echo "Daftar siswa dengan nilai di atas rata-rata kelas ($rataRataKelas) :<br>";

//Menampilkan menggunakan foreach dengan kondisi $nilai > $rataRataKelas
foreach ($nilaiSiswa as $nama => $nilai) {
    if ($nilai > $rataRataKelas) {
        echo "$nama : $nilai <br>";
    }
}
?>