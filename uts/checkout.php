<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses pemesanan
    $food = $_POST["food"];
    $quantity = $_POST["quantity"];

    // Simpan dalam session
    $_SESSION["order"] = array("food" => $food, "quantity" => $quantity);

    // Redirect ke halaman checkout
    header("Location: checkout.php");
    exit();
}

// Jika halaman diakses langsung tanpa POST request, tampilkan rincian pesanan
$order = isset($_SESSION["order"]) ? $_SESSION["order"] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Checkout</h1>
    </header>
    <main>
        <?php if ($order) : ?>
            <h2>Rincian Pesanan</h2>
            <p>Makanan: <?php echo $order["food"]; ?></p>
            <p>Jumlah: <?php echo $order["quantity"]; ?></p>
        <?php else : ?>
            <p>Belum ada pesanan.</p>
        <?php endif; ?>
    </main>
    <footer>
        &copy; 2024 Pemesanan Makanan
    </footer>
</body>
</html>
