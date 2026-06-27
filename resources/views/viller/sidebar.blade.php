<nav id="sidebar" class="w-[280px] h-screen fixed left-0 top-0 bg-surface shadow-sm z-50 flex flex-col py-unit px-gutter -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Brand -->
    <div class="flex items-center justify-between mt-6 mb-8 px-4">
        <div class="flex items-center gap-3 min-w-0">
            <div
                class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-container text-on-primary-container shrink-0">
                <span class="material-symbols-outlined text-headline-lg"
                    data-icon="settings_suggest">settings_suggest</span>
            </div>
            <div class="min-w-0">
                <h2 class="font-bold leading-none truncate font-headline-lg text-headline-lg text-primary">ConfigCenter</h2>
                <p class="mt-1 font-label-caps text-label-caps text-secondary truncate">System Admin</p>
            </div>
        </div>
        <!-- Close Sidebar Button (Mobile Only) -->
        <button id="close-sidebar" class="lg:hidden p-1.5 rounded-full text-secondary hover:bg-surface-container hover:text-primary transition-colors focus:outline-none shrink-0" aria-label="Close Sidebar">
            <span class="material-symbols-outlined text-[20px]">close</span>
        </button>
    </div>
    <!-- Navigation Links -->
    <div class="flex-1 pt-4 space-y-1 overflow-y-auto">
        <!-- Active Tab -->
        <a class="flex items-center gap-3 px-4 py-3 transition-all duration-150 rounded-xl {{ session('activeMenu') === 'Dashboard' ? 'font-bold scale-95 border-r-4 text-primary border-primary bg-surface-container-low' : 'text-secondary hover:bg-surface-container' }}"
            href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined" data-icon="dashboard" data-weight="{{ session('activeMenu') === 'Dashboard' ? 'fill' : 'normal' }}"
                style="font-variation-settings: 'FILL' {{ session('activeMenu') === 'Dashboard' ? '1' : '0' }};">dashboard</span>
            <span class="font-body-md text-body-md">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 transition-all duration-150 rounded-xl {{ in_array(session('activeMenu'), ['User', 'Role', 'User Role']) ? 'font-bold scale-95 border-r-4 text-primary border-primary bg-surface-container-low' : 'text-secondary hover:bg-surface-container' }}"
            href="{{ route('users.index') }}">
            <span class="material-symbols-outlined" data-icon="group"
                style="font-variation-settings: 'FILL' {{ in_array(session('activeMenu'), ['User', 'Role', 'User Role']) ? '1' : '0' }};">group</span>
            <span class="font-body-md text-body-md">User Management</span>
        </a>
        <div class="flex flex-col gap-1 mt-1 mb-2 ml-10">
            <a href="{{ route('users.index') }}"
                class="flex items-center py-2 font-semibold transition-colors {{ session('activeMenu') === 'User' ? 'text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                <span class="">Users</span>
            </a>
            <a href="{{ route('roles.index') }}"
                class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Role' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                <span class="">Roles</span>
            </a>
            <a href="{{ route('user_roles.index') }}"
                class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'User Role' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                <span class="">User Roles</span>
            </a>
        </div>
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
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit"
                class="flex items-center w-full gap-3 px-4 py-3 transition-colors rounded-xl text-on-surface-variant hover:bg-surface-container">
                <span class="material-symbols-outlined" data-icon="logout"
                    style="font-variation-settings: 'FILL' 0;">logout</span>
                <span class="font-body-md text-body-md">Sign Out</span>
            </button>
        </form>
    </div>
</nav>
