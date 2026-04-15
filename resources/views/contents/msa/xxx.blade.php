<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .receipt-cut {
            clip-path: polygon(0% 0%, 100% 0%, 100% 98%, 95% 100%, 90% 98%, 85% 100%, 80% 98%, 75% 100%, 70% 98%, 65% 100%, 60% 98%, 55% 100%, 50% 98%, 45% 100%, 40% 98%, 35% 100%, 30% 98%, 25% 100%, 20% 98%, 15% 100%, 10% 98%, 5% 100%, 0% 98%);
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="bg-slate-900/50 font-body text-on-surface">
    <!-- Modal Backdrop Overlay (Simulated for Mobile Focus) -->
    <div class="fixed inset-0 flex items-end sm:items-center justify-center p-0 sm:p-6 z-[60]">
        <!-- Modal Content Container -->
        <div
            class="w-full max-w-md bg-surface-container-low rounded-t-[2.5rem] sm:rounded-[2.5rem] shadow-[0px_12px_32px_rgba(0,62,199,0.06)] overflow-hidden flex flex-col relative max-h-[839px]">
            <!-- Handle for Mobile Bottom Sheet feel -->
            <div class="w-12 h-1.5 bg-outline-variant/30 rounded-full mx-auto mt-4 sm:hidden"></div>
            <!-- Header Section with Success Icon -->
            <div class="flex flex-col items-center px-8 pt-8 pb-4">
                <div
                    class="flex items-center justify-center w-20 h-20 mb-6 rounded-full bg-emerald-50 ring-8 ring-emerald-50/50">
                    <span class="text-5xl material-symbols-outlined text-emerald-500"
                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight font-headline text-on-surface">Transaction Successful
                </h1>
                <p class="mt-1 text-sm font-label text-on-surface-variant">Your payment has been processed</p>
            </div>
            <!-- Receipt Card Section -->
            <div class="px-6 pb-8">
                <div class="p-6 shadow-sm bg-surface-container-lowest receipt-cut rounded-2xl">
                    <!-- Top Section: Merchant Info -->
                    <div class="flex flex-col items-center pb-6 mb-6 border-b border-dashed border-outline-variant/30">
                        <div class="flex items-center justify-center w-12 h-12 mb-3 bg-primary-fixed rounded-xl">
                            <span class="material-symbols-outlined text-primary"
                                style="font-variation-settings: 'FILL' 1;">storefront</span>
                        </div>
                        <h2 class="text-lg font-bold font-headline text-on-surface">Viller Merchant</h2>
                        <span
                            class="mt-1 text-xs font-semibold tracking-widest uppercase font-label text-primary">Payment
                            Receipt</span>
                    </div>
                    <!-- Breakdown Rows -->
                    <div class="space-y-5">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-label text-on-surface-variant">Merchant Name</span>
                            <span class="text-sm font-semibold font-body text-on-surface">Viller Digital Services</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-label text-on-surface-variant">Date</span>
                            <span class="text-sm font-semibold font-body text-on-surface">Oct 24, 2023 • 14:20</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-label text-on-surface-variant">Transaction ID</span>
                            <span class="text-sm font-semibold font-body text-on-surface">VLR-882910394</span>
                        </div>
                        <!-- Divider -->
                        <div class="w-full h-px bg-surface-container-high"></div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-label text-on-surface-variant">Product</span>
                            <span class="text-sm font-semibold font-body text-on-surface">Telkomsel 50k</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-label text-on-surface-variant">Nominal</span>
                            <span class="text-sm font-semibold font-body text-on-surface">Rp 50.000</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-label text-on-surface-variant">Admin Fee</span>
                            <span class="text-sm font-semibold font-body text-on-surface">Rp 1.500</span>
                        </div>
                        <!-- Divider -->
                        <div class="w-full h-px bg-surface-container-high"></div>
                        <div class="flex items-center justify-between pt-2">
                            <span class="font-bold font-headline text-on-surface">Total Payment</span>
                            <span class="text-xl font-extrabold tracking-tight font-headline text-primary">Rp
                                51.500</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="flex gap-3 px-6 pb-10 sm:pb-8">
                <button
                    class="flex items-center justify-center flex-1 gap-2 px-4 py-4 font-bold transition-transform duration-200 bg-surface-container-highest text-primary font-label rounded-2xl active:scale-95">
                    <span class="text-xl material-symbols-outlined">print</span>
                    Print Receipt
                </button>
                <button
                    class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-br from-primary to-primary-container text-on-primary font-label font-bold py-4 px-4 rounded-2xl shadow-[0px_8px_24px_rgba(0,62,199,0.15)] active:scale-95 transition-transform duration-200">
                    <span class="text-xl material-symbols-outlined">share</span>
                    Share
                </button>
            </div>
            <!-- Close Action (Absolute) -->
            <button
                class="absolute flex items-center justify-center w-10 h-10 transition-transform rounded-full top-6 right-6 bg-surface-container-high text-on-surface-variant active:scale-90">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>
    <!-- Background Content Mockup (Blurred) -->
    <div class="fixed inset-0 p-6 overflow-hidden -z-10">
        <header
            class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-xl shadow-[0px_12px_32px_rgba(0,62,199,0.06)] flex justify-between items-center px-6 py-4 max-w-7xl mx-auto left-0 right-0">
            <div
                class="text-2xl font-black text-transparent font-manrope bg-gradient-to-br from-blue-700 to-blue-500 bg-clip-text">
                Viller</div>
            <div class="flex items-center gap-4">
                <span class="material-symbols-outlined text-slate-500">menu</span>
                <div class="w-10 h-10 overflow-hidden rounded-full bg-slate-200">
                    <img alt="User profile photo" class="object-cover w-full h-full"
                        data-alt="close-up portrait of a professional businessman in a studio with soft overhead lighting and clean grey background"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA11_gEkzTm0GtxOAoIOJF8DYdMEHwfMH2syeu_b6_SHD3YWxvhupXVbHHYuizYs05rRMP7VGTUpfrkhHI_0A0f9dwAbICqa1Kiz2OV6-wMocF6aEbT33hZve59CJZhTCvxV4QN-0y6pG9XW74BTQBp2PezHqxtGxbCrmAk4UQLdiLx-qFJz9OxJs-qUFCipaHaL3cYX4DIqB5_0g5tlPw2s55UaejED3S0Kdqre_boeuT-D0ifghhrwu_fDNTwLBG4QkRG6G6cSOJu" />
                </div>
            </div>
        </header>
        <main class="max-w-lg mx-auto mt-24 space-y-8 opacity-20">
            <div class="bg-white p-8 rounded-[2rem] space-y-4">
                <div class="w-1/2 h-4 rounded bg-slate-100"></div>
                <div class="w-full h-24 bg-slate-100 rounded-2xl"></div>
                <div class="w-full h-24 bg-slate-100 rounded-2xl"></div>
            </div>
            <div class="bg-white p-8 rounded-[2rem] space-y-4">
                <div class="w-1/3 h-4 rounded bg-slate-100"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="h-32 bg-slate-100 rounded-2xl"></div>
                    <div class="h-32 bg-slate-100 rounded-2xl"></div>
                </div>
            </div>
        </main>
        <nav
            class="fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-6 pt-3 bg-white/70 backdrop-blur-xl shadow-[0px_-8px_24px_rgba(0,62,199,0.04)] rounded-t-3xl opacity-20">
            <div class="flex flex-col items-center justify-center px-5 py-2 text-slate-400">
                <span class="material-symbols-outlined">home</span>
                <span class="font-inter text-[11px] font-semibold uppercase tracking-wider mt-1">Home</span>
            </div>
            <div class="flex flex-col items-center justify-center px-5 py-2 text-blue-700 bg-blue-50 rounded-2xl">
                <span class="material-symbols-outlined">history_edu</span>
                <span class="font-inter text-[11px] font-semibold uppercase tracking-wider mt-1">Transaction</span>
            </div>
            <div class="flex flex-col items-center justify-center px-5 py-2 text-slate-400">
                <span class="material-symbols-outlined">grid_view</span>
                <span class="font-inter text-[11px] font-semibold uppercase tracking-wider mt-1">Product</span>
            </div>
            <div class="flex flex-col items-center justify-center px-5 py-2 text-slate-400">
                <span class="material-symbols-outlined">person</span>
                <span class="font-inter text-[11px] font-semibold uppercase tracking-wider mt-1">Profile</span>
            </div>
        </nav>
    </div>
</body>

</html>