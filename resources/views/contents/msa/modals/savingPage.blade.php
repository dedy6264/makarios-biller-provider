<div v-if="isSavingPage">
    <main class="max-w-lg px-6 pt-32 pb-16 mx-auto">
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
            <button @click="modalSavingDepositPage"
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
</div>