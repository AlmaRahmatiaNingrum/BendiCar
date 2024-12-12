<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$query = "SELECT * FROM transaksi WHERE id_transaksi = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $_GET['id_transaksi']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$transaksi = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyewaan</title>
</head>
<body>
    <h1>Detail Penyewaan</h1>
    <p>Kendaraan: <?= $transaksi['merk'] ?> - <?= $transaksi['jenis'] ?></p>
    <p>Tanggal Sewa: <?= $transaksi['tanggal_sewa'] ?></p>
    <p>Total Harga: Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?></p>
</body>
</html>
