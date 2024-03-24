<?php
$myArray = array();
//Pengecekan isi array (kosong atau terisi)
if(empty($myArray)) {
    echo "Array tidak terdefinisi atau kosong.";
}else{
    echo "Array terdefinisi dan tidak kosong";
}

echo "<br>";//pemisah baris

// Memeriksa isi variabel $nonExistentVar
if (empty($nonExistentVar)){
    echo "Variabel tidak terdefinisi atau kosong.";

}else{
    echo "Variabel terdefinisi dan tidak kosong.";
}

/*empty() digunakan ketika memeriksa sebuah variabel tidak terdefinisi atau 
memiliki nilai kosong (NULL, "", 0, atau array kosong)*/
?>