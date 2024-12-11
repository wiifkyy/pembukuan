<?php
include 'koneksi.php'; // Koneksi ke database

// Query untuk mengambil semua data transaksi
$sql = "SELECT * FROM transaksi ORDER BY tanggal ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $transaksi = [];
    while ($row = $result->fetch_assoc()) {
        $transaksi[] = $row; // Masukkan data ke array
    }
    echo json_encode($transaksi); // Kirim data dalam format JSON
} else {
    echo json_encode(["message" => "Tidak ada data transaksi."]);
}

$conn->close();
?>
