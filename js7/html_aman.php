<!DOCTYPE html>
<html>
<head>
    <title>Form HTML Aman</title>
</head>
<body>
    <h2>Formulir Aman</h2>
    <form action="html_aman.php" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        
        <label for="umur">Umur:</label><br>
        <input type="number" id="umur" name="umur"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Memeriksa apakah input sudah dikirimkan melalui metode POST
        // Jika ya, maka , dapat melanjutkan langkah-langkah berikutnya untuk membersihkan input

        // Mengambil nilai input dari formulir
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $email = $_POST['email'];

        // Membersihkan nilai input menggunakan htmlspecialchars untuk mencegah serangan XSS
        $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
        $umur = htmlspecialchars($umur, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

        // Menampilkan hasil input yang sudah dibersihkan
        echo "<h2>Input yang telah dibersihkan:</h2>";
        echo "Nama: " . $nama . "<br>";
        echo "Umur: " . $umur . "<br>";
        echo "Email: " . $email . "<br>";
        echo "<br>";
    // Memeriksa apakah input email yang dimasukkan adalah email yang valid
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Lanjutkan dengan pengolahan email yang aman
        echo "Nama: " . $nama . "<br>";
        echo "Email yang dimasukkan adalah email yang valid.";
    } else {
        // Tangani input yang tidak valid
        echo "Input yang dimasukkan bukan merupakan email yang valid.";
    }
}
    ?>
</body>
</html>
