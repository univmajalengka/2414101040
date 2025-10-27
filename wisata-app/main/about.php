<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Tahura</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<!-- Navbar -->
<header>
    <nav class="flex justify-between items-center px-8 py-5 fixed top-0 right-0 left-0 bg-white shadow-sm no-print z-50">
        <h1 class="font-bold text-green-700 text-3xl">Tahura<span class="text-slate-900 font-black"></span></h1>
        <div class="flex gap-5">
            <a href="/wisata-app" class="hover:text-green-700 font-semibold text-slate-900">Home</a>
            <a href="about.php" class="hover:text-green-700 font-semibold text-green-700">About</a>
            <a href="contact.php" class="hover:text-green-700 font-semibold text-slate-900">Contact</a>
        </div>
        <div class="">
            <a href="/wisata-app/main/form.php" class="py-2 px-6 bg-green-700 rounded-md text-white font-semibold hover:bg-green-900 transition-all ease-in-out duration-200">Daftar</a>
            <a href="index.php?route=pemesan" class="py-2 px-6 bg-white border border-green-800 rounded-md text-green-800 font-semibold hover:bg-green-800 hover:text-white transition-all ease-in-out duration-200">Pemesan</a>
        </div>
    </nav>
</header>

<!-- Content -->
<main class="pt-28 pb-16 px-6">
    <div class="container mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Tempat Wisata Tahura</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Jelajahi keindahan alam dan pesona wisata yang menakjubkan di Taman Hutan Raya</p>
        </div>

        <!-- Grid Tempat Wisata -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <!-- Tempat Wisata 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="https://cdn.discordapp.com/attachments/1426924086222786590/1426924112131129374/WhatsApp_Image_2025-10-12_at_19.45.22_cc3968aa.jpg?ex=68ecfe23&is=68ebaca3&hm=4ab8758ead2ae324e0182b9a747e96630f5842d611580d7354354e3b7f73830a" 
                     alt="Puncak Sunrise" 
                     class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Sunrise</h3>
                    <p class="text-gray-600 mb-4">
                        Nikmati keindahan matahari terbit dari puncak tertinggi Tahura. Pemandangan 360 derajat yang menakjubkan dengan kabut pagi yang menyelimuti lembah hijau. Waktu terbaik: 05.00 - 07.00 WIB.
                    </p>
                    <div class="flex items-center text-green-700 text-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Majalengka, Panyaweyan</span>
                    </div>
                </div>
            </div>

            <!-- Tempat Wisata 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&h=600&fit=crop" 
                     alt="Hutan Pinus" 
                     class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Hutan Pinus</h3>
                    <p class="text-gray-600 mb-4">
                        Kawasan hutan pinus dengan jalur setapak yang instagramable. Cahaya matahari menembus celah pohon menciptakan efek dramatis. Spot favorit untuk foto pre-wedding dan konten aesthetic.
                    </p>
                    <div class="flex items-center text-green-700 text-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Majalengka, Argalingga</span>
                    </div>
                </div>
            </div>

            <!-- Tempat Wisata 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1433086966358-54859d0ed716?w=800&h=600&fit=crop" 
                     alt="Danau Cermin" 
                     class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Curug Parigi</h3>
                    <p class="text-gray-600 mb-4">
                        Curug dengan air jernih seperti cermin yang memantulkan pemandangan sekitar. Lokasi favorit untuk foto refleksi yang memukau. Terdapat dermaga kayu yang menambah kesan romantis.
                    </p>
                    <div class="flex items-center text-green-700 text-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Majalengka, Parigi</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- CTA Section -->
        <div class="text-center mt-16">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Siap Menjelajahi Keindahan Tahura?</h3>
            <p class="text-gray-600 mb-6">Pesan tiket Anda sekarang dan rasakan pengalaman wisata yang tak terlupakan</p>
            <a href="/wisata-app/main/form.php" class="inline-block py-4 px-8 bg-green-700 rounded-lg text-white text-xl font-semibold hover:bg-green-900 hover:scale-105 transition-all ease-in-out duration-200 shadow-lg">
                Pesan Tiket Sekarang
                <a href="/wisata-app/main/form.php" a>
            </a>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-6 text-center">
        <h3 class="text-2xl font-bold mb-4">Tahura</h3>
        <p class="text-gray-400 mb-6">Destinasi wisata alam terbaik untuk pengalaman yang tak terlupakan</p>
        <p class="text-gray-500 text-sm">&copy; 2024 Tahura. All rights reserved.</p>
    </div>
</footer>

</body>
</html>