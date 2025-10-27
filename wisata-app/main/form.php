<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manohara | Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="w-full flex justify-center items-center my-10">
        <div class="w-[40rem] border bg-white rounded-md shadow-md p-5">
            <h1 class="text-3xl font-bold text-slate-900 mb-5">Form Pemesanan</h1>
            <form method="post" action="../lib/insert.php">
                <!-- name -->
                <label for="name" class="text-lg">Nama Lengkap</label>
                <br>
                <input type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2">
                <!--no HP  -->
                <label for="noHP" class="text-lg">No. Handphone</label>
                <br>
                <input type="text" name="noHP" id="noHP" inputmode="number" placeholder="Masukkan No. Handphone" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                <!-- tempat wisata -->
                <label for="tempat" class="text-lg">Tempat Wisata</label>
                <br>
                <select type="text" name="tempat" id="tempat" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2">
                    <option value="paralayang" data-harga="50000">Hutan Pinus - Rp. 50.000</option>
                    <option value="kebun teh" data-harga="60000">Curug parigi - Rp. 60.000</option>
                    <option value="panyaweuyan" data-harga="70000">Panyaweuyan - Rp. 70.000</option>
                </select>
                <!-- tanggal kunjungan -->
                <div>
                    <label for="tgl" class="text-lg">Tanggal Kunjungan:</label>
                    <br>
                    <input type="date" class="form-control" id="tgl" name="tgl" required />
                </div>
                <br>
                <!-- jumlah pengunjung -->
                <label for="pengunjung" class="text-lg">Jumlah Pengunjung</label>
                <br>
                <input type="number" name="pengunjung" id="pengunjung" placeholder="Masukkan Jumlah Pengunjung" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2">
                <!-- harga tiket -->
                <label for="hargaTiket" class="text-lg">Harga Tiket (Rp.)</label>
                <br>
                <input type="text" name="hargaTiket" id="hargaTiket" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2" readonly>
                <!-- Total Harga -->
                <label for="totalBayar" class="text-lg">Total Bayar (Rp.)</label>
                <br>
                <input type="text" name="totalBayar" id="totalBayar" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2" readonly>

                <button type="submit" class="py-2 px-6 text-white bg-green-800 rounded-md">Kirim</button>
                <button type="button" class="py-2 px-6 text-white bg-yellow-500 rounded-md">Hitung</button>
                <button type="reset" class="py-2 px-6 text-white bg-red-700 rounded-md">Reset</button>
            </form>
        </div>
    </div>


    <script src="../assets/js/script.js"></script>
</body>

</html>