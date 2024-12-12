<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Cek apakah total_bayar sudah ada di session atau sebelumnya
$total_bayar = isset($_SESSION['total_bayar']) ? $_SESSION['total_bayar'] : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_pembayaran = $_POST['jumlah_pembayaran'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Lakukan perhitungan atau update status pembayaran di database
    // Query untuk memasukkan pembayaran ke database (misalnya)
    // $query = "INSERT INTO pembayaran (total_bayar, jumlah_pembayaran, metode_pembayaran) VALUES ('$total_bayar', '$jumlah_pembayaran', '$metode_pembayaran')";

    // Jika berhasil
    echo "Pembayaran berhasil dilakukan!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="styles.css">
    <script src="myscript.js"></script>
</head>
<body>
    <h1>Pembayaran</h1>

    <p>Total Bayar: Rp <?= number_format($total_bayar, 0, ',', '.') ?></p>

    <form action="pembayaran.php" method="POST">
        <label for="jumlah_pembayaran">Jumlah Pembayaran:</label>
        <input type="number" id="jumlah_pembayaran" name="jumlah_pembayaran" value="400000" required>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select name="metode_pembayaran" id="metode_pembayaran">
            <option value="Cash">Cash</option>
            <option value="Transfer">Transfer</option>
        </select>

        <button type="submit">Bayar</button>
    </form>
</body>
</html>
