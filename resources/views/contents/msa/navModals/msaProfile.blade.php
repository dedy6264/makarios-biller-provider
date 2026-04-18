<div v-if="modalMsaProfile">
    <main class="max-w-2xl px-6 pt-32 pb-32 mx-auto">
        <!-- Profile Header Section (The Liquid Architect approach) -->
        <section class="flex flex-col items-center mb-12">
            <div class="relative mb-6 group">
                <div class="absolute inset-0 rounded-full bg-primary-container blur-2xl opacity-10"></div>
                <div
                    class="relative w-32 h-32 overflow-hidden border-4 rounded-full shadow-xl border-surface-container-lowest">
                    <img alt="Alex Rivera" class="object-cover w-full h-full"
                        data-alt="portrait of a confident young professional man with dark hair against a soft blurred architectural background, high-end photography"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5B4CLvhBg3ZBh3ZgvQk1rziYJTsIcGoHNqU3nBY0I3CStWWN6HPLU786d9dauOdnxPf4mq9Q0GvYqHaK8W9iyjrp51lXclqrBgDCw_5Np-skitfQKThut07dVMj1KIOUomyeEp6i4RKlK1jeADIGqmY9N6m-zlJ7YrXACsB77IosH5n9H03ghjRYx0cIcgxjD8rtGqNwqursknOEk-2YA5ydOckWaDm5VhxRwTfngxjRKU63IVbxpGVguOmExiUan96HaJn9G90ti" />
                </div>
                <div
                    class="absolute bottom-1 right-1 bg-primary text-white p-1.5 rounded-full border-2 border-white shadow-lg active:scale-90 transition-transform cursor-pointer">
                    <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                </div>
            </div>
            <img src="{{ url('assets/img/icons/loading.gif') }}" alt="" v-if="isLoadingProfile"
                class="tracking-tight font-headline">
            <h2 class="mb-1 text-3xl font-black tracking-tight text-on-surface" v-else>@{{
                dataProfile.merchant_outlet_name}}</h2>
            {{-- <div
                class="flex items-center gap-2 px-3 py-1 border rounded-full bg-secondary-container/20 border-secondary-container/10">
                <span class="material-symbols-outlined text-secondary text-[16px]" data-icon="verified"
                    style="font-variation-settings: 'FILL' 1;">verified</span>
                <span class="text-xs font-semibold tracking-wide uppercase text-secondary">Pro Member</span>
            </div> --}}
        </section>
        <!-- Stats Bento (High-end UI pattern) -->
        <section class="grid grid-cols-2 gap-4 mb-10">
            <div
                class="bg-surface-container-lowest p-5 rounded-2xl shadow-[0px_4px_16px_rgba(0,62,199,0.03)] border border-outline-variant/10">
                <p class="mb-1 text-xs font-medium text-on-surface-variant">Total Savings</p>
                <img src="{{ url('assets/img/icons/loading.gif') }}" alt="" v-if="isLoadingBalance"
                    class="tracking-tight font-headline">
                <h3 v-else class="text-xl font-bold text-primary"> @{{$format.formatCurrency(dataBalance)}}

                </h3>
            </div>
            <div
                class="bg-surface-container-lowest p-5 rounded-2xl shadow-[0px_4px_16px_rgba(0,62,199,0.03)] border border-outline-variant/10">
                <p class="mb-1 text-xs font-medium text-on-surface-variant">Loyalty Points</p>
                <h3 class="text-xl font-bold text-primary">12,480 pts</h3>
            </div>
        </section>
        <!-- Profile Options List (The Editorial Approach) -->
        <div class="space-y-10">
            <!-- Category: Account -->
            <div>
                <h4 class="text-on-surface-variant font-bold text-[10px] tracking-[0.1em] uppercase px-2 mb-4">Account
                    Overview
                </h4>
                <div
                    class="bg-surface-container-lowest rounded-[28px] overflow-hidden border border-outline-variant/5 shadow-sm">
                    <!-- Item -->
                    <button
                        class="w-full flex items-center justify-between px-6 py-5 hover:bg-surface-bright active:scale-[0.99] transition-all duration-200">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary/5">
                                <span class="material-symbols-outlined text-primary"
                                    data-icon="person_outline">person_outline</span>
                            </div>
                            <span class="font-semibold text-on-surface">Personal Information</span>
                        </div>
                        <span class="material-symbols-outlined text-outline-variant"
                            data-icon="chevron_right">chevron_right</span>
                    </button>
                    <!-- Item with sub-items -->
                    <div class="bg-surface-container-low/30">
                        <div class="flex items-center justify-between px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary/5">
                                    <span class="material-symbols-outlined text-primary"
                                        data-icon="shield">shield</span>
                                </div>
                                <span class="font-semibold text-on-surface">Security</span>
                            </div>
                        </div>
                        <div class="px-6 pb-4 space-y-3 ml-14">
                            <button class="flex items-center justify-between w-full py-2 text-left group">
                                <span
                                    class="text-sm transition-colors text-on-surface-variant group-hover:text-primary">Update
                                    Password</span>
                                <span
                                    class="material-symbols-outlined text-[18px] text-outline-variant opacity-0 group-hover:opacity-100 transition-opacity"
                                    data-icon="chevron_right">chevron_right</span>
                            </button>
                            <button class="flex items-center justify-between w-full py-2 text-left group">
                                <span
                                    class="text-sm transition-colors text-on-surface-variant group-hover:text-primary">Update
                                    PIN</span>
                                <span
                                    class="material-symbols-outlined text-[18px] text-outline-variant opacity-0 group-hover:opacity-100 transition-opacity"
                                    data-icon="chevron_right">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Category: Customization -->
            {{-- <div>
                <h4 class="text-on-surface-variant font-bold text-[10px] tracking-[0.1em] uppercase px-2 mb-4">
                    Experience
                </h4>
                <div
                    class="bg-surface-container-lowest rounded-[28px] overflow-hidden border border-outline-variant/5 shadow-sm">
                    <div class="bg-surface-container-low/30">
                        <div class="flex items-center justify-between px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary/5">
                                    <span class="material-symbols-outlined text-primary" data-icon="tune">tune</span>
                                </div>
                                <span class="font-semibold text-on-surface">Preferences</span>
                            </div>
                        </div>
                        <div class="px-6 pb-4 space-y-3 ml-14">
                            <button class="flex items-center justify-between w-full py-2">
                                <span class="text-sm text-on-surface-variant">Language</span>
                                <span class="px-2 py-1 text-xs font-bold rounded-lg text-primary bg-primary/10">English
                                    (US)</span>
                            </button>
                            <button class="flex items-center justify-between w-full py-2">
                                <span class="text-sm text-on-surface-variant">Notifications</span>
                                <div class="relative w-8 h-4 rounded-full bg-primary">
                                    <div class="absolute right-0.5 top-0.5 w-3 h-3 bg-white rounded-full"></div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Category: Support -->
            <div>
                <h4 class="text-on-surface-variant font-bold text-[10px] tracking-[0.1em] uppercase px-2 mb-4">Viller
                    Support
                </h4>
                <div
                    class="bg-surface-container-lowest rounded-[28px] overflow-hidden border border-outline-variant/5 shadow-sm">
                    <button
                        class="flex items-center justify-between w-full px-6 py-5 transition-all border-b hover:bg-surface-bright border-surface-container-low/50">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary/5">
                                <span class="material-symbols-outlined text-primary"
                                    data-icon="help_center">help_center</span>
                            </div>
                            <span class="font-semibold text-on-surface">Help Center</span>
                        </div>
                        <span class="material-symbols-outlined text-outline-variant"
                            data-icon="chevron_right">chevron_right</span>
                    </button>
                    <button
                        class="flex items-center justify-between w-full px-6 py-5 transition-all hover:bg-surface-bright">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary/5">
                                <span class="material-symbols-outlined text-primary" data-icon="mail">mail</span>
                            </div>
                            <span class="font-semibold text-on-surface">Contact Us</span>
                        </div>
                        <span class="material-symbols-outlined text-outline-variant"
                            data-icon="chevron_right">chevron_right</span>
                    </button>
                </div>
            </div>
            <div class="pt-4">
                <button @click="closeSession"
                    class="flex items-center justify-center w-full gap-2 py-4 font-bold transition-colors text-error hover:bg-error/5 rounded-2xl">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    Sign Out
                </button>
                <p class="text-center text-[10px] text-outline mt-6 font-medium tracking-widest">VILLER APP VERSION
                    4.2.1-PRO
                </p>
            </div>
        </div>
    </main>
</div>