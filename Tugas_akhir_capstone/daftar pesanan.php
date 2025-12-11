<?php
include 'koneksi.php';

// Logika Hapus (Delete)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id='$id'");
    echo "<script>alert('Data berhasil dihapus'); daftar pesanan.php='daftar pesanan.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Pesanan - Curug Cipeuteuy</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Style Tabel sederhana */
        .container-admin { width: 90%; margin: 30px auto; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #1e5128; color: white; }
        .btn-small { padding: 5px 10px; text-decoration: none; color: white; border-radius: 3px; font-size: 12px; }
        .btn-edit { background-color: #2980b9; }
        .btn-del { background-color: #c0392b; }
    </style>
</head>
<body>

    <nav style="background:#1e5128; padding:15px; text-align:center;">
        <a href="index.php" style="color:white; margin:0 15px; text-decoration:none;">Beranda</a>
        <a href="pemesanan.php" style="color:white; margin:0 15px; text-decoration:none;">Pemesanan</a>
        <a href="daftar pesanan.php" style="color:white; margin:0 15px; text-decoration:none; font-weight:bold;">daftar pesanan</a>
    </nav>

    <div class="container-admin">
        <h2 style="color:#1e5128;">Daftar Pesanan Masuk</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Phone</th>
                    <th>Jml Peserta</th>
                    <th>Hari</th>
                    <th>penginapan</th>
                    <th>Transport</th>
                    <th>Makan</th>
                    <th>Total Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM pemesanan");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $d['nama_pemesan']; ?></td>
                    <td><?php echo $d['nomor_hp']; ?></td>
                    <td><?php echo $d['jumlah_peserta']; ?></td>
                    <td><?php echo $d['hari_wisata']; ?></td>
                    <td><?php echo ($d['layanan_inap'] == 1) ? 'ya' : 'tidak'; ?></td>
                    <td><?php echo ($d['layanan_transport'] == 1) ? 'ya' : 'tidak'; ?></td>
                    <td><?php echo ($d['layanan_makan'] == 1) ? 'ya' : 'tidak'; ?></td>
                    <td>Rp<?php echo number_format($d['total_tagihan']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn-small btn-edit">Edit</a>
                        <a href="daftar pesanan.php?hapus=<?php echo $d['id']; ?>" 
                           class="btn-small btn-del" 
                           onclick="return confirm('Anda yakin akan menghapus data ini?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>