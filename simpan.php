<?php
include 'koneksi.php';

$tanggal = $_POST['tanggal'];
$kode = $_POST['kode'];
$deskripsi = $_POST['deskripsi'];
// nilai numerik konversi ke float
$debit = isset($_POST['debit']) ? floatval($_POST['debit']) : 0;
$kredit = isset($_POST['kredit']) ? floatval($_POST['kredit']) : 0;
$referensi = $_POST['referensi'];

// Hitung saldo kas terbaru
$sql_last = "SELECT saldo_kas FROM transaksi ORDER BY id DESC LIMIT 1";
$result_last = $conn->query($sql_last);
$last_saldo = $result_last->num_rows > 0 ? $result_last->fetch_assoc()['saldo_kas'] : 0;
// konversi ke tipe numerik
$saldo_kas = $last_saldo + $debit - $kredit;

// Simpan data ke database
$sql = "INSERT INTO transaksi (tanggal, kode, deskripsi, debit, kredit, saldo_kas, referensi)
        VALUES ('$tanggal', '$kode', '$deskripsi', '$debit', '$kredit', '$saldo_kas', '$referensi')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php"); // Redirect ke halaman utama
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
