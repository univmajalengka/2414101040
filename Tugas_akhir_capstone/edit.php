<?php
include 'koneksi.php';

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Ambil Data Lama dari Database untuk ditampilkan di form
$query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id='$id'");
$data = mysqli_fetch_array($query);

// 3. Proses Update Data saat tombol Simpan ditekan
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $tgl = $_POST['tanggal'];
    $hari = $_POST['hari'];
    $peserta = $_POST['peserta'];
    
    // Ceklis layanan
    $inap = isset($_POST['inap']) ? 1 : 0;
    $trans = isset($_POST['transport']) ? 1 : 0;
    $makan = isset($_POST['makan']) ? 1 : 0;
    
    $total = $_POST['total_bayar'];

    // Query UPDATE (Bukan Insert)
    $sql = "UPDATE pemesanan SET 
            nama_pemesan='$nama', 
            nomor_hp='$hp', 
            tanggal_wisata='$tgl', 
            hari_wisata='$hari', 
            jumlah_peserta='$peserta', 
            layanan_inap='$inap', 
            layanan_transport='$trans', 
            layanan_makan='$makan', 
            total_tagihan='$total' 
            WHERE id='$id'";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Data Berhasil Diupdate!'); edit.php='edit.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Pesanan - Curug Cipeuteuy</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-container { max-width: 600px; margin: 50px auto; padding: 20px; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="number"], input[type="date"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 20px; color: white; border: none; cursor: pointer; border-radius: 4px; margin-right: 5px; }
        .btn-blue { background: #2980b9; }
        .btn-orange { background: #e67e22; }
    </style>
</head>
<body>

    <nav style="background:#1e5128; padding:15px; text-align:center;">
        <a href="daftar pesanan.php" style="color:white; text-decoration:none;">&laquo; Kembali ke Data Pesanan</a>
    </nav>

    <div class="form-container">
        <h2 style="text-align:center; color:#1e5128;">Edit Pesanan</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Pemesan:</label>
                <input type="text" name="nama" value="<?php echo $data['nama_pemesan']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nomor HP/Telp:</label>
                <input type="text" name="hp" value="<?php echo $data['nomor_hp']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Wisata:</label>
                <input type="date" name="tanggal" value="<?php echo $data['tanggal_wisata']; ?>" required>
            </div>
            <div class="form-group">
                <label>Waktu Pemesanan (Hari):</label>
                <input type="number" id="hari" name="hari" value="<?php echo $data['hari_wisata']; ?>" min="1" required>
            </div>
            <div class="form-group">
                <label>Jumlah Peserta:</label>
                <input type="number" id="peserta" name="peserta" value="<?php echo $data['jumlah_peserta']; ?>" min="1" required>
            </div>
            
            <div class="form-group">
                <label>Pelayanan Paket:</label>
                <input type="checkbox" id="inap" name="inap" value="1000000" <?php echo ($data['layanan_inap'] == 1) ? 'checked' : ''; ?>> Penginapan (Rp 1.000.000)<br>
                <input type="checkbox" id="transport" name="transport" value="1200000" <?php echo ($data['layanan_transport'] == 1) ? 'checked' : ''; ?>> Transportasi (Rp 1.200.000)<br>
                <input type="checkbox" id="makan" name="makan" value="500000" <?php echo ($data['layanan_makan'] == 1) ? 'checked' : ''; ?>> Service/Makan (Rp 500.000)
            </div>

            <div class="form-group">
                <label>Total Tagihan (Hitung Ulang):</label>
                <input type="text" id="total_tampil" readonly>
                <input type="hidden" name="total_bayar" id="total_bayar" value="<?php echo $data['total_tagihan']; ?>">
            </div>

            <button type="button" onclick="hitungHarga()" class="btn btn-blue">Hitung Harga Baru</button>
            <button type="submit" name="update" class="btn btn-orange">Update Data</button>
        </form>
    </div>

    <script>
        // Jalankan hitung harga saat halaman pertama kali dibuka agar total tampil
        window.onload = hitungHarga;

        function hitungHarga() {
            var hari = parseInt(document.getElementById('hari').value) || 0;
            var peserta = parseInt(document.getElementById('peserta').value) || 0;
            
            var hargaInap = document.getElementById('inap').checked ? 1000000 : 0;
            var hargaTransport = document.getElementById('transport').checked ? 1200000 : 0;
            var hargaMakan = document.getElementById('makan').checked ? 500000 : 0;

            var hargaPerPaket = hargaInap + hargaTransport + hargaMakan;
            var total = hari * peserta * hargaPerPaket;

            document.getElementById('total_tampil').value = "Rp " + total.toLocaleString();
            document.getElementById('total_bayar').value = total;
        }
    </script>
</body>
</html>