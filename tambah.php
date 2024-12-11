<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Tambah Transaksi</h1>
    <a href="index.php">Kembali ke Beranda</a>
    <form action="simpan.php" method="POST">
        <label for="tanggal">Tanggal:</label><br>
        <input type="date" name="tanggal" required><br>

        <label for="kode">Kode:</label><br>
        <input type="text" name="kode" required><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <input type="text" name="deskripsi" required><br>

        <label for="debit">Debit:</label><br>
        <input type="number" step="0.01" name="debit"><br>

        <label for="kredit">Kredit:</label><br>
        <input type="number" step="0.01" name="kredit"><br>

        <label for="referensi">Referensi:</label><br>
        <input type="text" name="referensi"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
