<?php
$name="Fitria ramadhani";
$alamat="Malang";
define("GAJI", 50000000);
define("nomorrumah", 20);

echo $name;
echo "<br>";
echo GAJI;
echo "<br>";
echo  nomorrumah;
echo "<br>";
echo"$name bergaji rp. GAJI";
echo "<br>";
echo"<hr>";
echo "$name bergaji rp. " .GAJI;
echo "<br>";
echo "nama saya : $name";
echo "<br>";
echo "alamat rumah saya : " .$alamat;
echo "<br>";
echo "$name $alamat";
echo "<br>";
echo $name .$alamat;
echo "<hr>";
echo "Ini menggunakan unset";
unset($name);
echo "ini memakai unset $name";
echo $nama;

?>