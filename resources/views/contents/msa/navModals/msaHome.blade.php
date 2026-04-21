<div v-if="modalMsaHome">
    <main class="max-w-lg px-6 pt-24 pb-32 mx-auto space-y-8 ">
        <!--max-w-7xl-->
        <!-- Welcome Section -->
        <section class="space-y-1">
            <img src="{{ url('assets/img/icons/loading.gif') }}" alt="" v-if="isLoadingProfile"
                class="tracking-tight font-headline">
            <h2 v-else class="text-2xl font-bold tracking-tight font-headline text-on-surface">Welcome, @{{
                dataProfile.merchant_outlet_name}}</h2>
            <p class="text-sm font-medium text-on-surface-variant">Your financial summary for today</p>
        </section>
        <!-- Balance Card - Liquid Architect Style -->
        <section
            class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-primary to-primary-container p-8 shadow-xl">
            <div class="relative z-10 flex flex-col gap-6">
                <div class="flex items-start justify-between">
                    <div class="space-y-1">
                        <p
                            class="text-xs font-semibold tracking-widest uppercase text-on-primary-container/80 font-label">
                            Saving
                            Balance</p>
                        <img src="{{ url('assets/img/icons/loading.gif') }}" alt="" v-if="isLoadingBalance"
                            class="tracking-tight font-headline">
                        <h3 v-else class="text-4xl font-extrabold tracking-tight font-headline text-on-primary">
                            @{{$format.formatCurrency(dataBalance)}}
                        </h3>
                    </div>
                    <div class="p-3 bg-white/20 backdrop-blur-md rounded-2xl">
                        <span class="text-3xl material-symbols-outlined text-on-primary"
                            style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-emerald-400/20 px-3 py-1.5 rounded-full flex items-center gap-1.5">
                        <span class="text-sm material-symbols-outlined text-emerald-300">trending_up</span>
                        <span class="text-xs font-bold text-emerald-50">+2.4%</span>
                    </div>
                    <p class="text-xs font-medium text-on-primary-container/60">Last updated: 2 mins ago</p>
                </div>
            </div>
            <!-- Decorative Liquid Elements -->
            <div class="absolute w-48 h-48 rounded-full -right-12 -top-12 bg-white/10 blur-3xl"></div>
            <div class="absolute w-64 h-64 rounded-full -left-12 -bottom-12 bg-blue-400/10 blur-3xl"></div>
        </section>
        <!-- Shortcut Icons Grid -->
        <section class="space-y-6">
            <div class="flex items-end justify-between">
                <h4 class="text-lg font-bold font-headline text-on-surface">Quick Actions</h4>
                <button class="text-sm font-bold text-primary" ">View All</button>


        </div>
        <div class=" grid grid-cols-3 gap-6 md:grid-cols-6">
                    <!-- Top-Up -->
                    <div class="flex flex-col items-center gap-3 transition-all active:scale-95"
                        @click="productDetail('pulsa')">
                        <div
                            class="flex items-center justify-center w-16 h-16 shadow-sm rounded-2xl bg-surface-container-lowest text-primary-container">
                            <span class="text-3xl material-symbols-outlined">smartphone</span>
                        </div>
                        <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Mobile
                            Top-Up</span>
                    </div>
                    <!-- Electricity -->
                    <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
                        <div
                            class="flex items-center justify-center w-16 h-16 shadow-sm rounded-2xl bg-surface-container-lowest text-amber-500">
                            <span class="text-3xl material-symbols-outlined">bolt</span>
                        </div>
                        <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Electricity
                            Token</span>
                    </div>
                    <!-- Games -->
                    <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
                        <div
                            class="flex items-center justify-center w-16 h-16 text-purple-500 shadow-sm rounded-2xl bg-surface-container-lowest">
                            <span class="text-3xl material-symbols-outlined">sports_esports</span>
                        </div>
                        <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Game
                            Voucher</span>
                    </div>
                    <!-- Water -->
                    <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
                        <div
                            class="flex items-center justify-center w-16 h-16 text-blue-400 shadow-sm rounded-2xl bg-surface-container-lowest">
                            <span class="text-3xl material-symbols-outlined">water_drop</span>
                        </div>
                        <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Water
                            Bill</span>
                    </div>
                    <!-- Internet -->
                    <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
                        <div
                            class="flex items-center justify-center w-16 h-16 shadow-sm rounded-2xl bg-surface-container-lowest text-emerald-500">
                            <span class="text-3xl material-symbols-outlined">wifi</span>
                        </div>
                        <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Internet
                            Bill</span>
                    </div>
                    <!-- Tax -->
                    <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
                        <div
                            class="flex items-center justify-center w-16 h-16 shadow-sm rounded-2xl bg-surface-container-lowest text-rose-500">
                            <span class="text-3xl material-symbols-outlined">receipt_long</span>
                        </div>
                        <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Tax
                            Payment</span>
                    </div>
            </div>
        </section>
        <!-- Carousel Banner -->
        <section class="space-y-4">
            <h4 class="text-lg font-bold font-headline text-on-surface">Exclusive Offers</h4>
            <div class="flex gap-4 px-6 pb-4 -mx-6 overflow-x-auto hide-scrollbar">
                <!-- Slide 1 -->
                <div class="min-w-[85%] md:min-w-[400px] h-48 rounded-3xl overflow-hidden relative shadow-lg">
                    <img alt="Promo 1" class="object-cover w-full h-full"
                        data-alt="abstract fluid gradient background with vibrant blue and purple swirls and soft grain texture"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoIf-3BTqa8BoLFbhlGQcxcz1W4myHY5WvndX3_s_Yx5fV1GjVdAdycBFTgnFJwYf0oJppPtCZrmxajlaH-gh26-U8DcIRYd4Yob9KBzed7BQXf82HHbztVdZDbBhE19payCHE_lusnAD7raicjXm3yywFPKhiPnmpoleg3x3jIzjZXbrOT82dkHORJju3cYAwzoYoQvn0_jvRZp5Reu0hVJLYeuq2cLDWTrWXmNAgRE4zscd9--6VjH6P0jM8w8II6VSvA6KWGIrH" />
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-black/30">
                        <span
                            class="bg-primary text-on-primary text-[10px] font-bold uppercase w-fit px-2 py-0.5 rounded-full mb-2 tracking-widest">Promotion</span>
                        <h5 class="text-xl font-bold leading-tight text-white font-headline">Get 15% Cashback on
                            Electricity
                            Bill
                        </h5>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="min-w-[85%] md:min-w-[400px] h-48 rounded-3xl overflow-hidden relative shadow-lg">
                    <img alt="Promo 2" class="object-cover w-full h-full"
                        data-alt="high-end electronic gadgets on a clean minimalist surface with soft teal and blue ambient lighting"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcmprmn7JqRKHNbuYcKF2BSrZvLVcEsI6Ou9hzrHwlPb5l4ubBCXHOLCgf3iUC-IGiMi7Ec9Tt-BCcCJW0bey5cgOPm9htNl5YqolkKwEOkBfPG-Vh5pZtLsitzGsKGpW2-yLEQSmowBWDaADZHOGn8pm7DGHMmdsVPeoreTtwX4ZomXjl4mrJTKWDxkRS9lYvBBBJ8q1dbJjsQPovLidRhA5DlRLmDXdXoutj_8xFdvse458lDF4RPVSbnfKUY11QxpAgSqb7Tyjv" />
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-black/30">
                        <span
                            class="bg-emerald-500 text-white text-[10px] font-bold uppercase w-fit px-2 py-0.5 rounded-full mb-2 tracking-widest">Limited</span>
                        <h5 class="text-xl font-bold leading-tight text-white font-headline">New Game Vouchers: Up to
                            50% Off
                        </h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- Transactions Hint - No Border List -->
        <section class="space-y-6">
            <div class="flex items-end justify-between">
                <h4 class="text-lg font-bold font-headline text-on-surface">Recent Transactions</h4>
                <button class="text-sm font-bold text-success">See History</button>
            </div>
            <div v-if="isLoadingTransactions" class="flex justify-center py-4">
                <img src="{{ url('assets/img/icons/loading1.gif') }}" class="w-20 h-20" alt="Loading...">
            </div>
            <div v-else class="space-y-6" v-for=" item in dataTransactions">
                <!-- Item 1 -->
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
                            <p class="text-xs text-on-surface-variant">@{{$format.formatTanggal(item.updated_at)}}</p>
                        </div>
                    </div>

                    <p class="font-bold font-headline text-primary" v-if="item.status_code=='00'">
                        @{{$format.formatCurrency(item.product_price)}}</p>
                    <p class="font-bold text-yellow-500 font-headline" v-else-if="item.status_code=='02'">
                        @{{$format.formatCurrency(item.product_price)}}</p>
                    <p class="font-bold text-red-500 font-headline" v-else>
                        @{{$format.formatCurrency(item.product_price)}}
                    </p>
                </div>
                <!-- Item 2 -->
                {{-- <div
                    class="flex items-center justify-between p-4 transition-colors bg-surface-container-lowest rounded-3xl hover:bg-surface-bright">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-50">
                            <span class="material-symbols-outlined text-emerald-600">account_balance</span>
                        </div>
                        <div>
                            <p class="font-bold font-headline text-on-surface">Salary Deposit</p>
                            <p class="text-xs text-on-surface-variant">Yesterday, 04:00 PM</p>
                        </div>
                    </div>
                    <p class="font-bold font-headline text-emerald-600">+$3,200.00</p>
                </div> --}}
            </div>
        </section>
    </main>
</div>