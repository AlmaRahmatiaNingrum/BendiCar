<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Menyusun data kendaraan secara manual atau ambil dari database
$kendaraan = [
    [
        'gambar' => 'avanza.jpeg',
        'merk' => 'Toyota',
        'jenis' => 'Avanza',
        'harga_sewa' => 350000,
        'no_pol' => 'B1234ABC'
    ],
    [
        'gambar' => 'mobilio.jpeg',
        'merk' => 'Honda',
        'jenis' => 'Mobilio',
        'harga_sewa' => 400000,
        'no_pol' => 'B5678DEF'
    ],
    [
        'gambar' => 'ertiga.jpeg',
        'merk' => 'Suzuki',
        'jenis' => 'Ertiga',
        'harga_sewa' => 300000,
        'no_pol' => 'B91011GHI'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Kendaraan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Lihat Kendaraan</h1>
    </header>
    <main>
        <div class="vehicle-grid">
            <?php foreach ($kendaraan as $vehicle): ?>
                <div class="vehicle-card">
                    <img src="images/<?= $vehicle['gambar'] ?>" alt="<?= $vehicle['merk'] ?>" class="vehicle-image">
                    <h2 class="vehicle-name"><?= $vehicle['merk'] ?> - <?= $vehicle['jenis'] ?></h2>
                    <p class="vehicle-price">Harga Sewa: Rp <?= number_format($vehicle['harga_sewa'], 0, ',', '.') ?> /hari</p>
                    <a href="input_penyewa.php?no_pol=<?= $vehicle['no_pol'] ?>"class="btn">Sewa</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Rental Mobil</p>
    </footer>
</body>
</html>
