<div class="fixed top-6 left-1/2 -translate-x-1/2 z-[100] w-[90%] max-w-sm">
    <transition enter-active-class="transition duration-500 ease-out"
        enter-from-class="transform scale-95 -translate-y-10 opacity-0"
        enter-to-class="transform scale-100 translate-y-0 opacity-100"
        leave-active-class="transition duration-300 ease-in" leave-from-class="scale-100 opacity-100"
        leave-to-class="scale-90 opacity-0">
        <div v-if="toast.show"
            class="relative overflow-hidden bg-white/80 backdrop-blur-xl border border-white/20 shadow-[0_20px_50px_rgba(0,0,0,0.1)] rounded-3xl p-4 flex items-center gap-4">

            <div :class="toast.type === 'error' ? 'bg-red-100 text-red-600' : 'bg-emerald-100 text-emerald-600'"
                class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-2xl">
                <span class="text-2xl material-symbols-outlined">
                    @{{ toast.type === 'error' ? 'error' : 'check_circle' }}
                </span>
            </div>

            <div class="flex-1">
                <h4 class="text-sm font-bold leading-tight text-zinc-900">@{{ toast.title }}</h4>
                <p class="text-xs text-zinc-500 mt-0.5">@{{ toast.message }}</p>
            </div>

            <div class="absolute bottom-0 left-0 w-full h-1 bg-zinc-200/50">
                <div :class="toast.type === 'error' ? 'bg-red-500' : 'bg-emerald-500'"
                    class="h-full transition-all duration-[3000ms] ease-linear"
                    :style="{ width: toast.progress + '%' }">
                </div>
            </div>
        </div>
    </transition>
</div>