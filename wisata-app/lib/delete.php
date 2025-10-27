<?php
include "connection.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Validasi ID adalah angka
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    
    if ($id === false || $id <= 0) {
        die("ID tidak valid");
    }

    // Gunakan prepared statement untuk keamanan
    $sql = "DELETE FROM pemesanan_tiket WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Cek apakah ada data yang terhapus
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                
                // Redirect ke halaman daftar pemesanan setelah sukses menghapus
                header("Location: ../index.php?route=pemesan&status=deleted");
                exit();
            } else {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                die("Data dengan ID tersebut tidak ditemukan");
            }
        } else {
            $error = mysqli_error($conn);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            die("Error saat menghapus data: " . htmlspecialchars($error));
        }
    } else {
        $error = mysqli_error($conn);
        mysqli_close($conn);
        die("Error menyiapkan query: " . htmlspecialchars($error));
    }
} else {
    mysqli_close($conn);
    die("ID tidak ditemukan");
}
?>