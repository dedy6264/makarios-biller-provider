<nav class="w-[280px] h-screen fixed left-0 top-0 bg-surface shadow-sm z-50 flex flex-col py-unit px-gutter">
    <!-- Brand -->
    <div class="flex items-center gap-3 px-4 mt-6 mb-8">
        <div
            class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-container text-on-primary-container shrink-0">
            <span class="material-symbols-outlined text-headline-lg"
                data-icon="settings_suggest">settings_suggest</span>
        </div>
        <div>
            <h2 class="font-bold leading-none truncate font-headline-lg text-headline-lg text-primary">ConfigCenter
            </h2>
            <p class="mt-1 font-label-caps text-label-caps text-secondary">System Admin</p>
        </div>
    </div>
    <!-- Navigation Links -->
    <div class="flex-1 pt-4 space-y-1 overflow-y-auto">
        <!-- Active Tab -->
        <a class="flex items-center gap-3 px-4 py-3 font-bold transition-transform duration-150 scale-95 border-r-4 rounded-xl text-primary border-primary bg-surface-container-low"
            href="#">
            <span class="material-symbols-outlined" data-icon="dashboard" data-weight="fill"
                style="font-variation-settings: 'FILL' 1;">dashboard</span>
            <span class="font-body-md text-body-md">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl text-secondary hover:bg-surface-container"
            href="#">
            <span class="material-symbols-outlined" data-icon="group"
                style="font-variation-settings: 'FILL' 0;">group</span>
            <span class="font-body-md text-body-md">User Management</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl text-secondary hover:bg-surface-container"
            href="#">
            <span class="material-symbols-outlined" data-icon="account_tree"
                style="font-variation-settings: 'FILL' 0;">account_tree</span>
            <span class="font-body-md text-body-md">Hierarchy</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl text-secondary hover:bg-surface-container"
            href="#">
            <span class="material-symbols-outlined" data-icon="settings"
                style="font-variation-settings: 'FILL' 0;">settings</span>
            <span class="font-body-md text-body-md">Settings</span>
        </a>
    </div>
    <!-- Bottom Action -->
    <div class="pt-6 pb-4 mt-auto border-t border-outline-variant/30">
        <button
            class="flex items-center w-full gap-3 px-4 py-3 transition-colors rounded-xl text-on-surface-variant hover:bg-surface-container">
            <span class="material-symbols-outlined" data-icon="logout"
                style="font-variation-settings: 'FILL' 0;">logout</span>
            <span class="font-body-md text-body-md">Sign Out</span>
        </button>
    </div>
</nav>