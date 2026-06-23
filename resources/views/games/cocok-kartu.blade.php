<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->name }} - GEMMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .card-face { min-height: 118px; }
        .matched-card { opacity: 0.75; pointer-events: none; }
    </style>
</head>
<body class="bg-[#0f172a] text-slate-200 min-h-screen p-4">

    <div class="max-w-5xl mx-auto">
        <div class="flex items-center justify-between gap-4 py-5">
            <a href="/" class="text-slate-400 hover:text-white transition bg-[#1e293b] px-4 py-2 rounded-xl border border-slate-700 shadow-lg font-bold">
                Kembali
            </a>

            <div class="flex items-center gap-3">
                <div class="bg-amber-500/10 border border-amber-500/30 text-amber-400 px-4 py-2 rounded-full font-bold">
                    Koin <span id="coinDisplay">0</span>
                </div>
                <div class="bg-violet-500/10 border border-violet-500/30 text-violet-400 px-4 py-2 rounded-full font-bold">
                    Level <span id="levelDisplay">1</span>
                </div>
            </div>
        </div>

        <header class="text-center py-6">
            <p class="text-violet-400 font-black uppercase tracking-widest text-xs mb-3">Game Memori</p>
            <h1 class="text-4xl md:text-5xl font-black text-white mb-3">{{ $game->name }}</h1>
            <p class="text-slate-400 max-w-2xl mx-auto">
                Buka dua kartu dan temukan kartu lain dengan tulisan yang sama.
            </p>
        </header>

        <section class="bg-[#1e293b] border border-slate-700 rounded-3xl p-4 md:p-6 shadow-2xl">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
                <div class="flex flex-wrap gap-2 text-sm font-bold text-slate-300">
                    <span class="bg-slate-800 px-4 py-2 rounded-xl border border-slate-700">Ronde: <span id="roundDisplay">1</span></span>
                    <span class="bg-slate-800 px-4 py-2 rounded-xl border border-slate-700">Tema: <span id="themeDisplay">-</span></span>
                    <span class="bg-slate-800 px-4 py-2 rounded-xl border border-slate-700">Cocok: <span id="matchDisplay">0</span></span>
                    <span class="bg-slate-800 px-4 py-2 rounded-xl border border-slate-700">Percobaan: <span id="moveDisplay">0</span></span>
                </div>

                <button onclick="resetGame()" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-xl border border-slate-600 font-bold transition">
                    Ulangi
                </button>
            </div>

            @if($questions->count() < 2)
                <div class="text-center py-16 text-slate-400">
                    Minimal tambahkan 2 pasangan kartu lewat dashboard admin supaya papan game bisa dimainkan.
                </div>
            @else
                <div id="cardGrid" class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4"></div>
                <div id="statusMessage" class="h-6 mt-5 text-center font-black text-violet-300 uppercase tracking-widest"></div>
            @endif
        </section>
    </div>

    <script>
        const questions = @json($questions->values());
        const gameSlug = "{{ $game->slug }}";
        const storageKey = `gamelab_save_${gameSlug}`;
        const rounds = buildRounds(questions);

        let cards = [];
        let openedCards = [];
        let matchedPairs = [];
        let coins = 0;
        let level = 1;
        let moves = 0;
        let roundIndex = 0;
        let locked = false;

        function shuffle(items) {
            const result = [...items];
            for (let i = result.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [result[i], result[j]] = [result[j], result[i]];
            }
            return result;
        }

        function getQuestionTheme(question) {
            const fallbackTheme = 'Tanpa Tema';
            let options = question.options_data || {};

            if (typeof options === 'string') {
                try {
                    options = JSON.parse(options);
                } catch (error) {
                    return fallbackTheme;
                }
            }

            return options.theme || fallbackTheme;
        }

        function buildRounds(questionItems) {
            const grouped = {};

            questionItems.forEach(question => {
                const theme = getQuestionTheme(question);
                if (!grouped[theme]) {
                    grouped[theme] = [];
                }
                grouped[theme].push(question);
            });

            return Object.entries(grouped).map(([theme, items]) => ({
                theme,
                questions: items,
            }));
        }

        function buildCards() {
            const pairs = [];
            const currentRound = rounds[roundIndex];
            const roundQuestions = currentRound ? currentRound.questions : [];

            roundQuestions.forEach((question, index) => {
                const pairId = String(question.id || `${roundIndex}-${index}`);

                pairs.push({
                    pairId,
                    type: 'kartu-a',
                    text: question.question_text,
                });

                pairs.push({
                    pairId,
                    type: 'kartu-b',
                    text: question.answer_key,
                });
            });

            cards = shuffle(pairs);
        }

        function loadProgress() {
            const savedData = localStorage.getItem(storageKey);
            if (!savedData) return;

            const parsed = JSON.parse(savedData);
            coins = parsed.coins || 0;
            level = parsed.level || 1;
            moves = parsed.moves || 0;
            roundIndex = parsed.roundIndex || 0;
            matchedPairs = parsed.matchedPairs || [];
        }

        function saveProgress() {
            localStorage.setItem(storageKey, JSON.stringify({
                coins,
                level,
                moves,
                roundIndex,
                matchedPairs,
            }));
        }

        function getRoundPairCount() {
            return rounds[roundIndex] ? rounds[roundIndex].questions.length : 0;
        }

        function updateStats() {
            document.getElementById('coinDisplay').innerText = coins;
            document.getElementById('levelDisplay').innerText = level;
            document.getElementById('moveDisplay').innerText = moves;
            document.getElementById('matchDisplay').innerText = matchedPairs.length;
            document.getElementById('roundDisplay').innerText = roundIndex + 1;
            document.getElementById('themeDisplay').innerText = rounds[roundIndex] ? rounds[roundIndex].theme : '-';
        }

        function renderCards() {
            const grid = document.getElementById('cardGrid');
            if (!grid) return;

            grid.innerHTML = '';
            document.getElementById('statusMessage').innerText = '';

            cards.forEach((card, index) => {
                const isMatched = matchedPairs.includes(card.pairId);
                const button = document.createElement('button');
                button.className = `card-face bg-slate-800 border-2 ${isMatched ? 'border-emerald-500 matched-card' : 'border-slate-600 hover:border-violet-400'} rounded-2xl p-4 text-center font-black transition shadow-lg flex items-center justify-center`;
                button.dataset.index = index;
                button.dataset.pairId = card.pairId;
                button.dataset.type = card.type;
                button.onclick = () => openCard(index, button);

                const label = isMatched ? card.text : '?';
                button.innerHTML = `<span class="${isMatched ? 'text-emerald-300 text-sm md:text-base' : 'text-violet-300 text-3xl'}">${label}</span>`;
                grid.appendChild(button);
            });

            updateStats();
        }

        function openCard(index, element) {
            if (locked || matchedPairs.includes(cards[index].pairId)) return;
            if (openedCards.some(opened => opened.index === index)) return;
            if (openedCards.length >= 2) return;

            const card = cards[index];
            element.innerHTML = `<span class="text-white text-sm md:text-base leading-snug">${card.text}</span>`;
            element.classList.remove('border-slate-600');
            element.classList.add('border-violet-400', 'bg-violet-500/20');
            openedCards.push({ index, element, card });

            if (openedCards.length === 2) {
                checkPair();
            }
        }

        function checkPair() {
            locked = true;
            moves++;

            const [first, second] = openedCards;
            const isPair = first.card.pairId === second.card.pairId && first.card.type !== second.card.type;

            if (isPair) {
                matchedPairs.push(first.card.pairId);
                coins += 20;
                openedCards = [];
                locked = false;
                saveProgress();
                renderCards();
                checkFinished();
                return;
            }

            setTimeout(() => {
                openedCards.forEach(opened => {
                    opened.element.innerHTML = '<span class="text-violet-300 text-3xl">?</span>';
                    opened.element.classList.remove('border-violet-400', 'bg-violet-500/20');
                    opened.element.classList.add('border-slate-600');
                });
                openedCards = [];
                locked = false;
                saveProgress();
                updateStats();
            }, 850);
        }

        function checkFinished() {
            if (matchedPairs.length !== getRoundPairCount()) return;

            setTimeout(() => {
                const hasNextRound = roundIndex + 1 < rounds.length;
                if (hasNextRound) {
                    level++;
                    saveProgress();
                    updateStats();
                    document.getElementById('statusMessage').innerText = 'Berhasil! Menyiapkan kartu berikutnya...';
                    setTimeout(() => {
                        nextRound();
                    }, 1200);
                    return;
                }

                alert('Selamat! Semua kartu berhasil dicocokkan.');
                localStorage.removeItem(storageKey);
                location.href = '/';
            }, 300);
        }

        function nextRound() {
            roundIndex++;
            matchedPairs = [];
            openedCards = [];
            locked = false;
            saveProgress();
            buildCards();
            renderCards();
        }

        function resetGame() {
            localStorage.removeItem(storageKey);
            openedCards = [];
            matchedPairs = [];
            coins = 0;
            level = 1;
            moves = 0;
            roundIndex = 0;
            locked = false;
            buildCards();
            renderCards();
        }

        loadProgress();
        buildCards();
        renderCards();
    </script>
</body>
</html>
