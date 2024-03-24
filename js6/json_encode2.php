<?php 
/*$_SERVER['PHP_SELF'] mengembalikan nama file skrip yang sedang dieksekusi. 
Dalam hal ini, akan mencetak nama file PHP yang sedang dieksekusi. */
echo $_SERVER['PHP_SELF'];
echo "<br>";

/*$_SERVER['SERVER_NAME'] mengembalikan nama server host yang sedang menjalankan 
skrip PHP. Ini akan mencetak nama server*/
echo $_SERVER['SERVER_NAME'];
echo "<br>";

/*$_SERVER['HTTP_HOST'] mengembalikan nama host dari permintaan HTTP saat ini. 
Ini akan mencetak nama host dari URL yang digunakan untuk mengakses halaman saat ini. */
echo $_SERVER['HTTP_HOST'];
echo "<br>";

/*$_SERVER['HTTP_REFERER'] mengembalikan URL dari halaman web yang merujuk ke halaman saat ini. 
Ini akan mencetak URL dari halaman yang mengarahkan pengguna ke halaman saat ini.*/ 
echo $_SERVER['HTTP_REFERER'];
echo "<br>";

/*$_SERVER['HTTP_USER_AGENT'] mengembalikan String yang mengindentifikasi agen pengguna 
(browser,osm dll) yang membuat permintaan http */
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";

/*$_SERVER['SCRIPT_NAME'] mengembalikan jalur skrip yang sedang dieksekusi. 
Mencetak jalur dari file skrip php yang sedang dieksekusi */
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";
?>