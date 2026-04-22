<div v-if=modalShower.isModalPin>
    {{-- <main class="flex flex-col items-center flex-1 w-full max-w-md px-8 pt-24 pb-12"> --}}
        <main class="max-w-md px-6 pt-32 pb-32 mx-auto">
            <!-- Brand/Identity Lockup -->
            <div class="mb-10 text-center">
                <p class="text-sm font-medium text-on-surface-variant">Please enter your secure PIN to authorize this
                    transfer.</p>
                @include('contents.msa.modals.toast')
            </div>
            <!-- PIN Input Visualization -->
            <div class="flex gap-3 mb-6">
                <div v-for="i in pinLimit" :key="i"
                    class="flex items-center justify-center w-12 h-12 transition-all duration-200 border-2 shadow-sm rounded-xl"
                    :class="pin.length >= i 
                ? 'bg-surface-container-lowest border-primary-container' 
                : 'bg-surface-container-lowest border-outline-variant/30'">

                    <div class="w-3 h-3 transition-all duration-200 rounded-full"
                        :class="pin.length >= i ? 'bg-primary-container scale-110' : 'bg-surface-variant'">
                    </div>
                </div>
            </div>
            <!-- Numeric Keypad -->
            <div class="grid grid-cols-3 gap-6 w-full max-w-[320px] mb-6">
                <button v-for="n in [1,2,3,4,5,6,7,8,9]" :key="n" @click="addNumber(n)"
                    class="aspect-square rounded-full bg-surface-container-lowest text-2xl font-headline font-bold text-on-surface flex items-center justify-center shadow-[0px_4px_12px_rgba(0,62,199,0.04)] active:scale-90 transition-transform duration-150">
                    @{{ n }}
                </button>

                <div class="aspect-square"></div>
                <button @click="addNumber(0)"
                    class="aspect-square rounded-full bg-surface-container-lowest text-2xl font-headline font-bold text-on-surface flex items-center justify-center shadow-[0px_4px_12px_rgba(0,62,199,0.04)] active:scale-90 transition-transform duration-150">
                    0
                </button>
                <button @click="deleteNumber"
                    class="aspect-square rounded-full bg-surface-container-lowest text-on-surface-variant flex items-center justify-center shadow-[0px_4px_12px_rgba(0,62,199,0.04)] active:scale-90 transition-transform duration-150">
                    <span class="text-3xl material-symbols-outlined">backspace</span>
                </button>
            </div>
            <!-- Secondary Action -->
            <button
                class="mb-10 text-sm font-semibold transition-opacity text-primary-container hover:opacity-80 active:scale-95">
                Forgot PIN?
            </button>
            <!-- Primary Action -->
            <div class="fixed bottom-0 left-0 z-50 w-full px-6 pt-4 pb-10 bg-white/70 backdrop-blur-xl">
                <button @click="confirmPin" :disabled="pin.length !== pinLimit"
                    class="w-full h-14 rounded-2xl font-headline z-50 font-bold text-lg shadow-[0px_12px_32px_rgba(0,62,199,0.15)] active:scale-[0.98] transition-all duration-300"
                    :class="pin.length === pinLimit 
            ? 'bg-gradient-to-br from-primary to-primary-container text-white opacity-100' 
            : 'bg-slate-200 text-slate-400 cursor-not-allowed opacity-50'">
                    Confirm
                </button>
            </div>
        </main>
</div>