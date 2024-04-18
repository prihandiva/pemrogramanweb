<?php
session_start();

// Definisikan harga masing-masing item makanan
$harga = array(
    "Nasi Goreng + Telor" => 10000,
    "Mie Ayam" => 12000,
    "Ayam Goreng" => 15000
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data pesanan dari $_POST
    $nasgor_qty = isset($_POST["nasgor_qty"]) ? $_POST["nasgor_qty"] : 0;
    $mieayam_qty = isset($_POST["mieayam_qty"]) ? $_POST["mieayam_qty"] : 0;
    $ayamgoreng_qty = isset($_POST["ayamgoreng_qty"]) ? $_POST["ayamgoreng_qty"] : 0;

    // Hitung total pesanan
    $total_nasgor = $nasgor_qty * $harga["Nasi Goreng + Telor"]; // Harga Nasi Goreng
    $total_mieayam = $mieayam_qty * $harga["Mie Ayam"]; // Harga Mie Ayam
    $total_ayamgoreng = $ayamgoreng_qty * $harga["Ayam Goreng"]; // Harga Ayam Goreng

    // Hitung total keseluruhan
    $total = $total_nasgor + $total_mieayam + $total_ayamgoreng;

    // Simpan rincian pesanan dalam session
    $order = array(
        "Nasi Goreng + Telor" => $nasgor_qty,
        "Mie Ayam" => $mieayam_qty,
        "Ayam Goreng" => $ayamgoreng_qty
    );
    $_SESSION["order"] = $order;
    $_SESSION["total"] = $total;

    // Redirect ke halaman checkout
    header("Location: checkout.php");
    exit();
}

// Jika halaman diakses langsung tanpa POST request, tampilkan rincian pesanan
$order = isset($_SESSION["order"]) ? $_SESSION["order"] : null;
$total = isset($_SESSION["total"]) ? $_SESSION["total"] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <header>
    <div>
    <img src="logo.png">
    <h1>Checkout</h1>
    </div>
</header>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <main>
        <?php if ($order) : ?>
            <h2>Rincian Pesanan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Makanan</th>
                        <th>Harga</th>
                        <th>QTY</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order as $food => $quantity) : ?>
                        <tr>
                            <td><?php echo $food; ?></td>
                            <td><?php echo $harga[$food]; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo $harga[$food] * $quantity; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total :</td>
                        <td><?php echo $total; ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php else : ?>
            <p>Belum ada pesanan.</p>
        <?php endif; ?>
    </main>
    <footer>
        &copy; 2024 Pemesanan Makanan
    </footer>
</body>
</html>
