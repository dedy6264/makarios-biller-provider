<nav id="sidebar"
    class="w-[280px] h-screen fixed left-0 top-0 bg-surface shadow-sm z-50 flex flex-col py-unit px-gutter -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="flex items-center justify-between px-4 mt-6 mb-8">
        <div class="flex items-center min-w-0 gap-3">
            <div
                class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-container text-on-primary-container shrink-0">
                <span class="material-symbols-outlined text-headline-lg"
                    data-icon="settings_suggest">settings_suggest</span>
            </div>
            <div class="min-w-0">
                <h2 class="font-bold leading-none truncate font-headline-lg text-headline-lg text-primary">ConfigCenter
                </h2>
                <p class="mt-1 truncate font-label-caps text-label-caps text-secondary">System Admin</p>
            </div>
        </div>
        <button id="close-sidebar"
            class="lg:hidden p-1.5 rounded-full text-secondary hover:bg-surface-container hover:text-primary transition-colors focus:outline-none shrink-0"
            aria-label="Close Sidebar">
            <span class="material-symbols-outlined text-[20px]">close</span>
        </button>
    </div>

    <div class="flex-1 pt-4 space-y-1 overflow-y-auto">
        <a class="flex items-center gap-3 px-4 py-3 transition-all duration-150 rounded-xl {{ session('activeMenu') === 'Dashboard' ? 'font-bold scale-95 border-r-4 text-primary border-primary bg-surface-container-low' : 'text-secondary hover:bg-surface-container' }}"
            href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined" data-icon="dashboard"
                style="font-variation-settings: 'FILL' {{ session('activeMenu') === 'Dashboard' ? '1' : '0' }};">dashboard</span>
            <span class="flex-1 font-body-md text-body-md">Dashboard</span>
        </a>

        @php
        $isUserActive = in_array(session('activeMenu'), ['User', 'Role', 'User Role']);
        @endphp
        <div class="flex flex-col">
            <button
                class="menu-toggle flex items-center justify-between gap-3 px-4 py-3 w-full transition-all duration-150 rounded-xl text-left focus:outline-none {{ $isUserActive ? 'font-bold text-primary bg-surface-container-low border-r-4 border-primary' : 'text-secondary hover:bg-surface-container' }}"
                data-target="submenu-user">
                <div class="flex items-center min-w-0 gap-3">
                    <span class="material-symbols-outlined" data-icon="group"
                        style="font-variation-settings: 'FILL' {{ $isUserActive ? '1' : '0' }};">group</span>
                    <span class="truncate font-body-md text-body-md">User Management</span>
                </div>
                <span
                    class="material-symbols-outlined transform transition-transform duration-200 text-[18px] shrink-0 {{ $isUserActive ? 'rotate-180' : '' }}">expand_more</span>
            </button>

            <div id="submenu-user"
                class="grid transition-all duration-200 ease-in-out {{ $isUserActive ? 'grid-rows-[1fr] opacity-100 mt-1 mb-2' : 'grid-rows-[0fr] opacity-0 pointer-events-none' }}">
                <div class="overflow-hidden pl-11 flex flex-col gap-0.5">
                    <a href="{{ route('users.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'User' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Users</span>
                    </a>
                    <a href="{{ route('roles.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Role' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Roles</span>
                    </a>
                    <a href="{{ route('user_roles.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'User Role' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>User Roles</span>
                    </a>
                </div>
            </div>
        </div>

        @php
        $isProductActive = in_array(session('activeMenu'), ['Product Types', 'Product Categories', 'Products',
        'Providers', 'Product Providers', 'Product References', 'Segments', 'Product Segments']);
        @endphp
        <div class="flex flex-col">
            <button
                class="menu-toggle flex items-center justify-between gap-3 px-4 py-3 w-full transition-all duration-150 rounded-xl text-left focus:outline-none {{ $isProductActive ? 'font-bold text-primary bg-surface-container-low border-r-4 border-primary' : 'text-secondary hover:bg-surface-container' }}"
                data-target="submenu-product">
                <div class="flex items-center min-w-0 gap-3">
                    <span class="material-symbols-outlined" data-icon="inventory_2"
                        style="font-variation-settings: 'FILL' {{ $isProductActive ? '1' : '0' }};">inventory_2</span>
                    <span class="truncate font-body-md text-body-md">Product Management</span>
                </div>
                <span
                    class="material-symbols-outlined transform transition-transform duration-200 text-[18px] shrink-0 {{ $isProductActive ? 'rotate-180' : '' }}">expand_more</span>
            </button>

            <div id="submenu-product"
                class="grid transition-all duration-200 ease-in-out {{ $isProductActive ? 'grid-rows-[1fr] opacity-100 mt-1 mb-2' : 'grid-rows-[0fr] opacity-0 pointer-events-none' }}">
                <div class="overflow-hidden pl-11 flex flex-col gap-0.5">
                    <a href="{{ route('product_types.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Product Types' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Product Types</span>
                    </a>
                    <a href="{{ route('product_categories.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Product Categories' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Product Categories</span>
                    </a>
                    <a href="{{ route('product_references.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Product References' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Product References</span>
                    </a>
                    <a href="{{ route('products.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Products' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Products</span>
                    </a>
                    <a href="{{ route('providers.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Providers' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Providers</span>
                    </a>
                    <a href="{{ route('product_providers.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Product Providers' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Product Providers</span>
                    </a>
                    <a href="{{ route('segments.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Segments' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Segments</span>
                    </a>
                    <a href="{{ route('product_segments.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Product Segments' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Product Segments</span>
                    </a>
                </div>
            </div>
        </div>

        <a class="flex items-center gap-3 px-4 py-3 transition-all duration-150 rounded-xl {{ session('activeMenu') === 'Hierarchy' ? 'font-bold scale-95 border-r-4 text-primary border-primary bg-surface-container-low' : 'text-secondary hover:bg-surface-container' }}"
            href="{{ route('clients.index') }}">
            <span class="material-symbols-outlined" data-icon="account_tree"
                style="font-variation-settings: 'FILL' {{ session('activeMenu') === 'Hierarchy' ? '1' : '0' }};">account_tree</span>
            <span class="font-body-md text-body-md">Hierarchy</span>
        </a>
        @php
        $isAccountActive = in_array(session('activeMenu'), ['Accounts', 'Saving Accounts', 'Saving Transactions']);
        @endphp
        <div class="flex flex-col">
            <button
                class="menu-toggle flex items-center justify-between gap-3 px-4 py-3 w-full transition-all duration-150 rounded-xl text-left focus:outline-none {{ $isAccountActive ? 'font-bold text-primary bg-surface-container-low border-r-4 border-primary' : 'text-secondary hover:bg-surface-container' }}"
                data-target="submenu-account">
                <div class="flex items-center min-w-0 gap-3">
                    <span class="material-symbols-outlined" data-icon="inventory_2"
                        style="font-variation-settings: 'FILL' {{ $isAccountActive ? '1' : '0' }};">inventory_2</span>
                    <span class="truncate font-body-md text-body-md">Saving Management</span>
                </div>
                <span
                    class="material-symbols-outlined transform transition-transform duration-200 text-[18px] shrink-0 {{ $isAccountActive ? 'rotate-180' : '' }}">expand_more</span>
            </button>

            <div id="submenu-account"
                class="grid transition-all duration-200 ease-in-out {{ $isAccountActive ? 'grid-rows-[1fr] opacity-100 mt-1 mb-2' : 'grid-rows-[0fr] opacity-0 pointer-events-none' }}">
                <div class="overflow-hidden pl-11 flex flex-col gap-0.5">
                    <a href="{{ route('accounts.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Accounts' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Accounts</span>
                    </a>
                    <a href="{{ route('savings.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Saving Accounts' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Saving Accounts</span>
                    </a>
                    <a href="{{ route('saving_transactions.index') }}"
                        class="flex items-center py-2 transition-colors {{ session('activeMenu') === 'Saving Transactions' ? 'font-semibold text-primary' : 'text-secondary hover:text-primary' }} font-body-sm text-body-sm">
                        <span>Saving Transactions</span>
                    </a>
                </div>
            </div>
        </div>
        <a class="flex items-center gap-3 px-4 py-3 transition-all duration-150 rounded-xl {{ session('activeMenu') === 'Transactions' ? 'font-bold scale-95 border-r-4 text-primary border-primary bg-surface-container-low' : 'text-secondary hover:bg-surface-container' }}"
            href="{{ route('transactions.index') }}">
            <span class="material-symbols-outlined" data-icon="receipt_long"
                style="font-variation-settings: 'FILL' {{ session('activeMenu') === 'Transactions' ? '1' : '0' }};">receipt_long</span>
            <span class="font-body-md text-body-md">Transactions</span>
        </a>

        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl text-secondary hover:bg-surface-container"
            href="#">
            <span class="material-symbols-outlined" data-icon="settings"
                style="font-variation-settings: 'FILL' 0;">settings</span>
            <span class="font-body-md text-body-md">Settings</span>
        </a>
    </div>

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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggles = document.querySelectorAll('.menu-toggle');
        
        toggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const targetId = toggle.getAttribute('data-target');
                const submenu = document.getElementById(targetId);
                const arrow = toggle.querySelector('.material-symbols-outlined:last-child');
                
                // Cek apakah menu sedang terbuka
                const isOpen = submenu.classList.contains('grid-rows-[1fr]');
                
                if (isOpen) {
                    // Tutup menu
                    submenu.classList.replace('grid-rows-[1fr]', 'grid-rows-[0fr]');
                    submenu.classList.replace('opacity-100', 'opacity-0');
                    submenu.classList.add('pointer-events-none');
                    submenu.classList.remove('mt-1', 'mb-2');
                    if (arrow) arrow.classList.remove('rotate-180');
                } else {
                    // Buka menu
                    submenu.classList.replace('grid-rows-[0fr]', 'grid-rows-[1fr]');
                    submenu.classList.replace('opacity-0', 'opacity-100');
                    submenu.classList.remove('pointer-events-none');
                    submenu.classList.add('mt-1', 'mb-2');
                    if (arrow) arrow.classList.add('rotate-180');
                }
            });
        }); // <-- Tanda penutup loop forEach yang sebelumnya kurang
    }); // <-- Tanda penutup DOMContentLoaded
</script>