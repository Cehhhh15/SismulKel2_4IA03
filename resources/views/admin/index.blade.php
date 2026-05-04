<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GEMMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .tab-content { display: none; }
        .tab-content.active { display: block; animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden text-slate-800">

    <!-- Sidebar / Navbar Samping -->
    <aside class="w-72 bg-slate-900 text-white flex flex-col shadow-2xl z-20">
        <div class="p-6 border-b border-slate-800">
            <h1 class="text-2xl font-black tracking-tight"><span class="text-blue-500">GEMMA</span></h1>
            <p class="text-slate-400 text-xs mt-1">Admin Content Management</p>
        </div>

        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4 px-2 mt-2">Daftar Game</p>
            
            @foreach($games as $index => $game)
                <button onclick="switchTab('{{ $game->slug }}')" id="nav-{{ $game->slug }}" 
                        class="nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-semibold transition-all {{ $index == 0 ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    @if($game->slug == 'susun-huruf') 🧩
                    @elseif($game->slug == 'trivia-quiz') 🧠
                    @else 🎮 @endif
                    {{ $game->name }}
                </button>
            @endforeach
        </nav>

        <div class="p-4 border-t border-slate-800">
            <a href="/" class="block w-full text-center py-2 mb-2 text-sm text-slate-400 hover:text-white transition">Lihat Web Portal</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white py-3 rounded-xl font-bold transition-colors border border-rose-500/20 flex justify-center items-center gap-2">
                    <span>🚪</span> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50">
        
        <!-- Header -->
        <header class="bg-white border-b border-slate-200 px-8 py-5 flex justify-between items-center shadow-sm z-10">
            <h2 class="text-xl font-bold text-slate-700" id="pageTitle">Dashboard Soal</h2>
            <div class="flex items-center gap-3 bg-emerald-50 text-emerald-600 px-4 py-2 rounded-full border border-emerald-100 text-sm font-bold shadow-sm">
                <span>👋</span> Selamat Datang, Admin!
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto p-8 relative">

            <!-- Alerts -->
            @if(session('success'))
                <div class="bg-emerald-500 text-white px-6 py-4 rounded-xl mb-6 shadow-lg flex items-center gap-3 animate-bounce">
                    <span class="text-xl">✅</span> <strong>Berhasil!</strong> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-rose-500 text-white px-6 py-4 rounded-xl mb-6 shadow-lg flex items-center gap-3">
                    <span class="text-xl">⚠️</span> <strong>Gagal!</strong> {{ session('error') }}
                </div>
            @endif

            <!-- KONTEN DINAMIS BERDASARKAN GAME -->
            @foreach($games as $index => $game)
                <div id="tab-{{ $game->slug }}" class="tab-content {{ $index == 0 ? 'active' : '' }}">
                    
                    <!-- FORM AREA -->
                    <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-slate-200 mb-8 relative overflow-hidden">
                        
                        @if($game->slug == 'susun-huruf')
                            <!-- FORM KHUSUS SUSUN HURUF -->
                            <div class="absolute top-0 right-0 bg-blue-100 text-blue-600 px-4 py-1 rounded-bl-2xl font-black text-xs uppercase">Mode: Susun Huruf</div>
                            <h3 class="text-xl font-bold mb-6 text-slate-800">Tambah Soal Susun Huruf</h3>
                            
                            <form action="{{ route('admin.question.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="game_id" value="{{ $game->id }}">
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-600 mb-2">Pertanyaan</label>
                                        <textarea name="question_text" rows="3" class="w-full border-2 border-slate-200 rounded-xl px-4 py-3 focus:border-blue-500 outline-none transition" placeholder="Contoh: Elemen multimedia berupa suara..." required></textarea>
                                    </div>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-bold text-slate-600 mb-2">Jawaban Benar (Tanpa Spasi)</label>
                                            <input type="text" name="answer_key" id="susunAnswer" class="w-full border-2 border-slate-200 rounded-xl px-4 py-3 focus:border-blue-500 outline-none uppercase font-mono tracking-widest text-blue-600 font-bold" placeholder="Contoh: AUDIO" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold text-slate-600 mb-2">Huruf Acak (Otomatis)</label>
                                            <input type="text" name="options" id="susunOptions" class="w-full bg-slate-100 border-2 border-slate-200 rounded-xl px-4 py-3 text-slate-500 font-mono tracking-widest cursor-not-allowed" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-blue-600/30 transition-all w-full md:w-auto">Simpan Soal Susun Huruf</button>
                            </form>

                        @elseif($game->slug == 'trivia-quiz')
                            <!-- FORM KHUSUS TRIVIA QUIZ -->
                            <div class="absolute top-0 right-0 bg-emerald-100 text-emerald-600 px-4 py-1 rounded-bl-2xl font-black text-xs uppercase">Mode: Pilihan Ganda</div>
                            <h3 class="text-xl font-bold mb-6 text-slate-800">Tambah Soal Trivia Quiz</h3>
                            
                            <form action="{{ route('admin.question.store') }}" method="POST" id="triviaForm">
                                @csrf
                                <input type="hidden" name="game_id" value="{{ $game->id }}">
                                <input type="hidden" name="answer_key" id="triviaAnswerKey">
                                <input type="hidden" name="options" id="triviaOptions">

                                <div class="mb-6">
                                    <label class="block text-sm font-bold text-slate-600 mb-2">Pertanyaan Kuis</label>
                                    <textarea name="question_text" rows="2" class="w-full border-2 border-slate-200 rounded-xl px-4 py-3 focus:border-emerald-500 outline-none transition text-lg" placeholder="Contoh: Siapakah presiden pertama Indonesia?" required></textarea>
                                </div>

                                <label class="block text-sm font-bold text-slate-600 mb-3">4 Pilihan Jawaban (Pilih salah satu sebagai jawaban benar)</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                                    <!-- A -->
                                    <div class="flex items-center gap-3 bg-slate-50 border-2 border-slate-200 p-2 rounded-xl focus-within:border-emerald-500 transition">
                                        <input type="radio" name="trivia_correct" value="A" class="w-6 h-6 text-emerald-600 focus:ring-emerald-500 ml-2" required>
                                        <span class="font-bold text-slate-400">A.</span>
                                        <input type="text" id="optA" class="bg-transparent w-full outline-none py-2" placeholder="Pilihan A" required>
                                    </div>
                                    <!-- B -->
                                    <div class="flex items-center gap-3 bg-slate-50 border-2 border-slate-200 p-2 rounded-xl focus-within:border-emerald-500 transition">
                                        <input type="radio" name="trivia_correct" value="B" class="w-6 h-6 text-emerald-600 focus:ring-emerald-500 ml-2">
                                        <span class="font-bold text-slate-400">B.</span>
                                        <input type="text" id="optB" class="bg-transparent w-full outline-none py-2" placeholder="Pilihan B" required>
                                    </div>
                                    <!-- C -->
                                    <div class="flex items-center gap-3 bg-slate-50 border-2 border-slate-200 p-2 rounded-xl focus-within:border-emerald-500 transition">
                                        <input type="radio" name="trivia_correct" value="C" class="w-6 h-6 text-emerald-600 focus:ring-emerald-500 ml-2">
                                        <span class="font-bold text-slate-400">C.</span>
                                        <input type="text" id="optC" class="bg-transparent w-full outline-none py-2" placeholder="Pilihan C" required>
                                    </div>
                                    <!-- D -->
                                    <div class="flex items-center gap-3 bg-slate-50 border-2 border-slate-200 p-2 rounded-xl focus-within:border-emerald-500 transition">
                                        <input type="radio" name="trivia_correct" value="D" class="w-6 h-6 text-emerald-600 focus:ring-emerald-500 ml-2">
                                        <span class="font-bold text-slate-400">D.</span>
                                        <input type="text" id="optD" class="bg-transparent w-full outline-none py-2" placeholder="Pilihan D" required>
                                    </div>
                                </div>
                                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-emerald-600/30 transition-all w-full md:w-auto">Simpan Soal Trivia</button>
                            </form>
                        @endif

                    </div>

                    <!-- TABLE AREA (Hanya menampilkan soal dari game ini) -->
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
                            <h4 class="font-bold text-slate-700">Daftar Soal: {{ $game->name }}</h4>
                            <span class="bg-slate-200 text-slate-600 px-3 py-1 rounded-full text-xs font-bold">{{ $questions->where('game_id', $game->id)->count() }} Soal</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-white text-slate-400 uppercase text-[10px] font-black tracking-wider">
                                    <tr>
                                        <th class="p-6 border-b">Pertanyaan</th>
                                        <th class="p-6 border-b">Jawaban Benar</th>
                                        <th class="p-6 border-b text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-slate-600">
                                    @forelse($questions->where('game_id', $game->id) as $q)
                                    <tr class="border-b hover:bg-slate-50 transition">
                                        <td class="p-6">{{ Str::limit($q->question_text, 60) }}</td>
                                        <td class="p-6 font-mono font-bold {{ $game->slug == 'trivia-quiz' ? 'text-emerald-600' : 'text-blue-600' }}">{{ $q->answer_key }}</td>
                                        <td class="p-6 text-right">
                                            <form action="{{ route('admin.question.destroy', $q->id) }}" method="POST" onsubmit="return confirm('Hapus soal ini secara permanen?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-500 bg-rose-50 px-3 py-1.5 rounded-lg hover:bg-rose-500 hover:text-white transition font-bold text-xs">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="p-8 text-center text-slate-400 italic">Belum ada soal untuk game ini.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </main>

    <!-- SCRIPT LOGIKA FORM DAN NAVBAR -->
    <script>
        // 1. Logika Switch Tab (Navbar Samping)
        function switchTab(slug) {
            // Sembunyikan semua konten tab
            document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
            // Reset semua style tombol navbar
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.className = 'nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-semibold transition-all text-slate-400 hover:bg-slate-800 hover:text-white';
            });

            // Tampilkan tab yang dipilih
            document.getElementById('tab-' + slug).classList.add('active');
            
            // Beri warna aktif pada tombol sidebar yang ditekan
            const activeBtn = document.getElementById('nav-' + slug);
            if(slug === 'trivia-quiz') {
                activeBtn.className = 'nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-semibold transition-all bg-emerald-600 text-white shadow-lg shadow-emerald-900/20';
            } else {
                activeBtn.className = 'nav-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-semibold transition-all bg-blue-600 text-white shadow-lg shadow-blue-900/20';
            }

            // Update Judul Header
            document.getElementById('pageTitle').innerText = activeBtn.innerText.replace(/[^\w\s]/gi, '').trim();
        }

        // 2. Logika Auto-Acak untuk Game Susun Huruf
        const susunAnswer = document.getElementById('susunAnswer');
        if(susunAnswer) {
            susunAnswer.addEventListener('input', function() {
                let answer = this.value.toUpperCase().replace(/\s/g, ''); 
                if (answer.length > 0) {
                    let letters = answer.split('');
                    for (let i = letters.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [letters[i], letters[j]] = [letters[j], letters[i]];
                    }
                    document.getElementById('susunOptions').value = letters.join(', ');
                } else {
                    document.getElementById('susunOptions').value = '';
                }
            });
        }

        // 3. Logika Compile Form untuk Game Trivia Quiz
        const triviaForm = document.getElementById('triviaForm');
        if(triviaForm) {
            triviaForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Tahan pengiriman form sementara
                
                // Ambil nilai dari 4 inputan A, B, C, D
                let a = document.getElementById('optA').value.trim();
                let b = document.getElementById('optB').value.trim();
                let c = document.getElementById('optC').value.trim();
                let d = document.getElementById('optD').value.trim();

                // Gabungkan menjadi format koma (A, B, C, D) untuk database
                let combinedOptions = [a, b, c, d].filter(Boolean).join(', ');
                document.getElementById('triviaOptions').value = combinedOptions;

                // Cari radio button mana yang diceklis (A/B/C/D)
                let correctRadio = document.querySelector('input[name="trivia_correct"]:checked');
                if(!correctRadio) {
                    alert('Mohon pilih salah satu jawaban yang benar dengan mengklik tombol bulat di sebelahnya!');
                    return;
                }

                // Ambil teks dari input yang sesuai dengan radio yang diceklis
                let correctAnswerText = document.getElementById('opt' + correctRadio.value).value.trim();
                document.getElementById('triviaAnswerKey').value = correctAnswerText;

                // Lanjutkan pengiriman data ke Controller
                this.submit();
            });
        }

        // Set Tab Aktif Pertama Kali Berdasarkan Data
        @if(count($games) > 0)
            switchTab('{{ $games[0]->slug }}');
        @endif
    </script>
</body>
</html>