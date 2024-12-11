<?php
require __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Style;

// Bersihkan output buffer untuk menghindari konflik output
if (ob_get_length()) {
    ob_end_clean();
}

// Header untuk download file Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Daftar_Transaksi.xlsx"');
header('Cache-Control: max-age=0');

// Buat file Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Header kolom
$sheet->setCellValue('A1', 'Tanggal');
$sheet->setCellValue('B1', 'Kode');
$sheet->setCellValue('C1', 'Deskripsi');
$sheet->setCellValue('D1', 'Debit');
$sheet->setCellValue('E1', 'Kredit');
$sheet->setCellValue('F1', 'Saldo Kas');
$sheet->setCellValue('G1', 'Referensi');

// Ambil data dari database
$sql = "SELECT * FROM transaksi ORDER BY tanggal ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $rowNumber = 2; // Mulai dari baris kedua
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $rowNumber, $row['tanggal']);
        $sheet->setCellValue('B' . $rowNumber, $row['kode']);
        $sheet->setCellValue('C' . $rowNumber, $row['deskripsi']);
        $sheet->setCellValue('D' . $rowNumber, $row['debit']);
        $sheet->setCellValue('E' . $rowNumber, $row['kredit']);
        $sheet->setCellValue('F' . $rowNumber, $row['saldo_kas']);
        $sheet->setCellValue('G' . $rowNumber, $row['referensi']);
        $rowNumber++;
    }

    // Tambahkan border ke semua kolom
    $lastRow = $rowNumber - 1; // Baris terakhir data
    $sheet->getStyle("A1:G$lastRow")->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'], // Warna hitam
            ],
        ],
    ]);
}

// Tulis file ke output
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
