<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - GEMMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-sm">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-black text-slate-800">ADMIN ACCESS</h1>
            <p class="text-slate-500 text-sm italic">Hanya untuk pengelola soal Kelompok 2</p>
        </div>

        @if(session('error'))
            <div class="bg-rose-100 text-rose-600 p-3 rounded-lg text-sm mb-4 font-bold text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Username</label>
                <input type="text" name="username" class="w-full border-2 border-slate-100 rounded-xl px-4 py-3 focus:border-blue-500 outline-none transition" required>
            </div>
            <div class="mb-6">
                <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Password</label>
                <input type="password" name="password" class="w-full border-2 border-slate-100 rounded-xl px-4 py-3 focus:border-blue-500 outline-none transition" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-black py-4 rounded-xl shadow-lg hover:bg-blue-700 transition-all">
                LOGIN SEKARANG
            </button>
        </form>

        <a href="/" class="block text-center mt-6 text-slate-400 text-sm hover:text-slate-600 transition">← Kembali ke Portal</a>
    </div>

</body>
</html>