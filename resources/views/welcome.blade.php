<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Game Edukasi SMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .game-card:hover img { transform: scale(1.05); }
    </style>
</head>
<body class="bg-[#0f172a] text-slate-200 min-h-screen">

    <!-- Navbar ala CrazyGames -->
    <nav class="bg-[#1e293b] border-b border-slate-700 px-6 py-4 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center gap-2">
            <div class="bg-blue-600 p-2 rounded-lg text-white font-black italic">SMA</div>
            <span class="text-xl font-extrabold tracking-tight text-white">GAMELAB</span>
        </div>
        
        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="bg-slate-700 hover:bg-slate-600 text-white px-5 py-2 rounded-full font-bold text-sm transition-all flex items-center gap-2">
                <span>🔐</span> Admin Login
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="max-w-7xl mx-auto px-6 py-12 text-center">
        <h1 class="text-4xl md:text-6xl font-black text-white mb-4 leading-tight">
            Belajar Jadi Lebih <span class="text-blue-500">Seru!</span>
        </h1>
        <p class="text-slate-400 max-w-2xl mx-auto">
            Portal game edukasi interaktif untuk siswa SMA. Pilih mata pelajaranmu dan mulai kumpulkan koin serta naikkan levelmu!
        </p>
    </header>

    <!-- Game Categories / Grid -->
    <main class="max-w-7xl mx-auto px-6 pb-20">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-extrabold text-white">Featured Games</h2>
            <div class="h-1 flex-grow mx-4 bg-slate-800 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Card Game: Susun Huruf -->
            <div class="game-card group bg-[#1e293b] rounded-3xl overflow-hidden border border-slate-700 hover:border-blue-500 transition-all shadow-xl">
                <div class="relative h-48 overflow-hidden">
                    <!-- Kamu bisa ganti src dengan path gambar aslimu nanti -->
                    <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?auto=format&fit=crop&q=80&w=800" 
                         class="w-full h-full object-cover transition-transform duration-500" alt="Susun Huruf">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1e293b] to-transparent"></div>
                    <div class="absolute bottom-4 left-4 bg-blue-600 text-xs font-black px-3 py-1 rounded-full text-white">BARU</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-blue-400">Susun Huruf</h3>
                    <p class="text-slate-400 text-sm mb-6 leading-relaxed">
                        Tantang dirimu menyusun istilah kimia, fisika, dan multimedia dalam waktu singkat.
                    </p>
                    <a href="{{ route('game.play', 'susun-huruf') }}" 
                       class="inline-block w-full text-center bg-blue-600 hover:bg-blue-500 text-white font-black py-3 rounded-2xl transition-all shadow-lg shadow-blue-900/20">
                        MAIN SEKARANG
                    </a>
                </div>
            </div>

            <!-- Card Game: Trivia Quiz -->
            <div class="game-card group bg-[#1e293b] rounded-3xl overflow-hidden border border-slate-700 hover:border-emerald-500 transition-all shadow-xl">
                <div class="relative h-48 overflow-hidden">
                    <!-- Gunakan gambar trivia yang menarik -->
                    <img src="https://media.baamboozle.com/uploads/images/1007628/5a230ef4-61df-4393-aa24-f74956ab2d17.jpeg" 
                        class="w-full h-full object-cover transition-transform duration-500" alt="Trivia Quiz">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1e293b] to-transparent"></div>
                    <div class="absolute bottom-4 left-4 bg-emerald-600 text-xs font-black px-3 py-1 rounded-full text-white">HOT</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-emerald-400">🧠 Trivia Quiz 4 Pilihan</h3>
                    <p class="text-slate-400 text-sm mb-6 leading-relaxed">
                        Uji wawasanmu! Jawab pertanyaan pilihan ganda, gunakan instingmu, dan beli power-ups untuk menang!
                    </p>
                    <a href="{{ route('game.play', 'trivia-quiz') }}" 
                    class="inline-block w-full text-center bg-emerald-600 hover:bg-emerald-500 text-white font-black py-3 rounded-2xl transition-all shadow-lg shadow-emerald-900/20">
                        MAIN SEKARANG
                    </a>
                </div>
            </div>

            <!-- Card Coming Soon -->
            <div class="bg-[#1e293b]/50 border-2 border-dashed border-slate-700 rounded-3xl flex flex-col items-center justify-center p-12 text-center opacity-60">
                <div class="text-4xl mb-4">🎮</div>
                <h3 class="text-lg font-bold text-slate-400 italic">Game Berikutnya...</h3>
                <p class="text-slate-600 text-xs mt-2">Sedang dikembangkan oleh tim Kelompok 2</p>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800 py-10 text-center">
        <p class="text-slate-500 text-sm font-medium">
            &copy; 2026 Sistem Multimedia - Kelompok 2 - Universitas Gunadarma
        </p>
    </footer>

</body>
</html>