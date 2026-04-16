<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0, viewport-fit=cover" name="viewport" />
    <title>Security - Enter PIN</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
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
                    "surface": "#f7f9fe",
                    "on-tertiary": "#ffffff",
                    "on-surface": "#181c20",
                    "on-secondary": "#ffffff",
                    "on-tertiary-fixed": "#3c0800",
                    "on-error-container": "#93000a",
                    "secondary": "#4459a8",
                    "surface-variant": "#e0e2e7",
                    "outline-variant": "#c3c5d9",
                    "error-container": "#ffdad6",
                    "secondary-fixed-dim": "#b7c4ff",
                    "surface-container-highest": "#e0e2e7",
                    "tertiary-fixed": "#ffdbd2",
                    "primary": "#003ec7",
                    "error": "#ba1a1a",
                    "on-primary": "#ffffff",
                    "on-primary-fixed-variant": "#0038b6",
                    "primary-fixed-dim": "#b7c4ff",
                    "secondary-container": "#95aafe",
                    "on-secondary-fixed-variant": "#2b418f",
                    "on-background": "#181c20",
                    "background": "#f7f9fe",
                    "surface-container": "#eceef3",
                    "surface-container-lowest": "#ffffff",
                    "primary-fixed": "#dde1ff",
                    "outline": "#737688",
                    "surface-tint": "#004ced",
                    "on-error": "#ffffff",
                    "tertiary-container": "#bf3003",
                    "inverse-on-surface": "#eff1f6",
                    "tertiary-fixed-dim": "#ffb4a1",
                    "surface-bright": "#f7f9fe",
                    "on-primary-fixed": "#001452",
                    "on-secondary-fixed": "#001452",
                    "on-surface-variant": "#434656",
                    "surface-dim": "#d8dadf",
                    "surface-container-high": "#e6e8ed",
                    "primary-container": "#0052ff",
                    "surface-container-low": "#f1f4f9",
                    "secondary-fixed": "#dde1ff",
                    "on-tertiary-container": "#ffddd5",
                    "on-primary-container": "#dfe3ff",
                    "inverse-surface": "#2d3135",
                    "on-secondary-container": "#253b89",
                    "tertiary": "#952200",
                    "on-tertiary-fixed-variant": "#891e00",
                    "inverse-primary": "#b7c4ff"
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
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="flex flex-col items-center min-h-screen bg-surface text-on-surface">
    <!-- TopAppBar -->
    <header
        class="fixed top-0 w-full bg-[#f7f9fe] dark:bg-slate-950 flex justify-between items-center px-6 h-16 w-full z-50">
        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-[#0052FF] cursor-pointer active:scale-95 duration-150"
                data-icon="arrow_back">arrow_back</span>
        </div>
        <h1 class="font-manrope font-bold text-lg text-[#181c20] dark:text-white">Security</h1>
        <div class="w-6"></div> <!-- Spacer for centering -->
    </header>
    <main class="flex flex-col items-center flex-1 w-full max-w-md px-8 pt-24 pb-12">
        <!-- Brand/Identity Lockup -->
        <div class="mb-10 text-center">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 bg-primary-container/10 rounded-2xl">
                <span class="text-4xl material-symbols-outlined text-primary-container" data-icon="lock"
                    style="font-variation-settings: 'FILL' 1;">lock</span>
            </div>
            <h2 class="mb-3 text-2xl font-extrabold tracking-tight text-on-surface">Enter your 6-digit transaction PIN
            </h2>
            <p class="text-sm font-medium text-on-surface-variant">Please enter your secure PIN to authorize this
                transfer.</p>
        </div>
        <!-- PIN Input Visualization -->
        <div class="flex gap-3 mb-12">
            <div v-for="i in pinLimit" :key="i"
                class="flex items-center justify-center w-12 h-12 transition-all duration-200 border-2 shadow-sm rounded-xl"
                :class="pin.length >= i 
                ? 'bg-surface-container-lowest border-primary-container' 
                : 'bg-surface-container-lowest border-outline-variant/30'">

                <div class="w-3 h-3 transition-all duration-200 rounded-full"
                    :class="pin.length >= i ? 'bg-primary-container scale-110' : 'bg-surface-variant'">
                </div>
            </div>
        </div>
        <!-- Numeric Keypad -->
        <div class="grid grid-cols-3 gap-6 w-full max-w-[320px] mb-10">
            <button v-for="n in [1,2,3,4,5,6,7,8,9]" :key="n" @click="addNumber(n)"
                class="aspect-square rounded-full bg-surface-container-lowest text-2xl font-headline font-bold text-on-surface flex items-center justify-center shadow-[0px_4px_12px_rgba(0,62,199,0.04)] active:scale-90 transition-transform duration-150">
                {{ n }}
            </button>

            <div class="aspect-square"></div>
            <button @click="addNumber(0)"
                class="aspect-square rounded-full bg-surface-container-lowest text-2xl font-headline font-bold text-on-surface flex items-center justify-center shadow-[0px_4px_12px_rgba(0,62,199,0.04)] active:scale-90 transition-transform duration-150">
                0
            </button>
            <button @click="deleteNumber"
                class="aspect-square rounded-full bg-surface-container-lowest text-on-surface-variant flex items-center justify-center shadow-[0px_4px_12px_rgba(0,62,199,0.04)] active:scale-90 transition-transform duration-150">
                <span class="text-3xl material-symbols-outlined">backspace</span>
            </button>
        </div>
        <!-- Secondary Action -->
        <button
            class="mb-10 text-sm font-semibold transition-opacity text-primary-container hover:opacity-80 active:scale-95">
            Forgot PIN?
        </button>
        <!-- Primary Action -->
        <button @click="confirmPin" :disabled="pin.length !== pinLimit"
            class="w-full h-14 rounded-2xl font-headline font-bold text-lg shadow-[0px_12px_32px_rgba(0,62,199,0.15)] active:scale-[0.98] transition-all duration-300"
            :class="pin.length === pinLimit 
            ? 'bg-gradient-to-br from-primary to-primary-container text-white opacity-100' 
            : 'bg-slate-200 text-slate-400 cursor-not-allowed opacity-50'">
            Confirm
        </button>
    </main>
    <!-- BottomNavBar (Suppressed for focused task per rule, but included contextually if needed as a placeholder for navigation flow) -->
    <!-- Suppressed based on "Task-Focused" suppression rule in instructions -->
    <!-- Decorative Liquid Element -->
    <div class="fixed -bottom-24 -left-24 w-64 h-64 bg-primary/5 blur-[100px] rounded-full -z-10"></div>
    <div class="fixed top-20 -right-20 w-48 h-48 bg-secondary/5 blur-[80px] rounded-full -z-10"></div>
</body>

</html>