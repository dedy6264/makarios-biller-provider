<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-background": "#181c20",
                        "on-surface": "#181c20",
                        "on-error-container": "#93000a",
                        "on-tertiary-fixed": "#3c0800",
                        "tertiary-fixed": "#ffdbd2",
                        "primary-fixed": "#dde1ff",
                        "surface-tint": "#004ced",
                        "tertiary-container": "#bf3003",
                        "error-container": "#ffdad6",
                        "on-tertiary-container": "#ffddd5",
                        "surface-container-highest": "#e0e2e7",
                        "tertiary": "#952200",
                        "background": "#f7f9fe",
                        "surface-container": "#eceef3",
                        "primary-container": "#0052ff",
                        "surface-container-low": "#f1f4f9",
                        "on-secondary": "#ffffff",
                        "primary-fixed-dim": "#b7c4ff",
                        "on-surface-variant": "#434656",
                        "outline": "#737688",
                        "on-primary-fixed-variant": "#0038b6",
                        "inverse-on-surface": "#eff1f6",
                        "secondary-container": "#95aafe",
                        "on-primary-container": "#dfe3ff",
                        "on-primary-fixed": "#001452",
                        "on-secondary-fixed": "#001452",
                        "inverse-primary": "#b7c4ff",
                        "secondary": "#4459a8",
                        "on-secondary-fixed-variant": "#2b418f",
                        "on-tertiary-fixed-variant": "#891e00",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-high": "#e6e8ed",
                        "surface-variant": "#e0e2e7",
                        "on-error": "#ffffff",
                        "secondary-fixed-dim": "#b7c4ff",
                        "on-primary": "#ffffff",
                        "inverse-surface": "#2d3135",
                        "surface-bright": "#f7f9fe",
                        "surface": "#f7f9fe",
                        "surface-dim": "#d8dadf",
                        "primary": "#003ec7",
                        "secondary-fixed": "#dde1ff",
                        "error": "#ba1a1a",
                        "on-secondary-container": "#253b89",
                        "outline-variant": "#c3c5d9",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed-dim": "#ffb4a1"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        .glass-header {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(24px);
        }
    </style>
    <script src="{{ url('assets/css/web-apps/web-apps.css') }}" type="text/css"></script>

</head>

