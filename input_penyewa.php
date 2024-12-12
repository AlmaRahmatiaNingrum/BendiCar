<?php
session_start();
include 'koneksi.php'; // Pastikan file koneksi.php ada dan benar

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Menangani form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_ktp = $_POST['no_ktp'];
    $nama_penyewa = $_POST['nama_penyewa'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $status_sewa = $_POST['status_sewa'];

    // Query untuk memasukkan data penyewa ke database
    $query = "INSERT INTO penyewa (no_ktp, nama_penyewa, tgl_pinjam, tgl_kembali, status_sewa) 
              VALUES ('$no_ktp', '$nama_penyewa', '$tgl_pinjam', '$tgl_kembali', '$status_sewa')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data penyewa berhasil ditambahkan!'); window.location.href = 'pembayaran.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Penyewa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Input Data Penyewa</h1>
    </header>
    <main>
        <form action="" method="POST">
            <div class="form-group">
                <label for="no_ktp">No. KTP:</label>
                <input type="text" id="no_ktp" name="no_ktp" required maxlength="20">
            </div>
            
            <div class="form-group">
                <label for="nama_penyewa">Nama Penyewa:</label>
                <input type="text" id="nama_penyewa" name="nama_penyewa" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                <input type="date" id="tgl_pinjam" name="tgl_pinjam" required>
            </div>

            <div class="form-group">
                <label for="tgl_kembali">Tanggal Kembali:</label>
                <input type="date" id="tgl_kembali" name="tgl_kembali" required>
            </div>

            <div class="form-group">
                <label for="status_sewa">Status Sewa:</label>
                <select id="status_sewa" name="status_sewa" required>
                    <option value="pending">Pending</option>
                    <option value="disewa">Disewa</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn">Tambah Penyewa</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Rental Mobil</p>
    </footer>
</body>
</html>
