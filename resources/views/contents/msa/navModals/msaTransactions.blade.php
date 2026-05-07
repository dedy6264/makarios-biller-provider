<div v-if="modalNavigation.modalMsaTransactions">
    <main class="max-w-lg px-6 pt-24 pb-32 mx-auto space-y-8">

        <!-- Section Header -->
        <div class="mb-8">
            <h2 class="mb-2 text-3xl font-extrabold tracking-tight font-headline text-on-surface">Transaction
                History
            </h2>
            <p class="text-sm font-medium text-on-surface-variant">Pantau setiap transaksimu disini</p>
        </div>
        <!-- Filters Section - Asymmetric Bento Feel -->
        <div class="grid grid-cols-2 gap-3 mb-10">
            <!-- DATE FILTER -->
            <div
                class="relative group bg-surface-container-lowest p-4 rounded-3xl shadow-[0px_8px_20px_rgba(0,62,199,0.03)] border border-outline-variant/15 transition-all hover:bg-surface-bright focus-within:ring-2 focus-within:ring-primary/20">

                <!-- Label -->
                <span class="text-[10px] uppercase tracking-widest font-bold text-primary mb-1 block">
                    Dari
                </span>

                <!-- Input Wrapper -->
                <div class="flex items-center gap-2">
                    <!-- Input Date disesuaikan agar mengisi ruang dan transparan -->
                    <input type="date" v-model="utils.startDate"
                        class="flex-1 w-full text-sm font-bold uppercase bg-transparent border-0 outline-none appearance-none cursor-pointer text-on-surface" />

                    <!-- Ikon Kalender -->
                    <span class="text-xl pointer-events-none material-symbols-outlined text-primary shrink-0"
                        style="font-variation-settings: 'FILL' 1">
                        calendar_today
                    </span>
                </div>
            </div>
            <div
                class="relative group bg-surface-container-lowest p-4 rounded-3xl shadow-[0px_8px_20px_rgba(0,62,199,0.03)] border border-outline-variant/15 transition-all hover:bg-surface-bright focus-within:ring-2 focus-within:ring-primary/20">

                <!-- Label -->
                <span class="text-[10px] uppercase tracking-widest font-bold text-primary mb-1 block">
                    Sampai
                </span>

                <!-- Input Wrapper -->
                <div class="flex items-center gap-2">
                    <!-- Input Date disesuaikan agar mengisi ruang dan transparan -->
                    <input type="date" v-model="utils.endDate"
                        class="flex-1 w-full text-sm font-bold uppercase bg-transparent border-0 outline-none appearance-none cursor-pointer text-on-surface" />

                    <!-- Ikon Kalender -->
                    <span class="text-xl pointer-events-none material-symbols-outlined text-primary shrink-0"
                        style="font-variation-settings: 'FILL' 1">
                        calendar_today
                    </span>
                </div>
            </div>
            <div>
                <button type="submit">Filter</button>
            </div>
            <!-- PRODUCT FILTER (Sudah disesuaikan agar seragam) -->
            {{-- <div
                class="relative group bg-surface-container-lowest p-4 rounded-3xl shadow-[0px_8px_20px_rgba(0,62,199,0.03)] border border-outline-variant/15 transition-all hover:bg-surface-bright cursor-pointer">

                <span class="text-[10px] uppercase tracking-widest font-bold text-primary mb-1 block">
                    Product Type
                </span>

                <div class="flex items-center justify-between gap-2">
                    <span class="text-sm font-bold text-on-surface">All Assets</span>
                    <span class="text-xl material-symbols-outlined text-primary shrink-0"
                        style="font-variation-settings: 'FILL' 1">
                        filter_list
                    </span>
                </div>
            </div> --}}
        </div>
        <!-- Transaction List -->
        <div class="space-y-6">
            <!-- Day Divider -->
            <div class="flex items-center gap-4">
                <span class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-outline">Today</span>
                <div class="h-[1px] flex-grow bg-outline-variant/20"></div>
            </div>
            <div v-if="modalShower.isLoadingTransactions" class="flex justify-center py-4">
                <img src="{{ url('assets/img/icons/loading1.gif') }}" class="w-20 h-20" alt="Loading...">
            </div>
            <div v-else-if="!dataTransactions" class="flex flex-col items-center gap-3 py-10">
                <span class="text-4xl material-symbols-outlined text-on-surface-variant">receipt_long</span>
                <p class="text-sm font-medium text-on-surface-variant">No transactions found for the selected period.
                </p>
            </div>
            <div v-else v-for="item in dataTransactions">
                <!-- Transaction Item: Success -->
                <div class="flex items-center active:scale-[0.98] justify-between p-4 transition-colors bg-surface-container-lowest rounded-3xl hover:bg-surface-bright"
                    @click="getDetailTransaction(item.reference_number)">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-blue-50">
                            <span class="material-symbols-outlined text-primary"
                                v-if="item.status_code=='00'">check_circle</span>
                            <span class="text-yellow-500 material-symbols-outlined"
                                v-else-if="item.status_code=='02'">autorenew</span>
                            <span class="text-red-500 material-symbols-outlined" v-else>cancel</span>
                        </div>
                        <div>
                            <p class="font-bold font-headline text-on-surface">@{{ item.product_name }} |
                                @{{item.customer_id}}
                            </p>
                            <p class="text-xs text-on-surface-variant">@{{$format.formatTanggal(item.updated_at)}}
                            </p>
                        </div>
                    </div>

                    <p class="font-bold font-headline text-primary " v-if="item.status_code=='00'">
                        @{{$format.formatCurrency(item.product_price)}}</p>
                    <p class="font-bold text-yellow-500 font-headline" v-else-if="item.status_code=='02'">
                        @{{$format.formatCurrency(item.product_price)}}</p>
                    <p class="font-bold text-red-500 font-headline" v-else>
                        @{{$format.formatCurrency(item.product_price)}}
                    </p>
                </div>
            </div>
            <!-- Transaction Item: Pending -->
            {{-- <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div
                    class="flex items-center justify-center w-12 h-12 rounded-2xl bg-secondary-container/20 text-secondary">
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">External Transfer</span>
                        <span class="font-extrabold font-headline text-on-surface">+$2,450.00</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-99102</span>
                        <span
                            class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-[10px] font-bold uppercase tracking-wider">Pending</span>
                    </div>
                </div>
            </div> --}}
            {{--
            <!-- Day Divider -->
            <div class="flex items-center gap-4 pt-4">
                <span class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-outline">Yesterday</span>
                <div class="h-[1px] flex-grow bg-outline-variant/20"></div>
            </div>
            <!-- Transaction Item: Failed -->
            <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-error-container/30 text-error">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">error_med</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">Subscription: Cloud</span>
                        <span class="font-extrabold font-headline text-on-surface">-$15.99</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-77211</span>
                        <span
                            class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-[10px] font-bold uppercase tracking-wider">Failed</span>
                    </div>
                </div>
            </div>
            <!-- Transaction Item: Success -->
            <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-primary-fixed/30 text-primary">
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 1;">shopping_bag</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">Starbucks Reserve</span>
                        <span class="font-extrabold font-headline text-on-surface">-$8.50</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-33451</span>
                        <span
                            class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Success</span>
                    </div>
                </div>
            </div>
            <!-- Transaction Item: Success -->
            <div
                class="bg-surface-container-lowest p-5 rounded-[2rem] flex items-center gap-4 transition-colors hover:bg-surface-bright active:scale-[0.98] duration-200">
                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-tertiary-fixed/40 text-tertiary">
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 1;">currency_bitcoin</span>
                </div>
                <div class="flex-grow">
                    <div class="flex items-start justify-between mb-1">
                        <span class="font-bold font-headline text-on-surface">Crypto Exchange Buy</span>
                        <span class="font-extrabold font-headline text-on-surface">-$500.00</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono text-xs font-medium tracking-tighter uppercase text-on-surface-variant">ID:
                            TXN-11029</span>
                        <span
                            class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Success</span>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>
</div>