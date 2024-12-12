<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Ambil data riwayat penyewaan
$username = $_SESSION['username'];
$query = "SELECT t.id_transaksi, t.total_bayar, p.tanggal_pembayaran, p.metode_pembayaran, p.status_pembayaran 
          FROM transaksi t 
          JOIN pembayaran p ON t.id_transaksi = p.id_transaksi 
          WHERE t.username = '$username'";

$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Penyewaan</title>
</head>
<body>
    <h1>Riwayat Penyewaan</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Total Bayar</th>
                <th>Tanggal Pembayaran</th>
                <th>Metode Pembayaran</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id_transaksi'] ?></td>
                    <td>Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
                    <td><?= $row['tanggal_pembayaran'] ?></td>
                    <td><?= $row['metode_pembayaran'] ?></td>
                    <td><?= $row['status_pembayaran'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
