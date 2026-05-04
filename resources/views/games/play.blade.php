<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->name }} - Gamelab</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .letter-box { width: 45px; height: 45px; border: 2px dashed #475569; display: flex; align-items: center; justify-content: center; font-weight: bold; cursor: pointer; border-radius: 8px; transition: all 0.2s; color: white; }
        .letter-tile { width: 45px; height: 45px; background: #2563eb; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; cursor: pointer; border-radius: 8px; box-shadow: 0 4px 0 #1e3a8a; transition: transform 0.1s; }
        .letter-tile:active { transform: translateY(2px); box-shadow: 0 2px 0 #1e3a8a; }
        .hidden-tile { visibility: hidden; opacity: 0; }
    </style>
</head>
<body class="bg-[#0f172a] text-slate-200 flex items-center justify-center min-h-screen p-4 relative">

    <!-- Tombol Kembali -->
    <div class="absolute top-6 left-6">
        <a href="/" class="flex items-center gap-2 text-slate-400 hover:text-white transition bg-[#1e293b] px-4 py-2 rounded-xl border border-slate-700 shadow-lg">
            <span class="text-xl font-bold">←</span> Kembali ke Menu
        </a>
    </div>

    <!-- Main Card Game -->
    <div class="bg-[#1e293b] p-6 rounded-3xl shadow-2xl max-w-md w-full border border-slate-700 mt-12 md:mt-0 relative overflow-hidden">
        
        <!-- Header: Koin & Level -->
        <div class="flex justify-between items-center mb-6">
            <div class="bg-amber-500/10 border border-amber-500/30 text-amber-400 px-4 py-1.5 rounded-full font-bold flex items-center gap-2 shadow-sm">
                🪙 <span id="coinDisplay">0</span>
            </div>
            <div class="bg-blue-500/10 border border-blue-500/30 text-blue-400 px-4 py-1.5 rounded-full font-bold text-sm shadow-sm tracking-wide">
                LEVEL <span id="levelDisplay">1</span>
            </div>
        </div>

        <!-- Card Pertanyaan -->
        <div class="bg-slate-800 border-2 border-slate-700/50 rounded-2xl p-6 mb-8 text-center shadow-inner min-h-[120px] flex items-center justify-center">
            <h2 id="questionText" class="text-lg font-bold text-slate-100 leading-tight tracking-wide"></h2>
        </div>
        
        <!-- Area Jawaban -->
        <div id="answerArea" class="flex justify-center flex-wrap gap-2 mb-8"></div>

        <!-- Area Huruf Acak -->
        <div id="lettersPool" class="flex justify-center flex-wrap gap-3 mb-6 bg-slate-800/50 p-5 rounded-xl border border-slate-700/50"></div>

        <div id="statusMessage" class="h-6 text-center font-bold mb-6"></div>

        <!-- Power Ups Bar -->
        <div class="flex justify-center gap-4 mb-4">
            <button onclick="useHint()" class="bg-slate-800 border border-slate-600 text-slate-300 p-3 rounded-xl flex flex-col items-center gap-1 hover:bg-slate-700 hover:text-white transition shadow-lg">
                <span class="text-xs font-bold tracking-widest">💡 HINT</span>
                <span class="text-[10px] text-amber-400 font-bold">🪙 50</span>
            </button>
        </div>

        <button id="nextBtn" class="hidden bg-blue-600 text-white px-6 py-4 rounded-xl font-black w-full shadow-[0_4px_0_#1e3a8a] hover:bg-blue-500 hover:translate-y-1 hover:shadow-[0_2px_0_#1e3a8a] uppercase tracking-widest transition-all" onclick="nextQuestion()">
            Lanjut Level Berikutnya!
        </button>
    </div>

    <script>
        const questions = @json($questions);
        const gameSlug = "{{ $game->slug }}"; // Identifier unik untuk save data
        const storageKey = `gamelab_save_${gameSlug}`;

        // State Game
        let currentIdx = 0;
        let currentAnswer = [];
        let coins = 0;
        let level = 1;

        // Fungsi Load Data dari Local Storage
        function loadProgress() {
            const savedData = localStorage.getItem(storageKey);
            if (savedData) {
                const parsed = JSON.parse(savedData);
                currentIdx = parsed.currentIdx || 0;
                coins = parsed.coins || 0;
                level = parsed.level || 1;
            }
        }

        // Fungsi Save Data ke Local Storage
        function saveProgress() {
            const dataToSave = { currentIdx, coins, level };
            localStorage.setItem(storageKey, JSON.stringify(dataToSave));
        }

        function loadQuestion() {
            if (currentIdx >= questions.length) {
                alert("Luar Biasa! Kamu telah menamatkan semua soal di game ini.");
                localStorage.removeItem(storageKey); // Reset save data jika tamat
                location.href = "/";
                return;
            }

            // Update UI dari state
            document.getElementById('coinDisplay').innerText = coins;
            document.getElementById('levelDisplay').innerText = level;

            const q = questions[currentIdx];
            document.getElementById('questionText').innerText = q.question_text;
            document.getElementById('answerArea').innerHTML = '';
            document.getElementById('lettersPool').innerHTML = '';
            document.getElementById('statusMessage').innerText = '';
            document.getElementById('nextBtn').classList.add('hidden');
            currentAnswer = new Array(q.answer_key.length).fill("");

            // Render Kotak Kosong
            for(let i=0; i<q.answer_key.length; i++) {
                const b = document.createElement('div');
                b.className = 'letter-box';
                b.onclick = () => removeLetter(i);
                document.getElementById('answerArea').appendChild(b);
            }

            // Render Pilihan Huruf
            const tiles = typeof q.options_data === 'string' ? JSON.parse(q.options_data) : q.options_data;
            tiles.forEach((l, idx) => {
                const t = document.createElement('div');
                t.className = 'letter-tile';
                t.innerText = l;
                t.dataset.id = idx;
                t.onclick = () => placeLetter(l, idx, t);
                document.getElementById('lettersPool').appendChild(t);
            });
        }

        function placeLetter(l, id, el) {
            const emptyIdx = currentAnswer.indexOf("");
            if(emptyIdx !== -1) {
                currentAnswer[emptyIdx] = l;
                const box = document.getElementById('answerArea').children[emptyIdx];
                box.innerText = l;
                box.classList.replace('border-dashed', 'border-solid');
                box.classList.add('bg-blue-600', 'text-white', 'border-blue-500', 'scale-110');
                box.dataset.originId = id;
                el.classList.add('hidden-tile');
                setTimeout(() => box.classList.remove('scale-110'), 100);
                checkAnswer();
            }
        }

        function removeLetter(idx) {
            const box = document.getElementById('answerArea').children[idx];
            if(currentAnswer[idx] !== "") {
                const originId = box.dataset.originId;
                document.querySelector(`[data-id='${originId}']`).classList.remove('hidden-tile');
                currentAnswer[idx] = "";
                box.innerText = "";
                box.className = 'letter-box';
                document.getElementById('statusMessage').innerText = "";
            }
        }

        function checkAnswer() {
            if(!currentAnswer.includes("")) {
                const isCorrect = currentAnswer.join("").toUpperCase() === questions[currentIdx].answer_key.toUpperCase();
                const msg = document.getElementById('statusMessage');
                if(isCorrect) {
                    msg.innerText = "JAWABAN BENAR! 🎉";
                    msg.className = "h-6 text-center text-emerald-400 font-black tracking-widest uppercase drop-shadow-[0_0_8px_rgba(52,211,153,0.5)]";
                    handleSuccess();
                } else {
                    msg.innerText = "SALAH! COBA LAGI ❌";
                    msg.className = "h-6 text-center text-rose-500 font-black tracking-widest uppercase";
                }
            }
        }

        function handleSuccess() {
            coins += 15;
            level++; // 1 Soal = 1 Level
            
            document.getElementById('coinDisplay').innerText = coins;
            document.getElementById('nextBtn').classList.remove('hidden');
        }

        function useHint() {
            if (coins >= 50) {
                coins -= 50;
                document.getElementById('coinDisplay').innerText = coins;
                saveProgress(); // Simpan koin yang berkurang
                
                const emptyIdx = currentAnswer.indexOf("");
                if (emptyIdx !== -1) {
                    const correctChar = questions[currentIdx].answer_key[emptyIdx].toUpperCase();
                    const tiles = document.querySelectorAll('.letter-tile:not(.hidden-tile)');
                    for (let t of tiles) {
                        if (t.innerText === correctChar) {
                            placeLetter(t.innerText, t.dataset.id, t);
                            break;
                        }
                    }
                }
            } else {
                alert("Koin tidak cukup untuk membeli Hint!");
            }
        }

        function nextQuestion() {
            currentIdx++;
            saveProgress(); // Simpan progress (soal terbaru, koin, level) saat klik Lanjut
            loadQuestion();
        }

        // Eksekusi saat pertama kali halaman dimuat
        loadProgress();
        loadQuestion();
    </script>
</body>
</html>