<?php
// File: koneksi.php
$host = "localhost";     // Hostname database
$username = "root";      // Username database
$password = "";          // Password database
$database = "manohara"; // Nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
