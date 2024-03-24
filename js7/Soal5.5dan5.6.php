<?php
//SOAL 5.5
echo "SOAL 5.5<br>";
echo "Mencocokan pola dalam sebuah teks<br>";
$pattern = '/go?d/';
$text = 'god is good';
if(preg_match($pattern, $text, $matches)){
    echo "cocokan : " . $matches[0];
} else {
    echo "tidak ada yang cocok!";
}
echo "<br>";
echo "<hr>";

//SOAL 5.6
echo "SOAL 5.6<br>";
echo "Mencocokan pola dalam sebuah teks<br>";
$pattern = '{n,m}';
$text = 'god is good';
if(preg_match($pattern, $text, $matches)){
    echo "cocokan : " . $matches[0];
} else {
    echo "tidak ada yang cocok!";
}
echo "<br>";
echo "<hr>";
?>