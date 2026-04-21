<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
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
                    "surface-variant": "#e0e2e7",
                    "on-tertiary-fixed-variant": "#891e00",
                    "on-tertiary-fixed": "#3c0800",
                    "primary-container": "#0052ff",
                    "surface-container-low": "#f1f4f9",
                    "surface-dim": "#d8dadf",
                    "secondary-container": "#95aafe",
                    "tertiary": "#952200",
                    "surface-tint": "#004ced",
                    "surface-container-highest": "#e0e2e7",
                    "error-container": "#ffdad6",
                    "primary-fixed-dim": "#b7c4ff",
                    "on-tertiary-container": "#ffddd5",
                    "surface-container-lowest": "#ffffff",
                    "error": "#ba1a1a",
                    "on-surface-variant": "#434656",
                    "on-primary": "#ffffff",
                    "on-primary-fixed": "#001452",
                    "inverse-surface": "#2d3135",
                    "on-tertiary": "#ffffff",
                    "inverse-primary": "#b7c4ff",
                    "on-surface": "#181c20",
                    "surface": "#f7f9fe",
                    "outline-variant": "#c3c5d9",
                    "outline": "#737688",
                    "on-primary-fixed-variant": "#0038b6",
                    "inverse-on-surface": "#eff1f6",
                    "tertiary-container": "#bf3003",
                    "surface-container": "#eceef3",
                    "secondary-fixed": "#dde1ff",
                    "on-secondary-fixed": "#001452",
                    "background": "#f7f9fe",
                    "tertiary-fixed": "#ffdbd2",
                    "primary-fixed": "#dde1ff",
                    "surface-container-high": "#e6e8ed",
                    "surface-bright": "#f7f9fe",
                    "secondary": "#4459a8",
                    "tertiary-fixed-dim": "#ffb4a1",
                    "on-error": "#ffffff",
                    "secondary-fixed-dim": "#b7c4ff",
                    "on-secondary": "#ffffff",
                    "on-secondary-fixed-variant": "#2b418f",
                    "on-background": "#181c20",
                    "on-secondary-container": "#253b89",
                    "on-error-container": "#93000a",
                    "primary": "#003ec7",
                    "on-primary-container": "#dfe3ff"
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Manrope', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="min-h-screen pb-32 bg-background text-on-surface">
    <!-- TopAppBar -->
    <header
        class="sticky top-0 z-50 bg-[#f7f9fe]/70 backdrop-blur-xl flex justify-between items-center w-full px-6 h-16 shadow-none">
        <div class="flex items-center gap-3">
            <div
                class="flex items-center justify-center w-10 h-10 overflow-hidden rounded-full bg-surface-container-high">
                <img alt="User" class="object-cover w-full h-full"
                    data-alt="close up professional portrait of a smiling business person with soft studio lighting and neutral background"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgcXm4C4Jj-UymB8uIGQnduqk1f7A336pvV_NB-2lFuJsMa6EoVGht-7FYFbM76cytz2Hw7AmQbr1h5Qu9ahCYof6zWy6f04j9PGmOR0vwAgcQfaVpjkb8QSF0ZH7CULE2WmMbWgk0sovBmay9iLbuRnX9_tyxCiJSMikpGMbYlWkJvsCe9WLuym_gcBfYCyuN8orG-D1ntPFy1oQaI-m6yjFSB0JjK9ESa-v39ijOb_PgSZ0zdCUZ0FRFFlNpxGoHFKxhlcwbDFhL" />
            </div>
            <span class="text-2xl font-extrabold tracking-tighter text-[#0052FF]">Viller</span>
        </div>
        <button class="transition-opacity text-slate-500 hover:opacity-80">
            <span class="text-2xl material-symbols-outlined">notifications</span>
        </button>
    </header>
    <main class="max-w-lg px-6 pt-6 mx-auto">
        <!-- Section Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-on-surface">My Savings</h1>
            <p class="mt-1 text-sm text-on-surface-variant">Growth overview &amp; asset allocation</p>
        </div>
        <!-- Total Balance Card -->
        <section class="mb-10">
            <div
                class="relative overflow-hidden rounded-[32px] bg-gradient-to-br from-primary to-primary-container p-8 text-on-primary shadow-[0px_24px_48px_rgba(0,62,199,0.12)]">
                <div class="relative z-10">
                    <p class="font-label text-xs uppercase tracking-[0.15em] opacity-80 mb-2">Total Balance</p>
                    <h2 class="mb-6 text-4xl font-extrabold tracking-tighter">$84,250.40</h2>
                    <div class="flex gap-4">
                        <div class="flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-2xl">
                            <span class="text-sm material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">trending_up</span>
                            <span class="text-xs font-bold">+12.4%</span>
                        </div>
                        <div class="flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-2xl">
                            <span class="text-sm material-symbols-outlined">auto_awesome</span>
                            <span class="text-xs font-bold">Premium Tier</span>
                        </div>
                    </div>
                </div>
                <!-- Abstract Glass Shapes -->
                <div class="absolute w-40 h-40 rounded-full -right-10 -top-10 bg-white/10 blur-3xl"></div>
                <div class="absolute w-32 h-32 rounded-full -left-10 -bottom-10 bg-primary-fixed/20 blur-2xl"></div>
            </div>
        </section>
        <div class="flex gap-4 mb-10">
            <button
                class="flex items-center justify-center flex-1 gap-2 py-4 font-bold text-white transition-transform shadow-lg bg-primary rounded-2xl active:scale-95 shadow-primary/20">
                <span class="text-xl material-symbols-outlined">add_circle</span>
                <span>Deposit</span>
            </button>
            <button
                class="flex items-center justify-center flex-1 gap-2 py-4 font-bold transition-transform bg-surface-container text-on-surface rounded-2xl active:scale-95">
                <span class="text-xl material-symbols-outlined">file_upload</span>
                <span>Withdraw</span>
            </button>
        </div>
        <!-- Savings Growth (Micro-Chart Bento Style) -->
        <section class="mb-10">
            <div class="flex items-end justify-between mb-4">
                <h3 class="text-xl font-bold tracking-tight">Savings Growth</h3>
                <span class="text-xs font-bold tracking-wider uppercase text-primary">Last 6 Months</span>
            </div>
            <div class="bg-surface-container-lowest rounded-[32px] p-6 shadow-[0px_12px_32px_rgba(0,62,199,0.04)]">
                <div class="flex items-end justify-between h-32 gap-1 mb-4">
                    <div
                        class="w-full bg-surface-container-low rounded-t-lg h-[40%] hover:bg-primary-container transition-all duration-300">
                    </div>
                    <div
                        class="w-full bg-surface-container-low rounded-t-lg h-[55%] hover:bg-primary-container transition-all duration-300">
                    </div>
                    <div
                        class="w-full bg-surface-container-low rounded-t-lg h-[48%] hover:bg-primary-container transition-all duration-300">
                    </div>
                    <div class="w-full bg-primary-container rounded-t-lg h-[75%]"></div>
                    <div
                        class="w-full bg-surface-container-low rounded-t-lg h-[62%] hover:bg-primary-container transition-all duration-300">
                    </div>
                    <div
                        class="w-full bg-surface-container-low rounded-t-lg h-[90%] hover:bg-primary-container transition-all duration-300">
                    </div>
                </div>
                <div class="flex justify-between text-[10px] font-bold text-outline uppercase tracking-widest px-1">
                    <span>Jan</span>
                    <span>Feb</span>
                    <span>Mar</span>
                    <span>Apr</span>
                    <span>May</span>
                    <span>Jun</span>
                </div>
            </div>
        </section>
        <!-- Recent Transactions -->
        <section class="mb-10">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold tracking-tight">Recent Activity</h3>
                <button class="text-xs font-bold tracking-wider uppercase text-primary">View All</button>
            </div>
            <div class="space-y-6">
                <!-- Transaction Item -->
                <div class="flex items-center justify-between cursor-pointer group">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex items-center justify-center w-12 h-12 transition-colors rounded-2xl bg-primary/5 text-primary group-hover:bg-primary/10">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">account_balance</span>
                        </div>
                        <div>
                            <p class="font-bold text-on-surface">Monthly Deposit</p>
                            <p class="text-xs text-on-surface-variant">Today • 10:45 AM</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-primary">+$2,500.00</p>
                        <p class="text-[10px] font-bold text-outline uppercase tracking-widest">Completed</p>
                    </div>
                </div>
                <!-- Transaction Item -->
                <div class="flex items-center justify-between cursor-pointer group">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex items-center justify-center w-12 h-12 transition-colors rounded-2xl bg-tertiary/5 text-tertiary group-hover:bg-tertiary/10">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">savings</span>
                        </div>
                        <div>
                            <p class="font-bold text-on-surface">Interest Earned</p>
                            <p class="text-xs text-on-surface-variant">Jun 14 • 12:00 AM</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-primary">+$124.50</p>
                        <p class="text-[10px] font-bold text-outline uppercase tracking-widest">Applied</p>
                    </div>
                </div>
                <!-- Transaction Item -->
                <div class="flex items-center justify-between cursor-pointer group">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex items-center justify-center w-12 h-12 rounded-2xl bg-surface-container-high text-on-surface-variant">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <div>
                            <p class="font-bold text-on-surface">Round-up Savings</p>
                            <p class="text-xs text-on-surface-variant">Jun 12 • 08:22 PM</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-primary">+$12.40</p>
                        <p class="text-[10px] font-bold text-outline uppercase tracking-widest">Completed</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Insights Banner -->
        <section class="mb-12">
            <div
                class="bg-surface-container-low rounded-[32px] p-6 border border-outline-variant/15 flex items-center gap-4">
                <div class="w-10 h-10 shrink-0 rounded-full bg-[#0052FF] flex items-center justify-center text-white">
                    <span class="text-sm material-symbols-outlined">lightbulb</span>
                </div>
                <div>
                    <p class="text-sm font-bold text-on-surface">Smart Tip</p>
                    <p class="text-xs leading-relaxed text-on-surface-variant">You're $450 away from reaching your
                        summer travel goal. Keep it up!</p>
                </div>
            </div>
        </section>
    </main>
    <!-- BottomNavBar -->
    <nav
        class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 pb-8 pt-4 bg-white/80 dark:bg-slate-950/80 backdrop-blur-2xl rounded-t-[32px] shadow-[0px_-8px_24px_rgba(0,62,199,0.04)]">
        <a class="flex flex-col items-center justify-center transition-all duration-300 text-slate-400 hover:text-slate-600 active:scale-90"
            href="#">
            <span class="mb-1 material-symbols-outlined">home_app_logo</span>
            <span class="font-['Inter'] text-[11px] font-semibold uppercase tracking-widest">Home</span>
        </a>
        <a class="flex flex-col items-center justify-center text-[#0052FF] bg-[#0052FF]/10 rounded-2xl px-5 py-2 active:scale-90 duration-300"
            href="#">
            <span class="mb-1 material-symbols-outlined"
                style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
            <span class="font-['Inter'] text-[11px] font-semibold uppercase tracking-widest">Savings</span>
        </a>
        <a class="flex flex-col items-center justify-center transition-all duration-300 text-slate-400 hover:text-slate-600 active:scale-90"
            href="#">
            <span class="mb-1 material-symbols-outlined">credit_card</span>
            <span class="font-['Inter'] text-[11px] font-semibold uppercase tracking-widest">Cards</span>
        </a>
        <a class="flex flex-col items-center justify-center transition-all duration-300 text-slate-400 hover:text-slate-600 active:scale-90"
            href="#">
            <span class="mb-1 material-symbols-outlined">person</span>
            <span class="font-['Inter'] text-[11px] font-semibold uppercase tracking-widest">Profile</span>
        </a>
    </nav>
</body>

</html>