# Input data dari pengguna
nama_barang = input('Masukan Nama Barang: ')
jumlah = int(input('Masukan Jumlah Barang: '))
harga_satuan = int(input('Masukan Harga Satuan Barang: '))

# Hitung total harga
total = jumlah * harga_satuan

# Tampilkan output
print(f"Total yang harus dibayar untuk {nama_barang} adalah Rp{total}")