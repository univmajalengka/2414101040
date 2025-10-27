<!-- Tampilan Tabel Data Pemesanan -->
<div class="container mx-auto px-4 py-8 my-10">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-semibold text-slate-900">
                Data Pemesanan Tiket Wisata
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No HP</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tempat Wisata</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengunjung</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Bayar</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" colspan="2">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    // Koneksi database
                    include 'lib/connection.php';

                    // Query untuk mengambil data
                    $query = "SELECT * FROM pemesanan_tiket ORDER BY created_at ASC";
                    $result = mysqli_query($conn, $query);

                    // Cek apakah ada data
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Tentukan warna status
                            $statusColor = [
                                'Pending' => 'bg-yellow-100 text-yellow-800',
                                'Lunas' => 'bg-green-100 text-green-800',
                                'Dibatalkan' => 'bg-red-100 text-red-800'
                            ];
                    ?>
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="px-6 py-4 whitespace-nowrap"><?= $no++ ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($row['no_handphone']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                        <?= htmlspecialchars($row['tempat_wisata']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?= date('d M Y', strtotime($row['tanggal_kunjungan'])) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $row['jumlah_pengunjung'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-green-600">
                                    Rp. <?= number_format($row['total_bayar'], 0, ',', '.') ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Status Pembayaran -->
                                    <span class="px-2 py-1 rounded-full text-xs <?= $statusColor[$row['status_pembayaran']] ?>">
                                        <?= $row['status_pembayaran'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <!-- Dropdown Ubah Status -->
                                        <select
                                            onchange="ubahStatus(<?= $row['id'] ?>, this.value)"
                                            class="px-2 py-1 border rounded text-sm">
                                            <option value="Pending" <?= $row['status_pembayaran'] == 'Pending' ? 'selected' : '' ?>>
                                                Pending
                                            </option>
                                            <option value="Lunas" <?= $row['status_pembayaran'] == 'Lunas' ? 'selected' : '' ?>>
                                                Lunas
                                            </option>
                                            <option value="Dibatalkan" <?= $row['status_pembayaran'] == 'Dibatalkan' ? 'selected' : '' ?>>
                                                Dibatalkan
                                            </option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <a href="index.php?route=detail&id=<?= $row['id'] ?>"><i class="ph ph-info text-blue-600"></i></a>
                                    <a href="index.php?route=edit&id=<?= $row['id']  ?>"><i class="ph ph-pencil-simple text-yellow-500"></i></a>
                                    <a href="lib/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Kamu Yakin ingin menghapus data ini?')"><i class="ph ph-trash text-red-600"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data pemesanan
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
            <span class="text-sm text-gray-600">
                Total Data: <?= mysqli_num_rows($result) ?> Pemesanan
            </span>
        </div>
    </div>
</div>

<script>
    function ubahStatus(id, status) {
        // Konfirmasi perubahan status
        if (confirm(`Anda yakin ingin mengubah status pembayaran menjadi ${status}?`)) {
            // Kirim request AJAX
            fetch("lib/ubah_status.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `id=${id}&status=${status}`,
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        // Refresh halaman atau update tampilan
                        location.reload();
                    } else {
                        // Tampilkan pesan error
                        alert("Gagal mengubah status: " + data.message);
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat mengubah status");
                });
        }
    }
</script>