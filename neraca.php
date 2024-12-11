<?php
include 'koneksi.php'; // Koneksi ke database

// Ambil saldo kas terakhir
$sql_saldo = "SELECT saldo_kas FROM transaksi ORDER BY id DESC LIMIT 1";
$result_saldo = $conn->query($sql_saldo);
$saldo_kas = $result_saldo->num_rows > 0 ? floatval($result_saldo->fetch_assoc()['saldo_kas']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Neraca</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Laporan Neraca</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Saldo Kas Terakhir</th>
        </tr>
        <tr>
            <td><?= number_format($saldo_kas, 2); ?></td>
        </tr>
    </table>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
