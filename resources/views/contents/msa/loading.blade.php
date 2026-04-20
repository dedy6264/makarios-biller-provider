<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500&amp;display=swap"
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
                    "tertiary": "#952200",
                    "secondary-container": "#95aafe",
                    "secondary-fixed": "#dde1ff",
                    "tertiary-fixed-dim": "#ffb4a1",
                    "primary-fixed": "#dde1ff",
                    "inverse-surface": "#2d3135",
                    "error-container": "#ffdad6",
                    "on-secondary-container": "#253b89",
                    "on-secondary": "#ffffff",
                    "surface-tint": "#004ced",
                    "inverse-on-surface": "#eff1f6",
                    "surface-container": "#eceef3",
                    "surface-container-highest": "#e0e2e7",
                    "tertiary-fixed": "#ffdbd2",
                    "on-surface": "#181c20",
                    "background": "#f7f9fe",
                    "on-primary-container": "#dfe3ff",
                    "on-error": "#ffffff",
                    "secondary-fixed-dim": "#b7c4ff",
                    "on-background": "#181c20",
                    "on-secondary-fixed-variant": "#2b418f",
                    "surface-container-low": "#f1f4f9",
                    "surface-container-high": "#e6e8ed",
                    "on-tertiary-fixed-variant": "#891e00",
                    "tertiary-container": "#bf3003",
                    "surface-bright": "#f7f9fe",
                    "outline-variant": "#c3c5d9",
                    "inverse-primary": "#b7c4ff",
                    "error": "#ba1a1a",
                    "outline": "#737688",
                    "on-tertiary": "#ffffff",
                    "on-surface-variant": "#434656",
                    "surface-dim": "#d8dadf",
                    "surface-container-lowest": "#ffffff",
                    "on-tertiary-container": "#ffddd5",
                    "on-primary": "#ffffff",
                    "on-primary-fixed": "#001452",
                    "primary-fixed-dim": "#b7c4ff",
                    "on-secondary-fixed": "#001452",
                    "on-tertiary-fixed": "#3c0800",
                    "primary-container": "#0052ff",
                    "on-primary-fixed-variant": "#0038b6",
                    "surface-variant": "#e0e2e7",
                    "secondary": "#4459a8",
                    "primary": "#003ec7",
                    "surface": "#f7f9fe",
                    "on-error-container": "#93000a"
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
        .v-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15 20L30 40L45 20' fill='none' stroke='%23003ec7' stroke-width='1.5' stroke-opacity='0.03'/%3E%3C/svg%3E");
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.1);
                opacity: 1;
            }

            100% {
                transform: scale(0.8);
                opacity: 0.5;
            }
        }

        .animate-pulse-ring {
            animation: pulse-ring 3s ease-in-out infinite;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>

<body class="overflow-hidden bg-background font-body text-on-surface">
    <!-- Brand Shell: TopAppBar (Shared Component Mapping) -->
    <header class="absolute top-0 left-0 z-50 flex items-center justify-center w-full px-6 py-8 bg-transparent">
        <div class="flex items-center gap-2">
            <span class="text-blue-600 material-symbols-outlined dark:text-blue-400" data-icon="lock">lock</span>
            <span class="text-xl font-bold tracking-tighter text-blue-700 font-manrope dark:text-blue-500">Viller</span>
        </div>
    </header>
    <!-- Main Content Canvas -->
    <div id="app">
        <transition enter-active-class="transition duration-300 ease-out"
            enter-from-class="transform -translate-y-2 opacity-0" enter-to-class="transform translate-y-0 opacity-100"
            leave-active-class="transition duration-200 ease-in" leave-from-class="transform translate-y-0 opacity-100"
            leave-to-class="transform -translate-y-2 opacity-0">
            <div v-if="isAllertSuccess"
                class="justify-center px-4 py-3 text-center text-blue-700 bg-blue-100 border-t border-b border-blue-500"
                role="alert">
                <p class="font-bold">@{{ allertText }}</p>
            </div>
        </transition>
        <main
            class="relative flex flex-col items-center justify-center w-full h-screen bg-gradient-to-br from-surface-bright via-surface-container-low to-surface-container-high v-pattern">
            <!-- Loading Animation Section -->
            <div class="flex flex-col items-center justify-center space-y-12">
                <!-- Sleek High-Fidelity Loading Ring -->
                <div class="relative flex items-center justify-center w-32 h-32">
                    <!-- Outer Ambient Glow -->
                    <div class="absolute inset-0 rounded-full bg-primary/10 blur-2xl animate-pulse-ring"></div>
                    <!-- Rotating Ring -->
                    <div
                        class="w-full h-full rounded-full border-[3px] border-surface-container-highest border-t-primary-container animate-[spin_1.5s_linear_infinite]">
                    </div>
                    <!-- Center "V" Mark -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="text-primary-container opacity-80" fill="none" height="24" viewbox="0 0 24 24"
                            width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6L12 18L20 6" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="3"></path>
                        </svg>
                    </div>
                </div>
                <!-- Status Message -->
                <div class="space-y-2 text-center">
                    <h1 class="text-xl font-semibold tracking-tight font-headline text-on-surface">Processing your
                        request...</h1>
                    <p class="text-sm font-medium tracking-wide font-body text-on-surface-variant">Securing your
                        financial
                        gateway</p>
                </div>
            </div>
            <!-- Transactional Footer (Suppressing Nav) -->
            <div
                class="absolute bottom-12 flex items-center gap-3 px-6 py-3 bg-surface-container-lowest/70 backdrop-blur-xl rounded-full border border-outline-variant/15 shadow-[0px_12px_32px_rgba(0,62,199,0.06)]">
                <span class="material-symbols-outlined text-primary text-[18px]"
                    style="font-variation-settings: 'FILL' 1;">verified_user</span>
                <span class="text-[11px] font-label font-bold uppercase tracking-widest text-on-surface-variant">Secure
                    encrypted connection</span>
            </div>
        </main>
    </div>
    <!-- Visual Layering Element: Subtle vignette -->
    <div
        class="pointer-events-none fixed inset-0 bg-[radial-gradient(circle_at_center,transparent_0%,rgba(247,249,254,0.4)_100%)]">
    </div>
    <script>
        const { createApp,onMounted, ref,nextTick, watch } = Vue;
        const app = createApp({
            setup() {
                const isAllertSuccess=ref(false);
                const allertText=ref('');
                const data = ref(@json($response) ?? []);
                const redirect= @json($redirect);
                const origin= @json($origin);
                const loginRedirect = () => {
                    localStorage.setItem('token', data.value.result.access_token);
                    if(data.value.responseCode=="00"){
                        allertText.value = "Login Success, Please wait...";
                        isAllertSuccess.value = true;
                        setTimeout(() => {
                            isAllertSuccess.value = false;
                            window.location.href = redirect; 
                        }, 2000);
                    }
                };
                const registerRedirect=()=>{
                    if(data.value.responseCode=="00"){
                        allertText.value="Registration Success, Please Login";
                        isAllertSuccess.value=true; 
                        setTimeout(() => {
                            isAllertSuccess.value=false; 
                            window.location.href = redirect;
                        }, 2000);
                    }
                }
                onMounted(() => {
                    console.log(data.value);
                    switch (origin) {
                        case "signUp":
                            registerRedirect();
                            break;
                        case "signIn":
                            loginRedirect();
                            break
                        default:
                            break;
                    }
                });
                return { 
                    registerRedirect,
                    isAllertSuccess,
                    allertText,
                    data,
                    origin,
                    loginRedirect,
                    redirect,
                };
            }
        })
        app.config.globalProperties.$format = window.format
        app.mount('#app')
    </script>
</body>

</html>