<?php
// 1. Pembuatan Fungsi (Prosedur) hitungDiskon
// Sesuai instruksi: Menerima parameter totalBelanja [cite: 49]
function hitungDiskon($totalBelanja) {
    
    // Inisialisasi awal diskon 0
    $nominalDiskon = 0;

    // 2. Logika Diskon (If-Elseif-Else) [cite: 51]
    
    // Kondisi 1: Jika belanja >= 100.000, diskon 10% [cite: 52]
    if ($totalBelanja >= 100000) {
        $nominalDiskon = 0.10 * $totalBelanja;
    } 
    // Kondisi 2: Jika belanja >= 50.000 (dan < 100.000), diskon 5% [cite: 53, 54]
    elseif ($totalBelanja >= 50000) {
        $nominalDiskon = 0.05 * $totalBelanja;
    }
    // Kondisi 3: Jika < 50.000, diskon 0 (otomatis 0 karena inisialisasi di atas) [cite: 55]

    // 3. Mengembalikan Nilai (Return Value) dalam bentuk rupiah [cite: 57]
    return $nominalDiskon;
}

// --- BAGIAN EKSEKUSI UTAMA ---

// 4. Deklarasi Variabel totalBelanja [cite: 60]
// Kamu bisa ubah angka ini untuk mengetes logika (misal: 40000, 60000, 150000)
$totalBelanja = 120000;

// Memanggil fungsi dan menyimpan hasilnya ke variabel $diskon [cite: 61]
$diskon = hitungDiskon($totalBelanja);

// Menghitung total yang harus dibayar [cite: 62]
$totalBayar = $totalBelanja - $diskon;

// 5. Menampilkan Output [cite: 63]
// Menggunakan number_format agar angka muncul format ribuan (titik)
echo "=== Program Hitung Diskon ===<br>";
echo "Total Belanja: Rp " . number_format($totalBelanja, 0, ',', '.') . "<br>";
echo "Diskon: Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "<strong>Total Bayar: Rp " . number_format($totalBayar, 0, ',', '.') . "</strong>";

?>