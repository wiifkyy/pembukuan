<?php
include 'koneksi.php'; // Koneksi ke database

// Hitung total pemasukan (debit)
$sql_debit = "SELECT SUM(debit) AS total_debit FROM transaksi";
$result_debit = $conn->query($sql_debit);
$total_debit = $result_debit->num_rows > 0 ? floatval($result_debit->fetch_assoc()['total_debit']) : 0;

// Hitung total pengeluaran (kredit)
$sql_kredit = "SELECT SUM(kredit) AS total_kredit FROM transaksi";
$result_kredit = $conn->query($sql_kredit);
$total_kredit = $result_kredit->num_rows > 0 ? floatval($result_kredit->fetch_assoc()['total_kredit']) : 0;

// Hitung laba/rugi bersih
$laba_rugi = $total_debit - $total_kredit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Laba Rugi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Laporan Laba Rugi</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Total Pemasukan</th>
            <th>Total Pengeluaran</th>
            <th>Laba/Rugi Bersih</th>
        </tr>
        <tr>
            <td><?= number_format($total_debit, 2); ?></td>
            <td><?= number_format($total_kredit, 2); ?></td>
            <td><?= number_format($laba_rugi, 2); ?></td>
        </tr>
    </table>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
