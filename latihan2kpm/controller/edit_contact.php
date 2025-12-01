<?php
include '../database/db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
   echo "ID tidak ditemukan.";
   exit;
}

// Fetch data berdasarkan ID
$query = "SELECT * FROM contacts WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
   echo "Kontak tidak ditemukan.";
   exit;
}

$contact = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $nama_lengkap = $_POST['nama_lengkap'];
   $email = $_POST['email'];
   $pesan = $_POST['pesan'];

   $update = "UPDATE contacts SET nama_lengkap = ?, email = ?, pesan = ? WHERE id = ?";
   $stmt = $conn->prepare($update);
   $stmt->bind_param("sssi", $nama_lengkap, $email, $pesan, $id);

   if ($stmt->execute()) {
      header("Location: ../contact.php");
      exit;
   } else {
      echo "Update gagal: " . $conn->error;
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Kontak</title>
   <style>
      .form-container {
         max-width: 600px;
         margin: 50px auto;
         padding: 30px;
         background-color: #fff;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         border-radius: 10px;
      }

      .form-container h2 {
         text-align: center;
         margin-bottom: 25px;
         color: #2c3e50;
      }

      .form-group {
         margin-bottom: 20px;
      }

      .form-group label {
         display: block;
         margin-bottom: 8px;
         font-weight: bold;
      }

      .form-group input,
      .form-group textarea {
         width: 100%;
         padding: 12px;
         border: 1px solid #ccc;
         border-radius: 5px;
         font-size: 16px;
         background-color: #f9f9f9;
      }

      .form-group textarea {
         resize: vertical;
         height: 120px;
      }

      .btn-save {
         background-color: #3498db;
         color: white;
         padding: 12px 20px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         font-size: 16px;
         transition: background-color 0.2s ease;
         display: block;
         width: 100%;
      }

      .btn-save:hover {
         background-color: #21618c;
      }
   </style>
</head>

<body>
   <div class="form-container">
      <h2>Edit Kontak</h2>
      <form method="POST">
         <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="<?php echo htmlspecialchars($contact['nama_lengkap']); ?>" required>
         </div>

         <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($contact['email']); ?>" required>
         </div>

         <div class="form-group">
            <label>Pesan</label>
            <textarea name="pesan" required><?php echo htmlspecialchars($contact['pesan']); ?></textarea>
         </div>

         <button type="submit" class="btn btn-save">Simpan Perubahan</button>
      </form>
   </div>
</body>

</html>