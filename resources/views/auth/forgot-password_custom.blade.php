<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ConfigCenter - Lupa Kata Sandi</title>
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

<body
    class="flex items-center justify-center min-h-screen p-6 antialiased bg-pattern font-body-sm text-body-sm text-on-surface">
    <div class="glass-panel w-full max-w-[420px] rounded-[24px] p-6 relative overflow-hidden">
        <div class="relative z-10">
            <!-- Brand / Header -->
            <div class="mb-8 text-center">
                <div class="flex items-center justify-center mb-2 space-x-2">
                    <span class="material-symbols-outlined text-[32px] text-primary"
                        style="font-variation-settings: 'FILL' 1;">settings_b_roll</span>
                    <h1 class="font-bold tracking-tight">ConfigCenter</h1>
                </div>
                <p class="text-sm tracking-widest uppercase text-secondary">System Admin</p>
            </div>

            <div class="mb-6 text-center">
                <h2 class="mb-2 font-semibold text-headline-lg-mobile">Lupa Kata Sandi</h2>
                <p class="text-sm text-on-surface-variant">Masukkan email Anda, kami akan mengirimkan link untuk mereset
                    password.</p>
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

            <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-on-surface-variant">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="block w-full pl-3 pr-3 py-3 border border-outline-variant rounded-lg bg-[#F1F5F9] focus:bg-white sm:text-sm transition-colors duration-200" />
                </div>

                <div>
                    <button type="submit" class="w-full py-3 text-white bg-blue-600 rounded-md">Kirim
                        Link Reset</button>
                </div>
            </form>

            <div class="pt-6 mt-8 text-center border-t border-outline-variant/30">
                <a href="{{ route('login') }}" class="text-sm text-blue-600">Kembali ke Login</a>
            </div>
        </div>
    </div>
</body>

</html>