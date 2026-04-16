<!DOCTYPE html>

<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
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
                    "lg": "1rem",
                    "xl": "1.5rem",
                    "2xl": "2rem",
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
  <script src="{{ url('assets/css/web-apps/web-apps.css') }}" type="text/css"></script>
</head>

<body class="flex flex-col items-center min-h-screen overflow-x-hidden antialiased text-on-background">
  <!-- TopAppBar -->
  {{-- <header
    class="fixed top-0 w-full z-50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0px_12px_32px_rgba(0,62,199,0.06)]">
    <div class="flex items-center justify-between px-6 py-4 mx-auto max-w-7xl">
      <div class="flex items-center gap-3">
        <span class="text-blue-600 material-symbols-outlined dark:text-blue-400">menu</span>
      </div>
      <div class="absolute -translate-x-1/2 left-1/2">
        <h1
          class="text-2xl font-black text-transparent font-manrope bg-gradient-to-br from-blue-700 to-blue-500 bg-clip-text">
          Viller</h1>
      </div>
      <div
        class="flex items-center justify-center w-10 h-10 overflow-hidden rounded-full bg-slate-100 dark:bg-slate-800">
        <img alt="User" class="object-cover w-full h-full"
          data-alt="minimalist user avatar placeholder with a soft blue profile silhouette on a clean white background"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLjhCKxqiDnYFfIqUaTS1GPfWTg0_zS5Rpoy454dVbfcEF6NI46cfDTx3VIIoE_WGhzp4MCAbN0GnaKf1J9nMIZCnf_cc1YMfl-rRxtdZbJG0ze1oOs7spTc1avG1-BjUpiodn4CNTn5URHkk3kRKGY4BkRnOTFxmmooP6mWhNzLzYA1ZXaFd5QYZxt85Vwvv_IuR7chr7Ko9B_FG9S5b8s2qVpNIFpHikvMqLGBZjGnQIQG4c4cT4fD-tcmv-D9wG8RA6fwWVXmqY" />
      </div>
    </div>
  </header> --}}
  <!-- Hero / Content Canvas -->
  <main class="flex flex-col items-center flex-grow w-full max-w-md px-8 pt-8 pb-8 text-center">
    <!-- Visual Anchor -->
    <div class="relative flex items-center justify-center w-full mb-12 aspect-square">
      <!-- Background Decorative Blobs -->
      <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-primary/5 to-primary-container/10 blur-3xl">
      </div>
      <!-- Hero Illustration Card -->
      <div
        class="relative z-10 w-44 h-60 bg-surface-container-lowest rounded-[2.5rem] shadow-[0px_24px_48px_rgba(0,62,199,0.08)] p-6 flex flex-col items-center justify-between border border-white/20">
        <div class="flex items-center justify-between w-full">
          <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-primary/10">
            <span class="text-sm material-symbols-outlined text-primary">contactless</span>
          </div>
          <div class="text-[10px] font-label font-bold text-on-surface-variant tracking-widest uppercase">Verified</div>
        </div>
        <div class="relative flex items-center justify-center w-full h-32">
          <div class="absolute w-24 h-24 bg-primary rounded-2xl rotate-12 opacity-10"></div>
          <div class="absolute w-24 h-24 bg-primary-container rounded-2xl -rotate-6 opacity-20"></div>
          <span class="text-6xl material-symbols-outlined text-primary"
            style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
        </div>
        <div class="w-full space-y-3">
          <div class="h-1.5 w-3/4 bg-surface-container rounded-full"></div>
          <div class="h-1.5 w-1/2 bg-surface-container rounded-full"></div>
        </div>
        <div class="flex items-center justify-between w-full px-4 py-3 bg-primary rounded-xl text-on-primary">
          <span class="text-[10px] font-bold">Success</span>
          <span class="text-sm material-symbols-outlined">check_circle</span>
        </div>
      </div>
      <!-- Floating Micro-Elements -->
      <div
        class="absolute flex items-center justify-center w-16 h-16 border shadow-xl top-10 right-4 glass-panel rounded-2xl border-white/40">
        <span class="material-symbols-outlined text-primary">payments</span>
      </div>
      <div
        class="absolute flex items-center justify-center border shadow-xl bottom-12 left-4 w-14 h-14 glass-panel rounded-2xl border-white/40">
        <span class="material-symbols-outlined text-secondary">trending_up</span>
      </div>
    </div>
    <!-- Typography Cluster -->
    <div class="mb-12 space-y-4">
      <h2 class="text-2xl font-extrabold leading-tight tracking-tight font-headline text-on-surface">
        Payments made <span class="text-primary-container">effortless.</span>
      </h2>
      <p class="px-4 leading-relaxed font-body text-on-surface-variant">
        Experience the next generation of financial movement with architecturally precise digital banking.
      </p>
    </div>
    <!-- Actions -->
    <div class="w-full space-y-4">
      <a href="{{ route('msa.signIn') }}"
        class="block w-full text-center py-5 px-8 bg-gradient-to-br from-primary to-primary-container text-on-primary rounded-xl font-label font-bold text-lg shadow-[0px_8px_24px_rgba(0,62,199,0.2)] active:scale-[0.98] transition-all duration-200">
        Login
      </a>

      <a href="{{ route('msa.signUp') }}"
        class="block w-full text-center py-5 px-8 bg-transparent text-primary rounded-xl font-label font-bold text-lg border-2 border-primary/10 hover:bg-primary/5 active:scale-[0.98] transition-all duration-200">
        Sign Up
      </a>
    </div>
  </main>
  <!-- Footnote -->
  <footer class="flex flex-col items-center w-full pt-4 pb-10">
    <div class="flex gap-6 mb-4">
      <span class="text-xs tracking-widest uppercase font-label text-outline">Privacy</span>
      <span class="text-xs tracking-widest uppercase font-label text-outline">Terms</span>
      <span class="text-xs tracking-widest uppercase font-label text-outline">Support</span>
    </div>
    <div class="w-32 h-1 rounded-full bg-surface-container-highest"></div>
  </footer>
  <!-- Note: BottomNavBar is suppressed as this is a transactional landing entry point -->
</body>

</html>