<?php
//Percobaan 1
echo "Mencari Huruf Kecil<br>";
$pattern = '/[a-z]/';
$text = 'This is a sample text.';
if(preg_match($pattern,$text)){ //hasil dikembalikan ke dalam array $matches
    echo "huruf kecil ditemukan !";
}else{
    echo "tidak ada huruf kecil !";
}

echo "<br>";
echo "<hr>";

// Percobaan 2
echo "Mencari Angka Pada Teks<br>";
$pattern = '/[0-9]+/';
$text = 'There are 123 apples.';

if(preg_match($pattern,$text,$matches)){
    echo "cocokan : ".$matches[0];
}else{
    echo "Tidak ada yang cocok!";
}

echo "<br>";
echo "<hr>";

//Percobaan 3
echo "Mengganti kata 'apple' Menjadi 'banana' Dalam Sebuah Teks<br>";
$pattern = '/apple/';
$replacement = 'banana';
$text = 'i like apple pie.';
$new_text = preg_replace($pattern,$replacement,$text);
echo $new_text;

echo "<br>";
echo "<hr>";

// Percobaan 4
echo "Mencocokan pola dalam sebuah teks<br>";
$pattern = '/go{2,3}d/';
$text = 'god is good';
if(preg_match($pattern,$text,$matches)){
    echo "cocokan : ".$matches[0];
}else{
    echo "tidak ada yang cocok!";
}

?>