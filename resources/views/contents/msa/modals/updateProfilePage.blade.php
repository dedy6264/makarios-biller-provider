<div v-if="modalShower.isUpdateProfile">
    @include('contents.msa.modals.toast')
    <main class="max-w-2xl px-6 pt-24 pb-32 mx-auto">
        <!-- Form: Personal Information -->
        <section class="space-y-4">
            <div class="flex items-center justify-between px-1">
                <h2 class="font-headline font-bold text-sm uppercase tracking-[0.1em] text-on-surface-variant">Personal
                    Information</h2>
            </div>
            <div
                class="space-y-4 bg-surface-container-lowest rounded-xl p-4 shadow-[0px_12px_32px_rgba(0,62,199,0.04)]">
                <!-- Full Name -->
                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Full Name</label>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary"
                            data-icon="person">person</span>
                        <input
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-highest/40 border-none rounded-xl text-on-surface-variant font-medium cursor-not-allowed"
                            type="text" v-model="dataUpdateProfile.cifName" readonly />
                        <span
                            class="absolute text-sm -translate-y-1/2 material-symbols-outlined right-4 top-1/2 text-outline-variant"
                            data-icon="lock">lock</span>
                    </div>
                </div>

                <!-- Outlet Name -->
                <div class="space-y-1.5 opacity-80">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Tax ID /
                        SSN</label>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary"
                            data-icon="location_on">location_on</span>
                        <input
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface font-medium focus:ring-2 focus:ring-primary/20 transition-all viller-input"
                            name="outlet_name" type="text" v-model="dataUpdateProfile.outletName" />
                    </div>
                </div>

                <!-- Date of Birth -->
                {{-- <div class="space-y-1.5">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Date of
                        Birth</label>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary"
                            data-icon="calendar_today">calendar_today</span>
                        <input
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface font-medium focus:ring-2 focus:ring-primary/20 transition-all viller-input"
                            type="text" value="March 12, 1992" readonly />
                        <span
                            class="absolute -translate-y-1/2 material-symbols-outlined right-4 top-1/2 text-outline-variant"
                            data-icon="expand_more">expand_more</span>
                    </div>
                </div> --}}
                <!-- ID Number (Masked/Read-only style) -->
                {{-- <div class="space-y-1.5 opacity-80">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Tax ID / SSN</label>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary"
                            data-icon="fingerprint">fingerprint</span>
                        <input
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-highest/40 border-none rounded-xl text-on-surface-variant font-medium cursor-not-allowed"
                            disabled="" type="text" value="•••• •••• 4821" />
                        <span
                            class="absolute text-sm -translate-y-1/2 material-symbols-outlined right-4 top-1/2 text-outline-variant"
                            data-icon="lock">lock</span>
                    </div>
                </div> --}}
            </div>
        </section>
        {{--
        <!-- Form: Contact Details -->
        <section class="space-y-4">
            <div class="flex items-center justify-between px-1">
                <h2 class="font-headline font-bold text-sm uppercase tracking-[0.1em] text-on-surface-variant">Contact
                    Details</h2>
            </div>
            <div
                class="space-y-4 bg-surface-container-lowest rounded-xl p-4 shadow-[0px_12px_32px_rgba(0,62,199,0.04)]">
                <!-- Email -->
                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Email
                        Address</label>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary"
                            data-icon="mail">mail</span>
                        <input
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface font-medium focus:ring-2 focus:ring-primary/20 transition-all viller-input"
                            type="email" value="elena.rod@viller.com" />
                    </div>
                </div>
                <!-- Phone -->
                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Phone Number</label>
                    <div
                        class="relative flex items-center bg-surface-container-low rounded-xl px-4 py-3.5 focus-within:ring-2 focus-within:ring-primary/20 transition-all">
                        <span class="mr-3 material-symbols-outlined text-primary" data-icon="call">call</span>
                        <span class="pr-3 mr-3 font-medium border-r text-on-surface border-outline-variant">+1</span>
                        <input class="w-full p-0 font-medium bg-transparent border-none focus:ring-0 text-on-surface"
                            type="tel" value="(555) 0123-4567" />
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Form: Residential Address -->
        <section class="space-y-4">
            <div class="flex items-center justify-between px-1">
                <h2 class="font-headline font-bold text-sm uppercase tracking-[0.1em] text-on-surface-variant">
                    Residential Address</h2>
            </div>
            <div class="bg-surface-container-lowest rounded-xl p-4 shadow-[0px_12px_32px_rgba(0,62,199,0.04)]">
                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Current
                        Residence</label>
                    <div class="relative">
                        <span class="absolute material-symbols-outlined left-4 top-4 text-primary"
                            data-icon="location_on">location_on</span>
                        <textarea readonly
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface font-medium focus:ring-2 focus:ring-primary/20 transition-all viller-input resize-none"
                            rows="3">7224 Skyline Boulevard
Apartment 4B
New York, NY 10012</textarea>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Action -->
        <div class="pt-6">
            <button @click="updateProfile"
                class="w-full bg-gradient-to-br from-primary to-primary-container text-white font-headline font-bold py-5 rounded-2xl shadow-[0px_8px_24px_rgba(0,62,199,0.25)] hover:opacity-90 active:scale-95 transition-all flex items-center justify-center space-x-3 group">
                <span>Save Changes</span>
                <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform"
                    data-icon="arrow_forward">arrow_forward</span>
            </button>
            <p class="px-8 mt-6 text-xs leading-relaxed text-center text-outline">
                By saving, you verify that all provided information is accurate and reflects your legal identity.
            </p>
        </div>
    </main>
</div>