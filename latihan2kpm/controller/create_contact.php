<?php
include '../database/db.php';

$nama_lengkap = htmlentities($_POST['nama_lengkap']);
$email = htmlentities($_POST['email']);
$pesan = htmlentities($_POST['pesan']);

$sql = "INSERT INTO contacts (nama_lengkap, email, pesan) VALUES ('$nama_lengkap', '$email', '$pesan')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan";
    header("Location: ../contact.php"); 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
