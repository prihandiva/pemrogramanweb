<?php

$loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Pellentesque vel pellentesque dolor. In ut quam mauris. Nunc eros neque, 
            interdum in varius sit amet, feugiat at ligula. Quisque mollis magna non 
            justo ornare bibendum. Suspendisse lobortis dolor vitae sapien tincidunt, 
            vel porta nibh faucibus. Cras at fringilla odio. Morbi non turpis pellentesque, 
            suscipit metus ac, rutrum est. Praesent elementum posuere varius. Pellentesque 
            dapibus rhoncus dapibus. Vestibulum eget nisi vel nisi imperdiet scelerisque. 
            Morbi at ipsum id elit rutrum scelerisque sed et metus. Nulla neque libero, 
            egestas eget lectus sit amet, aliquam gravida orci.";

//Menampilkan variable loremIpsum
echo "<p>{$loremIpsum}</p>";
//Menghitung jumlah panjang karakter
echo "Panjang karakter: " .strlen($loremIpsum). "<br>";
//Menghitung jumlah kata
echo "Panjang kata: " .str_word_count($loremIpsum). "<br>";
//UPPERCASE
echo "<p>".strtoupper($loremIpsum)."</p>";
//LOWERCASE
echo "<p>".strtolower($loremIpsum)."</p>";
echo"<hr>";
echo"<br>";
?> 