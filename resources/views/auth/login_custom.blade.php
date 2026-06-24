<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ConfigCenter - Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid #E2E8F0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .bg-pattern {
            background-color: #f8f9ff;
            background-image: radial-gradient(#dce9ff 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-6 antialiased bg-pattern">
    <div class="glass-panel w-full max-w-[420px] rounded-[24px] p-6 relative overflow-hidden">
        <div class="relative z-10">
            <div class="mb-8 text-center">
                <div class="flex items-center justify-center mb-2 space-x-2">
                    <span class="material-symbols-outlined text-[32px] text-primary">settings_b_roll</span>
                    <h1 class="font-bold">ConfigCenter</h1>
                </div>
                <p class="text-sm text-gray-500 uppercase">System Admin</p>
            </div>
            <div class="mb-8 text-center">
                <h2 class="text-xl font-semibold">Selamat Datang Kembali</h2>
                <p class="text-sm text-gray-600">Silakan masuk ke akun Anda</p>
            </div>

            @if (session('status'))
            <div class="mb-4 text-sm text-green-600">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm text-gray-600">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="block w-full p-3 mt-1 bg-gray-100 border-gray-200 rounded-md" />
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm text-gray-600">Password</label>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600">Lupa Kata Sandi?</a>
                        @endif
                    </div>
                    <div class="relative mt-1">
                        <input id="password" name="password" type="password" required
                            class="block w-full p-3 pr-10 bg-gray-100 border-gray-200 rounded-md" />
                        <button type="button" onclick="togglePassword(); return false;"
                            class="absolute text-gray-500 -translate-y-1/2 right-2 top-1/2"> <span id="visibilityIcon"
                                class="material-symbols-outlined">visibility_off</span></button>
                    </div>
                </div>
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="w-4 h-4" {{ old('remember') ? 'checked'
                        : '' }} />
                    <label for="remember" class="ml-2 text-sm text-gray-600">Ingat Saya</label>
                </div>
                <div>
                    <button type="submit" class="w-full py-3 text-white bg-blue-600 rounded-md">Masuk</button>
                </div>
            </form>

            <div class="pt-6 mt-8 text-center border-t border-gray-200">
                <p class="text-sm text-gray-500">© 2024 ConfigCenter Admin Portal.</p>
            </div>
        </div>
    </div>
    <script>
        function togglePassword(){ const p=document.getElementById('password'); const i=document.getElementById('visibilityIcon'); if(p.type==='password'){p.type='text'; i.textContent='visibility';}else{p.type='password'; i.textContent='visibility_off';}}
    </script>
</body>

</html>