<div v-if="modalShower.isLoading">
    <div class="fixed inset-0 transition-opacity bg-gray-500/75 dark:bg-gray-900/80"
        @click="modalShower.isSetPin = false">
    </div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <header class="absolute top-0 left-0 z-50 flex items-center justify-center w-full px-6 py-8 bg-transparent">
            <div class="flex items-center gap-2">
                <span class="text-blue-600 material-symbols-outlined dark:text-blue-400" data-icon="lock">lock</span>
                <span
                    class="text-xl font-bold tracking-tighter text-blue-700 font-manrope dark:text-blue-500">Viller</span>
            </div>
        </header>
        <!-- Main Content Canvas -->
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

        <!-- Visual Layering Element: Subtle vignette -->
        <div
            class="pointer-events-none fixed inset-0 bg-[radial-gradient(circle_at_center,transparent_0%,rgba(247,249,254,0.4)_100%)]">
        </div>
    </div>
</div>
</div>