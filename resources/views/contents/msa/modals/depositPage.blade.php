<div v-if="modalShower.isDeposite">
    <main class="max-w-2xl px-6 pt-24 pb-32 mx-auto">
        <!-- Hero Balance Context (Liquid Architect Style) -->
        <section class="mb-10 text-center">
            <p class="mb-1 text-sm font-medium text-on-surface-variant">Current Balance</p>
            <h2 class="text-4xl font-extrabold tracking-tight headline text-on-surface">$12,450.80</h2>
        </section>
        <!-- Section 1: Select Deposit Method -->
        <section class="mb-12">
            <h3 class="px-1 mb-6 text-lg font-bold headline">Select Deposit Method</h3>
            <div class="grid gap-4">
                <!-- Method: Bank Transfer (Active State Simulation) -->
                <div
                    class="bg-surface-container-lowest p-5 rounded-[24px] shadow-[0px_12px_32px_rgba(0,62,199,0.04)] border-2 border-primary/10 flex items-center justify-between group cursor-pointer hover:bg-surface-bright transition-all">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-primary/5 text-primary">
                            <span class="text-3xl material-symbols-outlined"
                                data-icon="account_balance">account_balance</span>
                        </div>
                        <div>
                            <p class="font-bold text-on-surface">Bank Transfer</p>
                            <p class="text-xs text-on-surface-variant">Instant processing • 0% fee</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-6 h-6 border-2 rounded-full border-primary">
                        <div class="w-3 h-3 rounded-full bg-primary"></div>
                    </div>
                </div>
                <!-- Method: Virtual Account -->
                <div
                    class="bg-surface-container-lowest p-5 rounded-[24px] flex items-center justify-between group cursor-pointer hover:bg-surface-bright transition-all">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex items-center justify-center w-14 h-14 rounded-2xl bg-surface-container text-on-surface-variant">
                            <span class="text-3xl material-symbols-outlined" data-icon="bolt">bolt</span>
                        </div>
                        <div>
                            <p class="font-bold text-on-surface">Virtual Account</p>
                            <p class="text-xs text-on-surface-variant">Real-time confirmation</p>
                        </div>
                    </div>
                    <div class="w-6 h-6 border-2 rounded-full border-outline-variant"></div>
                </div>
                <!-- Method: E-Wallet -->
                <div
                    class="bg-surface-container-lowest p-5 rounded-[24px] flex items-center justify-between group cursor-pointer hover:bg-surface-bright transition-all">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex items-center justify-center w-14 h-14 rounded-2xl bg-surface-container text-on-surface-variant">
                            <span class="text-3xl material-symbols-outlined"
                                data-icon="account_balance_wallet">account_balance_wallet</span>
                        </div>
                        <div>
                            <p class="font-bold text-on-surface">E-Wallet</p>
                            <p class="text-xs text-on-surface-variant">Pay with Apple Pay or GPay</p>
                        </div>
                    </div>
                    <div class="w-6 h-6 border-2 rounded-full border-outline-variant"></div>
                </div>
            </div>
        </section>
        <!-- Section 2: Instructions (Liquid Layout) -->
        <section class="bg-surface-container-low rounded-[32px] p-8 relative overflow-hidden">
            <!-- Glass Decorative Accent -->
            <div class="absolute top-0 right-0 w-32 h-32 -mt-16 -mr-16 bg-primary/5 blur-3xl"></div>
            <div class="flex items-center gap-3 mb-6">
                <span class="material-symbols-outlined text-primary" data-icon="info"
                    style="font-variation-settings: 'FILL' 1;">info</span>
                <h3 class="text-lg font-bold headline">Instructions</h3>
            </div>
            <div class="space-y-8">
                <!-- Step 1 -->
                <div class="flex gap-5">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-sm font-bold rounded-full bg-primary text-on-primary">
                        1</div>
                    <div class="flex-grow">
                        <p class="mb-3 text-sm font-medium text-on-surface-variant">Copy Account Number</p>
                        <div
                            class="flex items-center justify-between p-4 bg-surface-container-lowest rounded-2xl group">
                            <span class="font-mono font-bold tracking-wider text-on-surface">8829 0012 4492 0182</span>
                            <button
                                class="flex items-center gap-1 text-sm font-semibold transition-transform text-primary active:scale-95">
                                <span class="text-lg material-symbols-outlined"
                                    data-icon="content_copy">content_copy</span>
                                <span>Copy</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="flex gap-5">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-sm font-bold rounded-full bg-primary text-on-primary">
                        2</div>
                    <div>
                        <p class="mb-1 text-sm font-medium text-on-surface-variant">Open Banking App</p>
                        <p class="text-sm leading-relaxed text-on-surface">Complete transfer in your banking app using
                            the copied account number above. Ensure the recipient name is <span class="font-bold">Viller
                                FinCorp Ltd.</span></p>
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="flex gap-5">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-sm font-bold rounded-full bg-primary text-on-primary">
                        3</div>
                    <div>
                        <p class="mb-1 text-sm font-medium text-on-surface-variant">Verify Deposit</p>
                        <p class="text-sm leading-relaxed text-on-surface">Once the transfer is complete, your funds
                            will automatically appear in your wallet within 5 minutes.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Dynamic CTA -->
        {{-- <div class="mt-12">
            <button
                class="w-full h-16 bg-gradient-to-br from-primary to-primary-container text-on-primary rounded-[20px] font-bold headline text-lg flex items-center justify-center gap-2 shadow-[0px_12px_32px_rgba(0,62,199,0.2)] active:scale-95 transition-transform">
                <span>I've Transferred Funds</span>
                <span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
            </button>
        </div> --}}
    </main>
</div>