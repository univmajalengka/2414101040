<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa</title>
</head>
<body>

<h2>Home</h2>

<?php if ($status == 'sukses'): ?>
    <p>Pendaftaran berhasil!</p>
<?php elseif ($status == 'gagal'): ?>
    <p>Pendaftaran gagal!</p>
<?php endif; ?>

<a href="form-daftar.php">Kembali ke Form Pendaftaran</a>

</body>
</html>