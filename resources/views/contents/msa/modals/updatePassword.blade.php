<div v-if="modalShower.isUpdatePassword">
    @include('contents.msa.modals.toast')
    <main class="max-w-2xl px-6 pt-24 pb-32 mx-auto">
        <!-- Form: Personal Information -->
        <section class="space-y-4">
            <div class="flex items-center justify-between px-1">
                <h2 class="font-headline font-bold text-sm uppercase tracking-[0.1em] text-on-surface-variant">Update
                    Password</h2>
            </div>
            <div
                class="space-y-4 bg-surface-container-lowest rounded-xl p-4 shadow-[0px_12px_32px_rgba(0,62,199,0.04)]">

                <!-- Current Password -->
                <div class="space-y-1.5 opacity-80">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Current
                        Password</label>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary"
                            data-icon="location_on">location_on</span>
                        <input
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface font-medium focus:ring-2 focus:ring-primary/20 transition-all viller-input"
                            name="outlet_name" type="text" v-model="dataUpdatePassword.currentPassword" />
                    </div>
                </div>
                <!-- New Password -->
                <div class="space-y-1.5 opacity-80">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">New Password</label>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary"
                            data-icon="location_on">location_on</span>
                        <input
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface font-medium focus:ring-2 focus:ring-primary/20 transition-all viller-input"
                            name="outlet_name" type="text" v-model="dataUpdatePassword.newPassword" />
                    </div>
                </div>
                <!-- Re Type Password -->
                <div class="space-y-1.5 opacity-80">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-outline px-1">Retype
                        Password</label>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary"
                            data-icon="location_on">location_on</span>
                        <input
                            class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface font-medium focus:ring-2 focus:ring-primary/20 transition-all viller-input"
                            name="outlet_name" type="text" v-model="dataUpdatePassword.retypeNewPassword" />
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Action -->
        <div class="pt-6">
            <button @click="updatePassword"
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