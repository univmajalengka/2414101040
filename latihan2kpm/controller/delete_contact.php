<?php
include '../database/db.php';

$id = $_GET['id'] ?? null;

if ($id) {
   $query = "DELETE FROM contacts WHERE id = ?";
   $stmt = $conn->prepare($query);
   $stmt->bind_param("i", $id);
   $stmt->execute();

   if ($stmt->affected_rows > 0) {
      header("Location: ../contact.php"); // Kembali ke halaman utama
      exit;
   } else {
      echo "Gagal menghapus data.";
   }
} else {
   echo "ID tidak ditemukan.";
}