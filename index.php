<?php
include 'koneksi.php'; // Menghubungkan ke database

// Ambil semua data transaksi
$sql = "SELECT * FROM transaksi ORDER BY tanggal ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Daftar Transaksi</h1>
    <a href="tambah.php">Tambah Transaksi</a> |
    <a href="laba_rugi.php">Lihat Laporan Laba Rugi</a> |
<a href="neraca.php">Lihat Laporan Neraca</a>
<a href="export_excel.php">
    <button>Download Excel</button>
</a>


    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Tanggal</th>
            <th>Kode</th>
            <th>Deskripsi</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Saldo Kas</th>
            <th>Referensi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['kode']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td><?= number_format($row['debit'], 2); ?></td>
            <td><?= number_format($row['kredit'], 2); ?></td>
            <td><?= number_format($row['saldo_kas'], 2); ?></td>
            <td><?= $row['referensi']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
