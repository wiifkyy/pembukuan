<form action="store_transaksi.php" method="POST">
    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" required><br>

    <label for="kode">Kode:</label>
    <input type="text" name="kode" required><br>

    <label for="deskripsi">Deskripsi:</label>
    <input type="text" name="deskripsi" required><br>

    <label for="debit">Debit:</label>
    <input type="number" name="debit"><br>

    <label for="kredit">Kredit:</label>
    <input type="number" name="kredit"><br>

    <label for="referensi">Referensi:</label>
    <input type="text" name="referensi" required><br>

    <button type="submit">Simpan</button>
</form>
