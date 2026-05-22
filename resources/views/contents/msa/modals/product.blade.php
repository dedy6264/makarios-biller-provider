<div v-if="modalShower.isProductDetail">
    <main class="max-w-2xl px-6 pt-24 pb-32 mx-auto">
        <!-- Input Section: The Liquid Architect Style -->
        <section class="mb-10">
            <div class="flex flex-col gap-2">
                <label class="ml-1 text-sm font-medium text-on-surface-variant">Customer ID or Phone Number</label>
                <div class="relative group">
                    <input v-model="customerId"
                        class="w-full h-16 px-6 bg-surface-container-lowest border-none rounded-2xl shadow-sm text-lg font-headline font-semibold text-on-surface placeholder:text-outline/40 focus:ring-0 transition-all outline outline-[1.5px] outline-outline-variant/15 focus:outline-primary/40"
                        placeholder="e.g. 081234567890" type="text" autofocus />
                    <div class="absolute flex items-center gap-2 -translate-y-1/2 right-4 top-1/2">
                        <button
                            class="p-2 transition-all text-primary hover:bg-primary-container/10 rounded-xl active:scale-95">
                            <span class="material-symbols-outlined" data-icon="contact_page">contact_page</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Bento Grid -->
        <section>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-extrabold font-headline text-on-surface">Available Products</h2>
                <span class="text-xs font-bold tracking-widest uppercase font-label text-primary">Popular Choice</span>
            </div>

            <div class="grid grid-cols-3 gap-5 md:grid-cols-3" v-if="dataProducts">
                <!-- Telkomsel Pulsa -->
                <div v-for="item in dataProducts"
                    class="group bg-surface-container-lowest p-6 rounded-[2rem] flex flex-col items-center justify-center gap-4 transition-all hover:bg-surface-bright active:scale-[0.98] cursor-pointer"
                    @click="!modalShower.isProductDisable && inquiry(item.product_code)">
                    <div
                        class="flex items-center justify-center shadow-lg w-14 h-14 rounded-2xl bg-gradient-to-br from-red-500 to-blue-500 shadow-red-500/20">
                        <span class="text-3xl text-white material-symbols-outlined" data-icon="signal_cellular_alt"
                            style="font-variation-settings: 'FILL' 1;">signal_cellular_alt</span>
                    </div>
                    <span
                        class="text-sm font-bold text-center font-headline text-on-surface">@{{item.product_name}}</span>
                </div>
                <!-- Indosat Data -->
                {{-- <div
                    class="group bg-surface-container-lowest p-6 rounded-[2rem] flex flex-col items-center justify-center gap-4 transition-all hover:bg-surface-bright active:scale-[0.98] cursor-pointer">
                    <div
                        class="flex items-center justify-center shadow-lg w-14 h-14 rounded-2xl bg-gradient-to-br from-yellow-400 to-orange-500 shadow-orange-500/20">
                        <span class="text-3xl text-white material-symbols-outlined" data-icon="data_usage"
                            style="font-variation-settings: 'FILL' 1;">data_usage</span>
                    </div>
                    <span class="text-sm font-bold text-center font-headline text-on-surface">Indosat Data</span>
                </div>
                <!-- PLN Token -->
                <div
                    class="group bg-surface-container-lowest p-6 rounded-[2rem] flex flex-col items-center justify-center gap-4 transition-all hover:bg-surface-bright active:scale-[0.98] cursor-pointer">
                    <div
                        class="flex items-center justify-center shadow-lg w-14 h-14 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-500 shadow-blue-500/20">
                        <span class="text-3xl text-white material-symbols-outlined" data-icon="bolt"
                            style="font-variation-settings: 'FILL' 1;">bolt</span>
                    </div>
                    <span class="text-sm font-bold text-center font-headline text-on-surface">PLN Token</span>
                </div>
                <!-- Steam Voucher -->
                <div
                    class="group bg-surface-container-lowest p-6 rounded-[2rem] flex flex-col items-center justify-center gap-4 transition-all hover:bg-surface-bright active:scale-[0.98] cursor-pointer">
                    <div
                        class="flex items-center justify-center shadow-lg w-14 h-14 rounded-2xl bg-gradient-to-br from-slate-700 to-slate-900 shadow-slate-900/20">
                        <span class="text-3xl text-white material-symbols-outlined" data-icon="sports_esports"
                            style="font-variation-settings: 'FILL' 1;">sports_esports</span>
                    </div>
                    <span class="text-sm font-bold text-center font-headline text-on-surface">Steam Voucher</span>
                </div>
                <!-- MLBB Diamonds -->
                <div
                    class="group bg-surface-container-lowest p-6 rounded-[2rem] flex flex-col items-center justify-center gap-4 transition-all hover:bg-surface-bright active:scale-[0.98] cursor-pointer">
                    <div
                        class="flex items-center justify-center shadow-lg w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500 to-blue-600 shadow-blue-600/20">
                        <span class="text-3xl text-white material-symbols-outlined" data-icon="diamond"
                            style="font-variation-settings: 'FILL' 1;">diamond</span>
                    </div>
                    <span class="text-sm font-bold text-center font-headline text-on-surface">MLBB Diamonds</span>
                </div>
                <!-- Genshin Crystals -->
                <div
                    class="group bg-surface-container-lowest p-6 rounded-[2rem] flex flex-col items-center justify-center gap-4 transition-all hover:bg-surface-bright active:scale-[0.98] cursor-pointer">
                    <div
                        class="flex items-center justify-center shadow-lg w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-300 to-indigo-500 shadow-indigo-500/20">
                        <span class="text-3xl text-white material-symbols-outlined" data-icon="auto_awesome"
                            style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
                    </div>
                    <span class="text-sm font-bold text-center font-headline text-on-surface">Genshin Crystals</span>
                </div> --}}
            </div>
            {{-- <div class="scale-[2] flex items-center justify-center" v-if="dataProducts.length==0">
                <span class="text-gray-200 material-symbols-outlined">
                    barcode_reader
                </span>
                <p class="text-gray-200">Temukan produk yang kamu cari</p>
            </div> --}}


        </section>
        <!-- Promotional Area (Liquid Architect Twist) -->
        <section class="mt-10 mb-8">
            <div class="relative overflow-hidden rounded-[2.5rem] bg-primary-container p-8 text-on-primary-container">
                <div class="relative z-10">
                    <span
                        class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-bold uppercase tracking-wider mb-3">Limited
                        Offer</span>
                    <h3 class="mb-2 text-2xl font-extrabold leading-tight font-headline">Cashback 20% on<br />Game
                        Top-ups</h3>
                    <p class="text-on-primary-container/80 text-sm max-w-[200px]">Unlock better value with Viller Pay
                        digital wallet.</p>
                </div>
                <!-- Abstract visual element -->
                <div class="absolute w-48 h-48 rounded-full -right-10 -bottom-10 bg-white/10 blur-3xl"></div>
                <div class="absolute -translate-y-1/2 right-6 top-1/2 opacity-20">
                    <span class="material-symbols-outlined text-[120px]" data-icon="payments">payments</span>
                </div>
            </div>
        </section>
    </main>
</div>