<transition enter-active-class="transition duration-300 ease-out" enter-from-class="transform -translate-y-2 opacity-0"
    enter-to-class="transform translate-y-0 opacity-100" leave-active-class="transition duration-200 ease-in"
    leave-from-class="transform translate-y-0 opacity-100" leave-to-class="transform -translate-y-2 opacity-0">
    <div v-if="isAllertSuccess" class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500"
        role="alert">
        <p class="font-bold">@{{ allertText }}</p>
    </div>
</transition>