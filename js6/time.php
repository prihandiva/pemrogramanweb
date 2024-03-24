<!DOCTYPE html>
<html>
<head></head>
<body>
    <h3> Time </h3>
    <?php
    // membuat zona waktu sebagai default menjadi "Asia/Jakarta"
    date_default_timezone_set("Asia/Jakarta");
    // Menampilkan waktu sekarang dalam format jam:menit:detik: AM/PM
    echo date ("h:i:sa");
    ?>   
</body>
</html>