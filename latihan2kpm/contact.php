<?php
include 'database/db.php';

$sql = "SELECT * From contacts";
$result =$conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Data Pesan</title>
   <style>
      /* Reset default style */
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      body {
         background: #f4f6f9;
         padding: 40px;
         color: #333;
      }

      h1 {
         text-align: center;
         margin-bottom: 30px;
         color: #2c3e50;
      }

      table {
         width: 100%;
         max-width: 900px;
         margin: 0 auto;
         border-collapse: collapse;
         background: #fff;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         border-radius: 10px;
         overflow: hidden;
      }

      th,
      td {
         padding: 15px 20px;
         text-align: left;
      }

      thead {
         background-color: #3498db;
         color: white;
      }

      tr:nth-child(even) {
         background-color: #f2f2f2;
      }

      a {
         text-decoration: none;
         color: #3498db;
         font-weight: bold;
      }

      a:hover {
         color: #21618c;
         text-decoration: underline;
      }

      /* Responsive tweaks */
      @media (max-width: 768px) {

         table,
         thead,
         tbody,
         th,
         td,
         tr {
            display: block;
         }

         thead {
            display: none;
         }

         tr {
            margin-bottom: 15px;
            border-bottom: 1px solid #ccc;
         }

         td {
            padding-left: 50%;
            position: relative;
         }

         td::before {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-weight: bold;
            color: #555;
         }

         td:nth-child(1)::before {
            content: "No";
         }

         td:nth-child(2)::before {
            content: "Nama Lengkap";
         }

         td:nth-child(3)::before {
            content: "Email";
         }

         td:nth-child(4)::before {
            content: "Pesan";
         }

         td:nth-child(5)::before {
            content: "Aksi";
         }
      }
   </style>
</head>

<body>
   <h1>Data Ticket</h1>
   <table cellpadding="10" cellspacing="0">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Aksi</th>
         </tr>
      </thead>
     <tbody>
         <?php if ($result->num_rows > 0): ?>
            <?php $no = 1;
            ?>
            <?php while ($row = $result->fetch_assoc()): ?>
               <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo htmlspecialchars($row['nama_lengkap']); ?></td>
                  <td><?php echo htmlspecialchars($row['email']); ?></td>
                  <td><?php echo htmlspecialchars($row['pesan']); ?></td>
                  <td>
                     <a href="controller/edit_contact.php?id=<?php echo $row['id']; ?>">Edit</a> |
                     <a href="controller/delete_contact.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah kamu yakin?');">Hapus</a>
                  </td>
               </tr>
            <?php endwhile; ?>
         <?php else: ?>
            <tr>
               <td colspan="5">Tidak ada pesan</td>
            </tr>
         <?php endif; ?>
      </tbody>
   </table>
</body>

</html>