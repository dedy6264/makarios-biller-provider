<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
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
                    "surface-container-highest": "#e0e2e7",
                    "on-error": "#ffffff",
                    "error": "#ba1a1a",
                    "on-secondary-fixed": "#001452",
                    "surface-container": "#eceef3",
                    "surface-bright": "#f7f9fe",
                    "on-primary-fixed-variant": "#0038b6",
                    "tertiary": "#952200",
                    "error-container": "#ffdad6",
                    "on-secondary": "#ffffff",
                    "primary": "#003ec7",
                    "inverse-primary": "#b7c4ff",
                    "secondary-fixed": "#dde1ff",
                    "on-surface-variant": "#434656",
                    "on-surface": "#181c20",
                    "on-secondary-container": "#253b89",
                    "secondary": "#4459a8",
                    "on-tertiary-container": "#ffddd5",
                    "surface-container-lowest": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "on-primary": "#ffffff",
                    "on-primary-container": "#dfe3ff",
                    "surface-container-low": "#f1f4f9",
                    "primary-container": "#0052ff",
                    "surface-dim": "#d8dadf",
                    "secondary-fixed-dim": "#b7c4ff",
                    "surface-container-high": "#e6e8ed",
                    "surface": "#f7f9fe",
                    "tertiary-fixed-dim": "#ffb4a1",
                    "secondary-container": "#95aafe",
                    "tertiary-fixed": "#ffdbd2",
                    "tertiary-container": "#bf3003",
                    "primary-fixed": "#dde1ff",
                    "background": "#f7f9fe",
                    "on-secondary-fixed-variant": "#2b418f",
                    "primary-fixed-dim": "#b7c4ff",
                    "outline": "#737688",
                    "on-background": "#181c20",
                    "on-primary-fixed": "#001452",
                    "on-error-container": "#93000a",
                    "inverse-on-surface": "#eff1f6",
                    "outline-variant": "#c3c5d9",
                    "on-tertiary-fixed-variant": "#891e00",
                    "on-tertiary-fixed": "#3c0800",
                    "surface-variant": "#e0e2e7",
                    "surface-tint": "#004ced",
                    "inverse-surface": "#2d3135"
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

        .no-scrollbar::-webkit-scrollbar {
            display: none;
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
    <header class="bg-white/70 backdrop-blur-xl fixed top-0 w-full z-50 shadow-[0px_12_px_32px_rgba(0,62,199,0.06)]">
        <div class="flex items-center justify-between w-full h-16 px-6 mx-auto max-w-7xl">
            <div class="flex items-center gap-4">
                <button class="text-blue-600 duration-200 active:scale-95">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <h1 class="text-lg font-bold tracking-tight font-manrope">Profile Details</h1>
            </div>
            <div class="flex items-center gap-2">
                <button class="p-2 transition-colors rounded-full hover:bg-blue-50 active:scale-95">
                    <span class="text-blue-600 material-symbols-outlined">edit</span>
                </button>
            </div>
        </div>
    </header>
    <main class="max-w-md px-6 pt-24 mx-auto space-y-8">
        <!-- Hero Section: Identity -->
        <section class="flex flex-col items-center space-y-4 text-center">
            <div class="relative">
                <div class="overflow-hidden border-4 border-white rounded-full shadow-xl w-28 h-28">
                    <img class="object-cover w-full h-full"
                        data-alt="close-up portrait of a professional man in a navy blue suit with soft studio lighting and a clean neutral background"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCT4zLtICYNiQGWeUOEyrgqafvnopXWIHoUIpUekr3bRrFXmePUa5Jaks9a_CpxTKeLjfC1gSCOKtUfGNysCSVvtCl2viOb4etvN9-n5Dq0khPTVWiu69JkGOXI1P8MV-_TcuX_14u-3Neyo2_zcml4QqP94ErijvJoZTg21Boi4LTI_RBCNc0ebJ3wx7VH5m4S2lSAvPYxEUuQ1J0x37AbeZjhoBv9vtvsJET9YM6VUqJc4ayXtZ6Yv6SjwNfgIDsirUvTQ593WDY9" />
                </div>
                <div
                    class="absolute flex items-center justify-center p-1 text-white border-2 border-white rounded-full bottom-1 right-1 bg-primary">
                    <span class="text-sm material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 1;">verified</span>
                </div>
            </div>
            <div class="space-y-1">
                <h2 class="text-2xl font-extrabold tracking-tight text-on-surface">Alexander Viller</h2>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-primary/5 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                    <span class="text-xs font-semibold tracking-widest uppercase text-primary font-label">Verified
                        Account</span>
                </div>
            </div>
        </section>
        <!-- Profile Details Cards (Editorial Asymmetric Layout) -->
        <section class="grid grid-cols-1 gap-6">
            <!-- Personal Info Group -->
            <div
                class="bg-surface-container-lowest rounded-3xl p-6 shadow-[0px_12px_32px_rgba(0,62,199,0.04)] space-y-6">
                <h3 class="text-sm font-bold tracking-widest uppercase text-primary">Personal Information</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between group">
                        <div class="space-y-1">
                            <p class="text-xs tracking-wider uppercase text-on-surface-variant font-label">Full Name</p>
                            <p class="text-base font-semibold text-on-surface">Alexander J. Viller</p>
                        </div>
                        <span
                            class="transition-colors material-symbols-outlined text-primary/30 group-hover:text-primary">person</span>
                    </div>
                    <div class="flex items-center justify-between group">
                        <div class="space-y-1">
                            <p class="text-xs tracking-wider uppercase text-on-surface-variant font-label">Date of Birth
                            </p>
                            <p class="text-base font-semibold text-on-surface">October 24, 1992</p>
                        </div>
                        <span
                            class="transition-colors material-symbols-outlined text-primary/30 group-hover:text-primary">calendar_today</span>
                    </div>
                    <div class="flex items-center justify-between group">
                        <div class="space-y-1">
                            <p class="text-xs tracking-wider uppercase text-on-surface-variant font-label">ID Number</p>
                            <p class="text-on-surface font-semibold text-base tracking-[0.2em]">•••• •••• 5678</p>
                        </div>
                        <span
                            class="transition-colors material-symbols-outlined text-primary/30 group-hover:text-primary">fingerprint</span>
                    </div>
                </div>
            </div>
            <!-- Contact Info Group -->
            <div
                class="bg-surface-container-lowest rounded-3xl p-6 shadow-[0px_12px_32px_rgba(0,62,199,0.04)] space-y-6">
                <h3 class="text-sm font-bold tracking-widest uppercase text-primary">Contact Details</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between group">
                        <div class="space-y-1">
                            <p class="text-xs tracking-wider uppercase text-on-surface-variant font-label">Email Address
                            </p>
                            <p class="text-base font-semibold text-on-surface">a.viller@fintech.io</p>
                        </div>
                        <span
                            class="transition-colors material-symbols-outlined text-primary/30 group-hover:text-primary">mail</span>
                    </div>
                    <div class="flex items-center justify-between group">
                        <div class="space-y-1">
                            <p class="text-xs tracking-wider uppercase text-on-surface-variant font-label">Phone Number
                            </p>
                            <p class="text-base font-semibold text-on-surface">+1 (555) 012-3456</p>
                        </div>
                        <span
                            class="transition-colors material-symbols-outlined text-primary/30 group-hover:text-primary">phone_iphone</span>
                    </div>
                </div>
            </div>
            <!-- Address Card (Full Width for emphasis) -->
            <div class="relative p-8 overflow-hidden shadow-2xl bg-primary text-on-primary rounded-3xl">
                <div class="absolute -right-4 -top-4 opacity-10">
                    <span class="material-symbols-outlined text-9xl">location_on</span>
                </div>
                <div class="relative z-10 space-y-4">
                    <p class="text-xs tracking-widest uppercase text-primary-container font-label">Residential Address
                    </p>
                    <div class="space-y-1">
                        <p class="text-xl font-bold font-manrope">224 Baker Street, Suite 4B</p>
                        <p class="text-sm text-primary-container opacity-80">London, United Kingdom, NW1 6XE</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Security Message -->
        <div class="flex items-start gap-3 p-4 bg-surface-container-low rounded-2xl">
            <span class="text-xl material-symbols-outlined text-primary">shield</span>
            <p class="text-xs leading-relaxed text-on-surface-variant">
                Your information is encrypted with bank-grade AES-256 security. Some sensitive fields are masked for
                your privacy. To update verified data, please contact customer support.
            </p>
        </div>
    </main>
    <!-- BottomNavBar -->
    <nav
        class="fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-6 pt-3 bg-white/70 backdrop-blur-xl rounded-t-3xl z-50 shadow-[0px_-8px_24px_rgba(0,62,199,0.04)]">
        <a class="flex flex-col items-center justify-center transition-all duration-200 text-slate-400 hover:text-blue-500 active:scale-90"
            href="#">
            <span class="material-symbols-outlined">home</span>
            <span class="font-inter text-[11px] font-semibold tracking-wide uppercase mt-1">Home</span>
        </a>
        <a class="flex flex-col items-center justify-center transition-all duration-200 text-slate-400 hover:text-blue-500 active:scale-90"
            href="#">
            <span class="material-symbols-outlined">account_balance_wallet</span>
            <span class="font-inter text-[11px] font-semibold tracking-wide uppercase mt-1">Wallet</span>
        </a>
        <a class="flex flex-col items-center justify-center transition-all duration-200 text-slate-400 hover:text-blue-500 active:scale-90"
            href="#">
            <span class="material-symbols-outlined">receipt_long</span>
            <span class="font-inter text-[11px] font-semibold tracking-wide uppercase mt-1">Activity</span>
        </a>
        <!-- Active State: Profile -->
        <a class="flex flex-col items-center justify-center px-4 py-1 text-blue-600 duration-200 bg-blue-50 rounded-2xl active:scale-90"
            href="#">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">person</span>
            <span class="font-inter text-[11px] font-semibold tracking-wide uppercase mt-1">Profile</span>
        </a>
    </nav>
</body>

</html>