<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia Quiz - GEMMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .option-btn { transition: all 0.2s ease-in-out; }
        .option-btn:active { transform: scale(0.98); }
        .disabled-option { opacity: 0.3; pointer-events: none; filter: grayscale(100%); }
        .checkpoint-box { transition: all 0.3s; }
        .checkpoint-active { background-color: #3b82f6; border-color: #60a5fa; box-shadow: 0 0 10px #3b82f6; }
    </style>
</head>
<body class="bg-[#0f172a] text-slate-200 flex flex-col items-center min-h-screen p-4 relative">

    <!-- Tombol Kembali -->
    <div class="absolute top-6 left-6 z-10">
        <a href="/" class="flex items-center gap-2 text-slate-400 hover:text-white transition bg-[#1e293b] px-4 py-2 rounded-xl border border-slate-700 shadow-lg">
            <span class="text-xl font-bold">←</span>
        </a>
    </div>

    <!-- Main Container -->
    <div class="w-full max-w-md mt-16 flex flex-col gap-4">
        
        <!-- Header: Koin & Level -->
        <div class="flex justify-between items-center bg-[#1e293b] p-4 rounded-2xl border border-slate-700 shadow-lg">
            <div class="bg-amber-500/10 border border-amber-500/30 text-amber-400 px-4 py-1.5 rounded-full font-bold flex items-center gap-2">
                🪙 <span id="coinDisplay">0</span>
            </div>
            <div class="bg-blue-500/10 border border-blue-500/30 text-blue-400 px-4 py-1.5 rounded-full font-bold tracking-wide">
                LEVEL <span id="levelDisplay">1</span>
            </div>
        </div>

        <!-- Progress Bar (9 Checkpoint Boxes) -->
        <div class="bg-[#1e293b] p-3 rounded-2xl border border-slate-700 shadow-lg flex justify-between items-center gap-1" id="progressContainer">
            <!-- Akan di-generate oleh JS -->
        </div>

        <!-- Card Pertanyaan -->
        <div class="bg-slate-800 border-2 border-slate-700/50 rounded-3xl p-6 text-center shadow-xl min-h-[150px] flex items-center justify-center relative overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-[10px] font-black px-4 py-1 rounded-b-lg tracking-widest uppercase">
                Pertanyaan
            </div>
            <h2 id="questionText" class="text-xl font-bold text-slate-100 leading-relaxed mt-4"></h2>
        </div>
        
        <!-- Area Jawaban (4 Pilihan) -->
        <!-- Area Jawaban (4 Pilihan) -->
        <div id="optionsArea" class="flex flex-col gap-3 mt-2">
            <!-- Pilihan di-generate oleh JS -->
        </div>

        <!-- Tombol Lanjut (Sembunyi by default) -->
        <button id="nextBtn" class="hidden mt-4 bg-blue-600 text-white px-6 py-4 rounded-xl font-black w-full shadow-[0_4px_0_#1e3a8a] hover:bg-blue-500 hover:translate-y-1 hover:shadow-[0_2px_0_#1e3a8a] uppercase tracking-widest transition-all" onclick="nextQuestion()">
            Lanjut Soal Berikutnya
        </button>

        <!-- Power Ups Bar -->
        <div class="grid grid-cols-3 gap-3 mt-4">

        <!-- Power Ups Bar -->
        <div class="grid grid-cols-3 gap-3 mt-4">
            <button onclick="buySecondChance()" id="btnChance" class="bg-slate-800 border-b-4 border-slate-900 text-slate-300 p-3 rounded-2xl flex flex-col items-center justify-center hover:bg-slate-700 hover:-translate-y-1 transition active:translate-y-0 active:border-b-0">
                <span class="text-2xl mb-1">🎲</span>
                <span class="text-[10px] font-black text-amber-400" id="priceChance">🪙 50</span>
            </button>
            <button onclick="buy5050()" id="btn5050" class="bg-slate-800 border-b-4 border-slate-900 text-slate-300 p-3 rounded-2xl flex flex-col items-center justify-center hover:bg-slate-700 hover:-translate-y-1 transition active:translate-y-0 active:border-b-0">
                <span class="text-xl font-black mb-1">50/50</span>
                <span class="text-[10px] font-black text-amber-400" id="price5050">🪙 100</span>
            </button>
            <button onclick="buyInstantWin()" id="btnInstant" class="bg-slate-800 border-b-4 border-slate-900 text-slate-300 p-3 rounded-2xl flex flex-col items-center justify-center hover:bg-slate-700 hover:-translate-y-1 transition active:translate-y-0 active:border-b-0">
                <span class="text-2xl mb-1">✅</span>
                <span class="text-[10px] font-black text-amber-400" id="priceInstant">🪙 250</span>
            </button>
        </div>

    </div>

    <script>
        const questions = @json($questions);
        const gameSlug = "trivia-quiz"; // Identifier untuk local storage
        const storageKey = `gamelab_save_${gameSlug}`;

        // State Game
        let currentIdx = 0;
        let coins = 1000; // Modal awal untuk testing, bisa kamu ubah jadi 0
        let level = 1;
        let progress = 0; // 0 sampai 9
        let lastCheckpoint = 0; // Menyimpan titik aman terakhir (0, 3, atau 6)

        // Status Boost-ups
        let secondChanceActive = false;
        let isAnswered = false; // Mencegah klik dobel

        // Harga Dasar Boost-up
        const basePrices = { chance: 50, half: 100, instant: 250 };
        let currentPrices = { ...basePrices };

        function loadProgress() {
            const savedData = localStorage.getItem(storageKey);
            if (savedData) {
                const parsed = JSON.parse(savedData);
                currentIdx = parsed.currentIdx || 0;
                coins = parsed.coins || 0;
                level = parsed.level || 1;
                progress = parsed.progress || 0;
                lastCheckpoint = parsed.lastCheckpoint || 0;
            }
            updatePrices();
        }

        function saveProgress() {
            const dataToSave = { currentIdx, coins, level, progress, lastCheckpoint };
            localStorage.setItem(storageKey, JSON.stringify(dataToSave));
        }

        function updatePrices() {
            // Harga naik 10% setiap naik 1 level
            const multiplier = Math.pow(1.1, level - 1);
            currentPrices.chance = Math.floor(basePrices.chance * multiplier);
            currentPrices.half = Math.floor(basePrices.half * multiplier);
            currentPrices.instant = Math.floor(basePrices.instant * multiplier);

            document.getElementById('priceChance').innerText = `🪙 ${currentPrices.chance}`;
            document.getElementById('price5050').innerText = `🪙 ${currentPrices.half}`;
            document.getElementById('priceInstant').innerText = `🪙 ${currentPrices.instant}`;
        }

        function renderProgressBar() {
            const container = document.getElementById('progressContainer');
            container.innerHTML = '';
            for (let i = 1; i <= 9; i++) {
                let isCheckpoint = (i === 3 || i === 6 || i === 9);
                let boxClass = i <= progress 
                    ? 'bg-blue-500 border-blue-400 shadow-[0_0_8px_#3b82f6]' 
                    : 'bg-slate-800 border-slate-700';
                
                let content = '';
                if (isCheckpoint) {
                    let reward = i === 3 ? '15' : (i === 6 ? '30' : '75');
                    content = `<span class="text-[8px] font-bold text-amber-400">🪙${reward}</span>`;
                } else if (i <= progress) {
                    content = `<span class="text-white text-xs font-bold">✓</span>`;
                }

                container.innerHTML += `
                    <div class="h-8 flex-1 rounded border ${boxClass} flex items-center justify-center transition-all duration-300">
                        ${content}
                    </div>
                `;
            }
        }

        function loadQuestion() {
            if (currentIdx >= questions.length) {
                alert("Luar Biasa! Kamu telah menamatkan Trivia Quiz ini.");
                localStorage.removeItem(storageKey);
                location.href = "/";
                return;
            }

            isAnswered = false;
            secondChanceActive = false;
            document.getElementById('btnChance').classList.remove('bg-amber-600', 'border-amber-700');
            
            document.getElementById('coinDisplay').innerText = coins;
            document.getElementById('levelDisplay').innerText = level;
            renderProgressBar();

            const q = questions[currentIdx];
            document.getElementById('questionText').innerText = q.question_text;
            
            // Render Pilihan
            const optionsArea = document.getElementById('optionsArea');
            optionsArea.innerHTML = '';
            
            let options = typeof q.options_data === 'string' ? JSON.parse(q.options_data) : q.options_data;
            
            options.forEach((opt, idx) => {
                const btn = document.createElement('button');
                btn.className = 'option-btn w-full bg-[#1e293b] border-2 border-slate-600 text-slate-200 font-bold py-4 px-6 rounded-2xl text-left hover:bg-slate-700 hover:border-blue-400 flex items-center gap-4';
                // Label A, B, C, D
                const label = String.fromCharCode(65 + idx); 
                btn.innerHTML = `<span class="bg-slate-800 text-slate-400 px-3 py-1 rounded-lg border border-slate-600">${label}</span> <span>${opt}</span>`;
                btn.dataset.text = opt;
                btn.onclick = () => handleAnswer(btn, opt, q.answer_key);
                optionsArea.appendChild(btn);
            });
        }

        function handleAnswer(btn, selected, correct) {
            if (isAnswered) return;

            const isCorrect = selected.toUpperCase() === correct.toUpperCase();

            if (isCorrect) {
                isAnswered = true;
                btn.classList.replace('border-slate-600', 'border-emerald-500');
                btn.classList.add('bg-emerald-500/20', 'text-emerald-400');
                processCorrectAnswer();
            } else {
                if (secondChanceActive) {
                    // Kesempatan kedua terpakai
                    secondChanceActive = false;
                    document.getElementById('btnChance').classList.remove('bg-amber-600', 'border-amber-700');
                    btn.classList.add('disabled-option', 'border-rose-500', 'bg-rose-500/10');
                    btn.onclick = null; // Matikan tombol ini
                } else {
                    isAnswered = true;
                    btn.classList.replace('border-slate-600', 'border-rose-500');
                    btn.classList.add('bg-rose-500/20', 'text-rose-400');
                    
                    // Tampilkan jawaban yang benar
                    showCorrectAnswer(correct);
                    processWrongAnswer();
                }
            }
        }

        function showCorrectAnswer(correct) {
            const buttons = document.querySelectorAll('.option-btn');
            buttons.forEach(b => {
                if (b.dataset.text.toUpperCase() === correct.toUpperCase()) {
                    b.classList.replace('border-slate-600', 'border-emerald-500');
                    b.classList.add('bg-emerald-500/20', 'text-emerald-400');
                }
            });
        }

        function processCorrectAnswer() {
            progress++;
            
            // Cek Checkpoint
            if (progress === 3) { lastCheckpoint = 3; coins += 15; }
            if (progress === 6) { lastCheckpoint = 6; coins += 30; }
            if (progress === 9) {
                level++;
                progress = 0;
                lastCheckpoint = 0;
                coins += 75;
                updatePrices(); // Harga item naik!
            }
            
            // Update UI sebelum lanjut
            document.getElementById('coinDisplay').innerText = coins;
            renderProgressBar();

            // Munculkan tombol Lanjut alih-alih pindah otomatis
            const btn = document.getElementById('nextBtn');
            btn.innerText = "Benar! Lanjut Soal Berikutnya";
            btn.classList.replace('bg-rose-600', 'bg-blue-600');
            btn.classList.replace('shadow-[0_4px_0_#9f1239]', 'shadow-[0_4px_0_#1e3a8a]');
            btn.classList.remove('hidden');
        }

        function processWrongAnswer() {
            // Gagal! Kembali ke checkpoint terakhir
            progress = lastCheckpoint;
            
            // Update UI
            renderProgressBar();

            // Munculkan tombol Lanjut untuk pindah soal
            const btn = document.getElementById('nextBtn');
            btn.innerText = "Salah! Lanjut Soal Berikutnya";
            btn.classList.replace('bg-blue-600', 'bg-rose-600'); // Ubah warna tombol jadi merah
            btn.classList.replace('shadow-[0_4px_0_#1e3a8a]', 'shadow-[0_4px_0_#9f1239]');
            btn.classList.remove('hidden');
        }

        // Fitur Save Progress yang kamu minta
        function nextQuestion() {
            currentIdx++;
            saveProgress(); // Simpan progress (soal terbaru, koin, level, checkpoint)
            loadQuestion();
        }

        // Pastikan loadQuestion menyembunyikan tombol Lanjut saat soal baru muncul
        function loadQuestion() {
            if (currentIdx >= questions.length) {
                alert("Luar Biasa! Kamu telah menamatkan Trivia Quiz ini.");
                localStorage.removeItem(storageKey);
                location.href = "/";
                return;
            }

            isAnswered = false;
            secondChanceActive = false;
            
            // Sembunyikan tombol lanjut
            document.getElementById('nextBtn').classList.add('hidden');
            
            // Reset warna tombol boost-up chance jika tadinya dipakai
            document.getElementById('btnChance').classList.remove('bg-amber-600', 'border-amber-700');
            
            document.getElementById('coinDisplay').innerText = coins;
            document.getElementById('levelDisplay').innerText = level;
            renderProgressBar();

            const q = questions[currentIdx];
            document.getElementById('questionText').innerText = q.question_text;
            
            const optionsArea = document.getElementById('optionsArea');
            optionsArea.innerHTML = '';
            
            let options = typeof q.options_data === 'string' ? JSON.parse(q.options_data) : q.options_data;
            
            options.forEach((opt, idx) => {
                const btn = document.createElement('button');
                btn.className = 'option-btn w-full bg-[#1e293b] border-2 border-slate-600 text-slate-200 font-bold py-4 px-6 rounded-2xl text-left hover:bg-slate-700 hover:border-blue-400 flex items-center gap-4';
                const label = String.fromCharCode(65 + idx); 
                btn.innerHTML = `<span class="bg-slate-800 text-slate-400 px-3 py-1 rounded-lg border border-slate-600">${label}</span> <span>${opt}</span>`;
                btn.dataset.text = opt;
                btn.onclick = () => handleAnswer(btn, opt, q.answer_key);
                optionsArea.appendChild(btn);
            });
        }

        // --- FUNGSI BOOST-UPS ---

        function buySecondChance() {
            if (isAnswered || secondChanceActive) return;
            if (coins >= currentPrices.chance) {
                coins -= currentPrices.chance;
                secondChanceActive = true;
                document.getElementById('btnChance').classList.add('bg-amber-600', 'border-amber-700');
                updateUI();
            } else { alert("Koin tidak cukup!"); }
        }

        function buy5050() {
            if (isAnswered) return;
            const buttons = Array.from(document.querySelectorAll('.option-btn:not(.disabled-option)'));
            if (buttons.length <= 2) return; // Sudah terpakai

            if (coins >= currentPrices.half) {
                coins -= currentPrices.half;
                
                const correct = questions[currentIdx].answer_key.toUpperCase();
                const wrongButtons = buttons.filter(b => b.dataset.text.toUpperCase() !== correct);
                
                // Hilangkan 2 jawaban salah secara acak
                wrongButtons.sort(() => 0.5 - Math.random()).slice(0, 2).forEach(btn => {
                    btn.classList.add('disabled-option');
                    btn.onclick = null;
                });
                updateUI();
            } else { alert("Koin tidak cukup!"); }
        }

        function buyInstantWin() {
            if (isAnswered) return;
            if (coins >= currentPrices.instant) {
                coins -= currentPrices.instant;
                updateUI();
                
                const correct = questions[currentIdx].answer_key.toUpperCase();
                const buttons = document.querySelectorAll('.option-btn');
                buttons.forEach(b => {
                    if (b.dataset.text.toUpperCase() === correct) {
                        handleAnswer(b, b.dataset.text, correct); // Otomatis trigger jawaban benar
                    }
                });
            } else { alert("Koin tidak cukup!"); }
        }

        function updateUI() {
            document.getElementById('coinDisplay').innerText = coins;
            saveProgress(); // Simpan koin setelah beli item
        }

        // Inisialisasi
        loadProgress();
        loadQuestion();
    </script>
</body>
</html>