<body class="min-h-screen pb-24 bg-background font-body text-on-surface">
    <!-- TopAppBar -->
    <header class="fixed top-0 w-full z-50 glass-header shadow-[0px_12px_32px_rgba(0,62,199,0.06)]">
        <div class="flex items-center justify-between px-6 py-4 mx-auto max-w-7xl">
            <div class="flex items-center gap-3">
                <span class="text-blue-600 material-symbols-outlined dark:text-blue-400">menu</span>
                <h1
                    class="text-2xl font-black text-transparent font-manrope bg-gradient-to-br from-blue-700 to-blue-500 bg-clip-text">
                    Viller</h1>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 overflow-hidden border-2 rounded-full border-primary-fixed">
                    <img alt="User profile photo" class="object-cover w-full h-full"
                        data-alt="Professional studio portrait of a confident executive smiling softly, warm rim lighting, high-end corporate aesthetic"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAXl95I-msYmnpKza-jwiKyHTGzpSmBAiQw0NEufGT_w8Sfl9nwNqcwB3ApWCrMsCBE_bIslnadhDWXFBNSRovQfJT7Q58tUWVPOJhChDUt8k2kjbmoyOKcXk_FLIx6ipAohfAc78LgNmIVncxXm6uj-J2b0WIrMOMfL0lv8Up1DUYQJGlkoTbuD6ILtyTc3Uu0Peumq0wP_3RtwLbysUbC1ia94wpYnMkr9Q9RQZAHj_MM0PLRfyQoENUBFYSAzGbDfsgZFcKvdPI4" />
                </div>
            </div>
        </div>
    </header>
    <main class="max-w-lg px-6 pt-24 mx-auto">
        <!-- Section Header -->
        <div class="mb-8">
            <h2 class="mb-2 text-3xl font-extrabold tracking-tight font-headline text-on-surface">Transaction History
            </h2>
            <p class="text-sm font-medium text-on-surface-variant">Monitor and manage your liquid assets flow</p>
        </div>
        <!-- Filters Section - Asymmetric Bento Feel -->
        <div class="grid grid-cols-2 gap-3 mb-10">
            <div
                class="bg-surface-container-lowest p-4 rounded-3xl shadow-[0px_8px_20px_rgba(0,62,199,0.03)] border border-outline-variant/15">
                <span class="text-[10px] uppercase tracking-widest font-bold text-primary mb-2 block">Date Range</span>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-semibold">7 days</span>
                    <span class="text-lg material-symbols-outlined text-primary">expand_more</span>
                </div>
            </div>
            <div
                class="bg-surface-container-lowest p-4 rounded-3xl shadow-[0px_8px_20px_rgba(0,62,199,0.03)] border border-outline-variant/15">
                <span class="text-[10px] uppercase tracking-widest font-bold text-primary mb-2 block">Product
                    Type</span>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-semibold">All Assets</span>
                    <span class="text-lg material-symbols-outlined text-primary">filter_list</span>
                </div>
            </div>
        </div>
        <!-- Transaction List -->
        <div class="space-y-6">
            <!-- Day Divider -->
            <div class="flex items-center gap-4">
                <span class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-outline">Today</span>
                <div class="h-[1px] flex-grow bg-outline-variant/20"></div>
            </div>
            <!-- Transaction Item: Success -->
            <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-primary-fixed/30 text-primary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">Apple Store Purchase</span>
                        <span class="font-extrabold font-headline text-on-surface">-$199.00</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-82910</span>
                        <span
                            class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Success</span>
                    </div>
                </div>
            </div>
            <!-- Transaction Item: Pending -->
            <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div
                    class="flex items-center justify-center w-12 h-12 rounded-2xl bg-secondary-container/20 text-secondary">
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">External Transfer</span>
                        <span class="font-extrabold font-headline text-on-surface">+$2,450.00</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-99102</span>
                        <span
                            class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-[10px] font-bold uppercase tracking-wider">Pending</span>
                    </div>
                </div>
            </div>
            <!-- Day Divider -->
            <div class="flex items-center gap-4 pt-4">
                <span class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-outline">Yesterday</span>
                <div class="h-[1px] flex-grow bg-outline-variant/20"></div>
            </div>
            <!-- Transaction Item: Failed -->
            <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-error-container/30 text-error">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">error_med</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">Subscription: Cloud</span>
                        <span class="font-extrabold font-headline text-on-surface">-$15.99</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-77211</span>
                        <span
                            class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-[10px] font-bold uppercase tracking-wider">Failed</span>
                    </div>
                </div>
            </div>
            <!-- Transaction Item: Success -->
            <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-primary-fixed/30 text-primary">
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 1;">shopping_bag</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">Starbucks Reserve</span>
                        <span class="font-extrabold font-headline text-on-surface">-$8.50</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-33451</span>
                        <span
                            class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Success</span>
                    </div>
                </div>
            </div>
            <!-- Transaction Item: Success -->
            <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-tertiary-fixed/40 text-tertiary">
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 1;">currency_bitcoin</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">Crypto Exchange Buy</span>
                        <span class="font-extrabold font-headline text-on-surface">-$500.00</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-11029</span>
                        <span
                            class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Success</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- BottomNavBar -->
    <nav
        class="fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-6 pt-3 glass-header rounded-t-3xl shadow-[0px_-8px_24px_rgba(0,62,199,0.04)] z-50">
        <a class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 text-slate-400 dark:text-slate-500 hover:text-blue-500 active:scale-90"
            href="#">
            <span class="mb-1 material-symbols-outlined">home</span>
            <span class="font-inter text-[11px] font-semibold uppercase tracking-wider">Home</span>
        </a>
        <a class="flex flex-col items-center justify-center px-5 py-2 text-blue-700 transition-transform duration-200 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 rounded-2xl active:scale-90"
            href="#">
            <span class="mb-1 material-symbols-outlined">history_edu</span>
            <span class="font-inter text-[11px] font-semibold uppercase tracking-wider">Transaction</span>
        </a>
        <a class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 text-slate-400 dark:text-slate-500 hover:text-blue-500 active:scale-90"
            href="#">
            <span class="mb-1 material-symbols-outlined">grid_view</span>
            <span class="font-inter text-[11px] font-semibold uppercase tracking-wider">Product</span>
        </a>
        <a class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 text-slate-400 dark:text-slate-500 hover:text-blue-500 active:scale-90"
            href="#">
            <span class="mb-1 material-symbols-outlined">person</span>
            <span class="font-inter text-[11px] font-semibold uppercase tracking-wider">Profile</span>
        </a>
    </nav>
</body>

</html>