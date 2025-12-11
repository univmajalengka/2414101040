<?php
include 'koneksi.php';

// Logika Simpan Data (Backend PHP)
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $tgl = $_POST['tanggal'];
    $hari = $_POST['hari'];
    $peserta = $_POST['peserta'];
    
    // Ceklis layanan (Jika dicentang nilainya 1, jika tidak 0)
    $inap = isset($_POST['inap']) ? 1 : 0;
    $trans = isset($_POST['transport']) ? 1 : 0;
    $makan = isset($_POST['makan']) ? 1 : 0;
    
    $total = $_POST['total_bayar']; // Ambil dari hitungan JS atau hitung ulang di PHP

    // Query Simpan
    $sql = "INSERT INTO pemesanan (nama_pemesan, nomor_hp, tanggal_wisata, hari_wisata, jumlah_peserta, layanan_inap, layanan_transport, layanan_makan, total_tagihan) 
            VALUES ('$nama', '$hp', '$tgl', '$hari', '$peserta', '$inap', '$trans', '$makan', '$total')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Pesanan Berhasil Disimpan!'); window.location='daftar pesanan.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Form Pemesanan - Curug Cipeuteuy</title>
    <link rel="stylesheet" href="css/style.css"> <style>
        /* CSS Tambahan Khusus Form agar rapi sesuai PDF */
        .form-container { max-width: 600px; margin: 50px auto; padding: 20px; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="number"], input[type="date"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 20px; color: white; border: none; cursor: pointer; border-radius: 4px; margin-right: 5px; }
        .btn-blue { background: #2980b9; }
        .btn-green { background: #27ae60; }
        .btn-red { background: #c0392b; }
    </style>
</head>
<body>
    <nav style="background:#1e5128; padding:15px; text-align:center;">
        <a href="index.php" style="color:white; margin:0 15px; text-decoration:none;">Beranda</a>
        <a href="pemesanan.php" style="color:white; margin:0 15px; text-decoration:none; font-weight:bold;">Pemesanan</a>
        <a href="daftar pesanan.php" style="color:white; margin:0 15px; text-decoration:none;">Edit Pesanan</a>
    </nav>

    <div class="form-container">
        <h2 style="text-align:center; color:#1e5128;">Form Pemesanan Paket Wisata</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Pemesan:</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>Nomor HP/Telp:</label>
                <input type="text" name="hp" required>
            </div>
            <div class="form-group">
                <label>Tanggal Pesan (Waktu Wisata):</label>
                <input type="date" name="tanggal" required>
            </div>
            <div class="form-group">
                <label>Waktu Pemesanan (Hari):</label>
                <input type="number" id="hari" name="hari" value="1" min="1" required>
            </div>
            <div class="form-group">
                <label>Jumlah Peserta:</label>
                <input type="number" id="peserta" name="peserta" value="1" min="1" required>
            </div>
            
            <div class="form-group">
                <label>Pelayanan Paket (Centang yang dipilih):</label>
                <input type="checkbox" id="inap" name="inap" value="1000000"> Penginapan (Rp 1.000.000)<br>
                <input type="checkbox" id="transport" name="transport" value="1200000"> Transportasi (Rp 1.200.000)<br>
                <input type="checkbox" id="makan" name="makan" value="500000"> Service/Makan (Rp 500.000)
            </div>

            <div class="form-group">
                <label>Harga Paket (Per Peserta):</label>
                <input type="text" id="harga_paket" readonly>
            </div>
            <div class="form-group">
                <label>Jumlah Tagihan:</label>
                <input type="text" id="total_tampil" readonly>
                <input type="hidden" name="total_bayar" id="total_bayar">
            </div>

            <button type="button" onclick="hitungHarga()" class="btn btn-blue">Hitung</button>
            <button type="submit" name="simpan" class="btn btn-green">Simpan</button>
            <button type="reset" class="btn btn-red">Reset</button>
        </form>
    </div>

    <script>
        // Logika Hitung JS sesuai PDF Halaman 4
        function hitungHarga() {
            var hari = parseInt(document.getElementById('hari').value) || 0;
            var peserta = parseInt(document.getElementById('peserta').value) || 0;
            
            var hargaInap = document.getElementById('inap').checked ? 1000000 : 0;
            var hargaTransport = document.getElementById('transport').checked ? 1200000 : 0;
            var hargaMakan = document.getElementById('makan').checked ? 500000 : 0;

            // Rumus: (Harga Layanan) 
            var hargaPerPaket = hargaInap + hargaTransport + hargaMakan;
            
            // Rumus Total: Hari x Peserta x Harga Paket (Sesuai contoh PDF Hal 4: 2 hari x 2 peserta x 2.2jt)
            var total = hari * peserta * hargaPerPaket;

            document.getElementById('harga_paket').value = "Rp " + hargaPerPaket.toLocaleString();
            document.getElementById('total_tampil').value = "Rp " + total.toLocaleString();
            document.getElementById('total_bayar').value = total; // Nilai asli untuk dikirim ke DB
        }
    </script>
</body>
</html>