<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ConfigCenter - Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
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
                        "on-primary-fixed": "#0f0069",
                        "surface-container-highest": "#d3e4fe",
                        "primary-fixed-dim": "#c3c0ff",
                        "tertiary-fixed-dim": "#ffb695",
                        "on-secondary-fixed-variant": "#444749",
                        "primary-container": "#4f46e5",
                        "secondary-container": "#e0e3e5",
                        "on-primary-container": "#dad7ff",
                        "on-tertiary-container": "#ffd2be",
                        "inverse-primary": "#c3c0ff",
                        "on-surface": "#0b1c30",
                        "on-error": "#ffffff",
                        "surface-variant": "#d3e4fe",
                        "secondary-fixed": "#e0e3e5",
                        "error": "#ba1a1a",
                        "primary": "#3525cd",
                        "secondary": "#5c5f61",
                        "secondary-fixed-dim": "#c4c7c9",
                        "on-surface-variant": "#464555",
                        "on-primary": "#ffffff",
                        "on-secondary": "#ffffff",
                        "primary-fixed": "#e2dfff",
                        "outline": "#777587",
                        "surface-tint": "#4d44e3",
                        "tertiary-container": "#a44100",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "on-tertiary-fixed": "#351000",
                        "error-container": "#ffdad6",
                        "on-tertiary": "#ffffff",
                        "on-background": "#0b1c30",
                        "surface": "#f8f9ff",
                        "outline-variant": "#c7c4d8",
                        "surface-dim": "#cbdbf5",
                        "inverse-surface": "#213145",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-container": "#626567",
                        "surface-container-low": "#eff4ff",
                        "on-secondary-fixed": "#191c1e",
                        "tertiary": "#7e3000",
                        "tertiary-fixed": "#ffdbcc",
                        "on-error-container": "#93000a",
                        "surface-container-high": "#dce9ff",
                        "on-primary-fixed-variant": "#3323cc",
                        "surface-container": "#e5eeff",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-bright": "#f8f9ff",
                        "background": "#f8f9ff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "card-gap": "24px",
                        "container-padding-mobile": "16px",
                        "gutter": "24px",
                        "unit": "8px",
                        "container-padding-desktop": "32px"
                    },
                    "fontFamily": {
                        "headline-lg-mobile": ["Inter"],
                        "headline-xl": ["Inter"],
                        "data-tabular": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "label-caps": ["Inter"],
                        "body-sm": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg-mobile": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "headline-xl": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "data-tabular": ["14px", { "lineHeight": "20px", "fontWeight": "500" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-lg": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "label-caps": ["12px", { "lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600" }],
                        "body-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }]
                    }
                }
            }
        }
    </script>
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.03);
            border: 1px solid #E2E8F0;
        }

        .card-hover:hover {
            box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.06);
            transform: translateY(-2px);
        }

        /* Minimalist scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #c7c4d8;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #777587;
        }
    </style>
</head>

<body class="min-h-screen overflow-x-hidden bg-background text-on-surface font-body-md">
    <!-- TopAppBar -->
    <header
        class="bg-white/80 dark:bg-surface/80 backdrop-blur-md fixed top-0 right-0 w-full lg:w-[calc(100%-280px)] h-16 shadow-sm border-b border-outline-variant dark:border-outline flex justify-between items-center px-container-padding-mobile lg:px-container-padding-desktop z-10 transition-all duration-300 ease-in-out">
        
        <div class="flex items-center gap-2 flex-1 md:flex-initial mr-4">
            <!-- Hamburger Menu Button (Mobile Only) -->
            <button id="open-sidebar" class="lg:hidden p-2 rounded-full text-secondary hover:bg-surface-container hover:text-primary transition-colors focus:outline-none shrink-0" aria-label="Open Sidebar">
                <span class="material-symbols-outlined text-[24px]">menu</span>
            </button>
            
            <!-- Search bar (on_left configuration) -->
            <div
                class="flex items-center px-4 py-2 transition-all border border-transparent rounded-full bg-surface-container-low w-full max-w-[200px] sm:max-w-xs md:max-w-none md:w-96 focus-within:border-primary focus-within:bg-white">
                <span class="mr-2 material-symbols-outlined text-on-surface-variant">search</span>
                <input
                    class="w-full bg-transparent border-none outline-none focus:ring-0 text-body-sm font-body-sm text-on-surface placeholder-on-surface-variant"
                    placeholder="Pencarian global..." type="text" />
            </div>
        </div>
        
        <!-- Actions -->
        <div class="flex items-center gap-3 sm:gap-4 shrink-0">
            <button
                class="flex items-center justify-center w-10 h-10 transition-colors rounded-full text-on-surface-variant hover:text-primary hover:bg-surface-container">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="w-8 h-8 overflow-hidden border rounded-full cursor-pointer border-outline-variant">
                <img alt="User Avatar" class="object-cover w-full h-full"
                    data-alt="A professional headshot of an administrator for a system dashboard, clear lighting, bright background."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCsCDZ6eznY9XP5Dn-odaUwLIYH9RJ3JgysT9A3illy_68JBH1qUZMHl2aHEca8J7BrSlL629z5Nqjm7QfYoi5EfRXbsamqOaIGskEBC0qRGFLH8zoyHztL6YMROWcdQiddXZuYvZO1CJ0vdhzVWc4onsJXb5MwVJj0E2646hIrtZdpvUgqkM3cNb9W2ZI2l2_wh8PHOYGZZjQhxmNTVO4pcQTX3oK-g9huIpHDvA2IEQ_3lRncfuoA4fZd8gy6yJqnfekDpPTw3T0" />
            </div>
        </div>
    </header>

    <!-- Sidebar Backdrop Overlay (Mobile Only) -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 lg:hidden hidden transition-opacity duration-300 opacity-0"></div>

    <!-- SideNavBar -->
    @include('viller.sidebar')
    <!-- Main Canvas -->
    @include('viller.main')

    <!-- Script to toggle sidebar on mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openSidebarBtn = document.getElementById('open-sidebar');
            const closeSidebarBtn = document.getElementById('close-sidebar');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            function showSidebar() {
                if (!sidebar || !sidebarOverlay) return;
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.remove('hidden');
                // Force layout reflow to allow transition to trigger
                sidebarOverlay.offsetHeight;
                sidebarOverlay.classList.remove('opacity-0');
                sidebarOverlay.classList.add('opacity-100');
            }

            function hideSidebar() {
                if (!sidebar || !sidebarOverlay) return;
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.remove('opacity-100');
                sidebarOverlay.classList.add('opacity-0');
                
                const onTransitionEnd = () => {
                    if (sidebarOverlay.classList.contains('opacity-0')) {
                        sidebarOverlay.classList.add('hidden');
                    }
                    sidebarOverlay.removeEventListener('transitionend', onTransitionEnd);
                };
                sidebarOverlay.addEventListener('transitionend', onTransitionEnd);
            }

            if (openSidebarBtn) {
                openSidebarBtn.addEventListener('click', showSidebar);
            }
            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', hideSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', hideSidebar);
            }
        });
    </script>
</body>

</html>