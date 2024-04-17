<?php
// Mendefinisikan konstanta untuk koneksi ke database MySQL
define ('HOST', 'localhost'); 
define ('USER', 'root'); 
define ('PASS', ''); 
define ('DB1', 'prakwebdb'); 
//Buat koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);
?>