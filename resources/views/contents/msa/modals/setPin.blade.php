<div v-if="modalShower.isSetPin" class="relative z-50">
    {{-- <div class="fixed inset-0 transition-opacity bg-gray-500/75 dark:bg-gray-900/80"
        @click="modalShower.isSetPin = false">
    </div> --}}

    <div class="fixed inset-0 transition-opacity bg-gray-900/60 backdrop-blur-sm"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex items-center justify-center min-h-full p-4 text-center sm:p-0">
            <div
                class="relative overflow-hidden text-left transition-all transform bg-white shadow-2xl rounded-2xl sm:my-8 sm:w-full sm:max-w-md dark:bg-gray-800">
                <div class="px-6 pt-8 pb-6 bg-white dark:bg-gray-800 ">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary/10">
                            <span class="text-4xl material-symbols-outlined text-primary">lock_person</span>
                        </div>

                        <div class="text-center">
                            <h3 class="text-xl font-extrabold text-gray-900 font-headline dark:text-white">
                                OTP Verifikasi
                            </h3>
                            <p class="mt-2 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                Untuk keamanan transaksi, masukkan 6 digit OTP yang dikirim ke whatsapp kamu. Jangan
                                bagikan OTP ini kepada siapapun.
                            </p>
                        </div>
                        @if(session('error'))
                        <div
                            class="px-4 py-3 mb-4 text-sm rounded-xl bg-error-container text-on-error-container font-label">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="w-full mt-8 space-y-4">
                            <div class="relative">
                                <input v-model="otp" type="text" inputmode="numeric" maxlength="6"
                                    class="w-full py-4 text-center text-2xl tracking-[1em] font-bold border-2 border-gray-100 rounded-xl focus:border-primary focus:ring-0 transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 px-6 pb-8 bg-white dark:bg-gray-800">
                    <button @click="confirm" :disabled="modalShower.isSetPinConfirmBtn"
                        class="w-full py-4 text-sm font-bold transition-all shadow-lg rounded-xl bg-primary text-on-primary hover:bg-primary/90 shadow-primary/20">
                        Konfirmasi OTP
                    </button>
                    {{-- <button @click="modalShower.isSetPin = false"
                        class="w-full py-3 text-sm font-bold text-gray-500 transition-all hover:text-gray-700 dark:text-gray-400 dark:hover:text-white">
                        Nanti Saja
                    </button> --}}
                </div>

            </div>
        </div>
    </div>
</div>