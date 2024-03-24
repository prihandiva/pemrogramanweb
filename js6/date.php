<!DOCTYPE html>
<html >
        <head></head>
    <body>
    <h3> Date </h3>
    <?php
        // format tahun/bulan/tanggal
        echo "Today is " .date("Y/m/d") ."<br>";
        //  format tahun.bulan.tanggal 
        echo "Today is " .date("Y.m.d") ."<br>";
        // format tahun-bulan-tanggal
        echo "Today is " .date("Y-m-d") ."<br>";
        // Menampilkan hari ini dalam bahasa Inggris
        echo "Today is " .date("l") ;
    ?>
    </body>
</html>