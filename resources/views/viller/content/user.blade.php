@extends('viller.app')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center mb-card-gap">
    <div>
        <h2 class="font-headline-xl text-headline-xl text-on-surface">Manajemen Pengguna</h2>
        <p class="mt-1 font-body-md text-body-md text-on-surface-variant">Kelola akses, peran, dan detail
            profil untuk seluruh pengguna sistem.</p>
    </div>
    <button
        class="bg-primary text-on-primary font-data-tabular text-data-tabular px-6 h-[44px] rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-sm"
        id="btn-add-user">
        <span class="text-sm material-symbols-outlined">add</span>
        Tambah Pengguna
    </button>
</div>
@endsection

@section('content')
<!-- Style for table row hover -->
<style>
    .table-row-hover {
        transition: all 0.15s ease;
    }

    .table-row-hover:hover {
        background-color: #f8fafe;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    #users-table tbody tr td {
        vertical-align: middle;
    }

    /* Notification toast */
    #toast-notification {
        transition: all 0.3s ease;
        transform: translateY(100px);
        opacity: 0;
    }

    #toast-notification.show {
        transform: translateY(0);
        opacity: 1;
    }
</style>

<!-- Main Content Card -->
<div
    class="bg-surface-container-lowest rounded-[24px] shadow-[0px_4px_20px_rgba(0,0,0,0.03)] border border-outline-variant overflow-hidden flex flex-col">
    <!-- Toolbar/Filters -->
    <div
        class="flex flex-col items-center justify-between gap-4 p-6 border-b border-outline-variant md:flex-row bg-white/50">
        <div class="relative w-full md:w-80">
            <span
                class="absolute text-sm -translate-y-1/2 material-symbols-outlined left-3 top-1/2 text-on-surface-variant">search</span>
            <input id="search-input" name="user-table-search" autocomplete="new-password"
                class="w-full pl-10 pr-4 h-11 bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg text-body-sm font-body-sm text-on-surface transition-all"
                placeholder="Cari nama atau email..." type="text">
        </div>
        <div class="flex items-center w-full gap-3 md:w-auto">
            <button id="btn-refresh"
                class="flex items-center justify-center gap-2 px-4 transition-colors border rounded-lg h-11 border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-sm text-body-sm">
                <span class="material-symbols-outlined text-[20px]">refresh</span>
                <span class="hidden sm:inline">Refresh</span>
            </button>
        </div>
    </div>

    <!-- Data Table Container -->
    <div class="overflow-x-auto">
        <table id="users-table" class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-bright/50">
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        No</th>
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Pengguna</th>
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Email</th>
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Verifikasi Email</th>
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Dibuat</th>
                    <th
                        class="px-6 py-4 tracking-wider text-center uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Aksi</th>
                </tr>
            </thead>
            <tbody id="users-tbody" class="bg-white">
                <!-- Rows populated by JS -->
                <tr id="loading-row">
                    <td colspan="6" class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                        <div class="flex items-center justify-center gap-3">
                            <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
                            Memuat data...
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination Footer -->
    <div id="pagination-footer" class="flex items-center justify-between p-4 bg-white border-t border-outline-variant">
        <span id="pagination-info" class="font-body-sm text-body-sm text-on-surface-variant">-</span>
        <div id="pagination-controls" class="flex gap-1">
            <!-- Pagination generated by JS -->
        </div>
    </div>
</div>

<!-- ===================== MODAL CREATE ===================== -->
<div class="fixed inset-0 z-50 hidden" id="modal-create-user">
    <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-create"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="glass-panel w-full max-w-[600px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.10)] border border-white/40 overflow-hidden flex flex-col"
            style="background: rgba(255,255,255,0.92); backdrop-filter: blur(16px);">
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/50 bg-white/60">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary">
                        <span class="material-symbols-outlined text-[20px]">person_add</span>
                    </div>
                    <h3 class="font-headline-lg text-headline-lg text-on-surface">Tambah Pengguna Baru</h3>
                </div>
                <button
                    class="flex items-center justify-center w-8 h-8 transition-colors rounded-full text-on-surface-variant hover:text-error hover:bg-error-container/50"
                    id="btn-close-create">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <!-- Body -->
            <div class="p-6 overflow-y-auto max-h-[70vh]">
                <!-- Alert -->
                <div id="create-alert" class="hidden px-4 py-3 mb-5 rounded-xl text-body-sm font-body-sm"></div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <!-- Nama Lengkap -->
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant" for="create-name">
                            Nama Lengkap <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">person</span>
                            <input id="create-name" type="text"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <p id="create-name-error" class="hidden ml-1 text-xs text-error"></p>
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant" for="create-email">
                            Alamat Email <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">mail</span>
                            <input id="create-email" type="email"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="email@contoh.com">
                        </div>
                        <p id="create-email-error" class="hidden ml-1 text-xs text-error"></p>
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col gap-1.5">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                            for="create-password">
                            Password <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">lock</span>
                            <input id="create-password" type="password"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-10 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Min. 8 karakter">
                            <button type="button"
                                onclick="togglePasswordVisibility('create-password', 'icon-create-pw')"
                                class="absolute transition-colors -translate-y-1/2 right-3 top-1/2 text-on-surface-variant hover:text-primary">
                                <span id="icon-create-pw"
                                    class="material-symbols-outlined text-[20px]">visibility_off</span>
                            </button>
                        </div>
                        <p id="create-password-error" class="hidden ml-1 text-xs text-error"></p>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="flex flex-col gap-1.5">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                            for="create-password-confirm">
                            Konfirmasi Password <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">lock_reset</span>
                            <input id="create-password-confirm" type="password"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-10 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Ulangi password">
                            <button type="button"
                                onclick="togglePasswordVisibility('create-password-confirm', 'icon-create-confirm')"
                                class="absolute transition-colors -translate-y-1/2 right-3 top-1/2 text-on-surface-variant hover:text-primary">
                                <span id="icon-create-confirm"
                                    class="material-symbols-outlined text-[20px]">visibility_off</span>
                            </button>
                        </div>
                        <p id="create-confirm-error" class="hidden ml-1 text-xs text-error"></p>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div class="flex justify-end gap-3 px-6 py-4 border-t bg-surface-bright/80 border-outline-variant/50">
                <button id="btn-cancel-create"
                    class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">
                    Batal
                </button>
                <button id="btn-submit-create"
                    class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular bg-primary text-white shadow-sm hover:opacity-90 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">person_add</span>
                    Simpan Pengguna
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ===================== MODAL UPDATE ===================== -->
<div class="fixed inset-0 z-50 hidden" id="modal-update-user">
    <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-update"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="glass-panel w-full max-w-[600px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.10)] border border-white/40 overflow-hidden flex flex-col"
            style="background: rgba(255,255,255,0.92); backdrop-filter: blur(16px);">
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/50 bg-white/60">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-tertiary/10"
                        style="color: #7e3000;">
                        <span class="material-symbols-outlined text-[20px]">edit</span>
                    </div>
                    <div>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface">Edit Pengguna</h3>
                        <p id="update-subtitle" class="font-body-sm text-body-sm text-secondary mt-0.5"></p>
                    </div>
                </div>
                <button
                    class="flex items-center justify-center w-8 h-8 transition-colors rounded-full text-on-surface-variant hover:text-error hover:bg-error-container/50"
                    id="btn-close-update">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <!-- Body -->
            <div class="p-6 overflow-y-auto max-h-[70vh]">
                <input type="hidden" id="update-id">

                <!-- Alert -->
                <div id="update-alert" class="hidden px-4 py-3 mb-5 rounded-xl text-body-sm font-body-sm"></div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <!-- Nama Lengkap -->
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant" for="update-name">
                            Nama Lengkap <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">person</span>
                            <input id="update-name" type="text"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <p id="update-name-error" class="hidden ml-1 text-xs text-error"></p>
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant" for="update-email">
                            Alamat Email <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">mail</span>
                            <input id="update-email" type="email"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="email@contoh.com">
                        </div>
                        <p id="update-email-error" class="hidden ml-1 text-xs text-error"></p>
                    </div>

                    <!-- Divider password section -->
                    <div class="md:col-span-2">
                        <div class="flex items-center gap-3 py-2">
                            <div class="flex-1 border-t border-outline-variant/40"></div>
                            <span
                                class="px-2 font-label-caps text-label-caps text-on-surface-variant whitespace-nowrap">
                                Ubah Password (opsional)
                            </span>
                            <div class="flex-1 border-t border-outline-variant/40"></div>
                        </div>
                        <p class="mt-1 text-xs text-on-surface-variant">Biarkan kosong jika tidak ingin mengubah
                            password.</p>
                    </div>

                    <!-- Password Baru -->
                    <div class="flex flex-col gap-1.5">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                            for="update-password">
                            Password Baru
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">lock</span>
                            <input id="update-password" type="password"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-10 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Min. 8 karakter">
                            <button type="button"
                                onclick="togglePasswordVisibility('update-password', 'icon-update-pw')"
                                class="absolute transition-colors -translate-y-1/2 right-3 top-1/2 text-on-surface-variant hover:text-primary">
                                <span id="icon-update-pw"
                                    class="material-symbols-outlined text-[20px]">visibility_off</span>
                            </button>
                        </div>
                        <p id="update-password-error" class="hidden ml-1 text-xs text-error"></p>
                    </div>

                    <!-- Konfirmasi Password Baru -->
                    <div class="flex flex-col gap-1.5">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                            for="update-password-confirm">
                            Konfirmasi Password Baru
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">lock_reset</span>
                            <input id="update-password-confirm" type="password"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-10 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Ulangi password baru">
                            <button type="button"
                                onclick="togglePasswordVisibility('update-password-confirm', 'icon-update-confirm')"
                                class="absolute transition-colors -translate-y-1/2 right-3 top-1/2 text-on-surface-variant hover:text-primary">
                                <span id="icon-update-confirm"
                                    class="material-symbols-outlined text-[20px]">visibility_off</span>
                            </button>
                        </div>
                        <p id="update-confirm-error" class="hidden ml-1 text-xs text-error"></p>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div class="flex justify-end gap-3 px-6 py-4 border-t bg-surface-bright/80 border-outline-variant/50">
                <button id="btn-cancel-update"
                    class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">
                    Batal
                </button>
                <button id="btn-submit-update"
                    class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular bg-primary text-white shadow-sm hover:opacity-90 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ===================== MODAL DELETE CONFIRM ===================== -->
<div class="fixed inset-0 z-50 hidden" id="modal-delete-user">
    <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div
            class="w-full max-w-[420px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.12)] border border-outline-variant overflow-hidden flex flex-col bg-white">
            <div class="p-6 text-center">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-error-container">
                    <span class="material-symbols-outlined text-[32px] text-error">delete_forever</span>
                </div>
                <h3 class="mb-2 font-headline-lg text-headline-lg text-on-surface">Hapus Pengguna?</h3>
                <p id="delete-confirm-text" class="font-body-md text-body-md text-on-surface-variant">
                    Tindakan ini tidak dapat dibatalkan.
                </p>
            </div>
            <div class="flex gap-3 px-6 pb-6">
                <button id="btn-cancel-delete"
                    class="flex-1 h-[44px] rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">
                    Batal
                </button>
                <button id="btn-confirm-delete"
                    class="flex-1 h-[44px] rounded-lg font-data-tabular text-data-tabular bg-error text-white shadow-sm hover:opacity-90 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast-notification"
    class="fixed bottom-6 right-6 z-[100] flex items-center gap-3 px-5 py-3.5 rounded-xl shadow-lg max-w-sm">
    <span id="toast-icon" class="material-symbols-outlined text-[22px] shrink-0"></span>
    <p id="toast-message" class="font-body-sm text-body-sm"></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // ========== State ==========
    let allUsers = [];
    let currentPage = 1;
    const perPage = 10;
    let deleteTargetId = null;

    // ========== Helpers ==========
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast-notification');
        const icon = document.getElementById('toast-icon');
        const msg = document.getElementById('toast-message');

        msg.textContent = message;

        if (type === 'success') {
            toast.className = 'fixed bottom-6 right-6 z-[100] flex items-center gap-3 px-5 py-3.5 rounded-xl shadow-lg max-w-sm bg-[#1a3a2a] text-white';
            icon.textContent = 'check_circle';
        } else {
            toast.className = 'fixed bottom-6 right-6 z-[100] flex items-center gap-3 px-5 py-3.5 rounded-xl shadow-lg max-w-sm bg-error text-white';
            icon.textContent = 'error';
        }

        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
    }

    function setLoading(btnId, isLoading, defaultText = null) {
        const btn = document.getElementById(btnId);
        if (!btn) return;
        btn.disabled = isLoading;
        if (isLoading) {
            btn.innerHTML = '<span class="material-symbols-outlined text-[18px] animate-spin">progress_activity</span> Memproses...';
        } else if (defaultText) {
            btn.innerHTML = defaultText;
        }
    }

    function formatDate(dateStr) {
        if (!dateStr) return '<span class="italic text-on-surface-variant/50">—</span>';
        try {
            return new Date(dateStr).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        } catch(e) { return dateStr; }
    }

    function getInitials(name) {
        if (!name) return '?';
        return name.split(' ').slice(0,2).map(w => w[0]).join('').toUpperCase();
    }

    function getAvatarColor(name) {
        const colors = [
            'bg-primary-container text-on-primary-container',
            'bg-tertiary-fixed text-on-tertiary-fixed',
            'bg-surface-container-highest text-primary',
            'bg-surface-variant text-on-surface-variant',
        ];
        const idx = (name || '').charCodeAt(0) % colors.length;
        return colors[idx];
    }

    function clearErrors(prefix) {
        ['name','email','password','confirm'].forEach(field => {
            const el = document.getElementById(`${prefix}-${field}-error`);
            if (el) { el.classList.add('hidden'); el.textContent = ''; }
        });
        const alert = document.getElementById(`${prefix}-alert`);
        if (alert) alert.classList.add('hidden');
    }

    function showFieldError(id, msg) {
        const el = document.getElementById(id);
        if (el) { el.textContent = msg; el.classList.remove('hidden'); }
    }

    function showAlert(id, msg, type = 'error') {
        const el = document.getElementById(id);
        if (!el) return;
        el.textContent = msg;
        el.className = type === 'error'
            ? 'mb-5 px-4 py-3 rounded-xl text-body-sm font-body-sm bg-error-container text-on-error-container'
            : 'mb-5 px-4 py-3 rounded-xl text-body-sm font-body-sm bg-[#e8f5e9] text-[#2e7d32]';
        el.classList.remove('hidden');
    }

    function readJsonResponse(response) {
        return response.json()
            .catch(() => ({ success: response.ok }))
            .then(data => ({ response, data }));
    }

    // ========== Modal Toggles ==========
    function toggleModal(id, show) {
        const modal = document.getElementById(id);
        if (show) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    // ========== Fetch & Render Table ==========
    function fetchUsers() {
        // console.log("pppp");
        document.getElementById('users-tbody').innerHTML = `
            <tr id="loading-row">
                <td colspan="6" class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                    <div class="flex items-center justify-center gap-3">
                        <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
                        Memuat data...
                    </div>
                </td>
            </tr>`;

        fetch('{{ route('users.getAll') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })
        .then(r => r.json())
        .then(json => {
            allUsers = json.data || [];
            currentPage = 1;
            renderTable();
        })
        .catch(() => {
            document.getElementById('users-tbody').innerHTML = `
                <tr><td colspan="6" class="px-6 py-10 text-center text-error font-body-sm">
                    <span class="material-symbols-outlined text-[32px] block mb-2">cloud_off</span>
                    Gagal memuat data. Coba refresh.
                </td></tr>`;
        });
    }

    function renderTable() {
        const searchVal = document.getElementById('search-input').value.toLowerCase();
        const filtered = allUsers.filter(u =>
            (u.name || '').toLowerCase().includes(searchVal) ||
            (u.email || '').toLowerCase().includes(searchVal)
        );

        const total = filtered.length;
        const totalPages = Math.max(1, Math.ceil(total / perPage));
        if (currentPage > totalPages) currentPage = totalPages;

        const start = (currentPage - 1) * perPage;
        const pageData = filtered.slice(start, start + perPage);

        const tbody = document.getElementById('users-tbody');
        if (pageData.length === 0) {
            tbody.innerHTML = `
                <tr><td colspan="6" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                    <span class="material-symbols-outlined text-[40px] block mb-2 opacity-40">search_off</span>
                    Tidak ada data ditemukan.
                </td></tr>`;
        } else {
            tbody.innerHTML = pageData.map((u, i) => {
                const rowIdx = start + i + 1;
                const initials = getInitials(u.name);
                const avatarClass = getAvatarColor(u.name);
                const verifiedBadge = u.email_verified_at
                    ? `<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-label-caps text-label-caps">
                           <span class="material-symbols-outlined text-[14px]">verified</span> Terverifikasi
                       </span>`
                    : `<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 font-label-caps text-label-caps">
                           <span class="material-symbols-outlined text-[14px]">pending</span> Belum Verifikasi
                       </span>`;

                const bg = rowIdx % 2 === 0 ? 'bg-[#F8FAFC]/50' : '';
                return `
                    <tr class="table-row-hover border-b border-surface-container group ${bg}">
                        <td class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant">${rowIdx}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-9 h-9 rounded-full font-bold font-data-tabular text-sm shrink-0 ${avatarClass}">${initials}</div>
                                <p class="font-semibold font-data-tabular text-data-tabular text-on-surface">${u.name || '-'}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">${u.email || '-'}</td>
                        <td class="px-6 py-4">${verifiedBadge}</td>
                        <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">${formatDate(u.created_at)}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <button onclick="openUpdateModal(${u.id})"
                                    class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-primary hover:bg-primary/10 hover:scale-110"
                                    title="Edit">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </button>
                                <button onclick="openDeleteModal(${u.id}, '${(u.name||'').replace(/'/g, "\\'")}')"
                                    class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container hover:scale-110"
                                    title="Hapus">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>`;
            }).join('');
        }

        // Pagination info
        const endIdx = Math.min(start + perPage, total);
        document.getElementById('pagination-info').textContent =
            total === 0 ? 'Tidak ada data' : `Menampilkan ${start+1}–${endIdx} dari ${total} pengguna`;

        // Pagination controls
        renderPagination(totalPages);
    }

    function renderPagination(totalPages) {
        const ctrl = document.getElementById('pagination-controls');
        let html = '';

        // Prev
        html += `<button onclick="goPage(${currentPage - 1})" ${currentPage===1 ? 'disabled' : ''}
            class="flex items-center justify-center w-8 h-8 transition-colors border rounded-md border-outline-variant text-on-surface-variant hover:bg-surface-container disabled:opacity-40 disabled:cursor-not-allowed">
            <span class="text-sm material-symbols-outlined">chevron_left</span>
        </button>`;

        for (let p = 1; p <= totalPages; p++) {
            if (totalPages > 7 && Math.abs(p - currentPage) > 2 && p !== 1 && p !== totalPages) {
                if (p === 2 || p === totalPages - 1) { html += `<span class="flex items-center justify-center w-8 h-8 text-on-surface-variant">...</span>`; }
                continue;
            }
            html += `<button onclick="goPage(${p})"
                class="flex items-center justify-center w-8 h-8 rounded-md font-data-tabular transition-colors ${p===currentPage ? 'bg-primary text-white' : 'hover:bg-surface-container text-on-surface'}">
                ${p}
            </button>`;
        }

        // Next
        html += `<button onclick="goPage(${currentPage + 1})" ${currentPage===totalPages ? 'disabled' : ''}
            class="flex items-center justify-center w-8 h-8 transition-colors border rounded-md border-outline-variant text-on-surface-variant hover:bg-surface-container disabled:opacity-40 disabled:cursor-not-allowed">
            <span class="text-sm material-symbols-outlined">chevron_right</span>
        </button>`;

        ctrl.innerHTML = html;
    }

    window.goPage = (p) => {
        const filtered = allUsers.filter(u => {
            const searchVal = document.getElementById('search-input').value.toLowerCase();
            return (u.name||'').toLowerCase().includes(searchVal) || (u.email||'').toLowerCase().includes(searchVal);
        });
        const totalPages = Math.max(1, Math.ceil(filtered.length / perPage));
        if (p < 1 || p > totalPages) return;
        currentPage = p;
        renderTable();
    };

    // ========== Create Modal ==========
    document.getElementById('btn-add-user').addEventListener('click', () => {
        clearErrors('create');
        document.getElementById('create-name').value = '';
        document.getElementById('create-email').value = '';
        document.getElementById('create-password').value = '';
        document.getElementById('create-password-confirm').value = '';
        document.getElementById('btn-submit-create').innerHTML = '<span class="material-symbols-outlined text-[18px]">person_add</span> Simpan Pengguna';
        toggleModal('modal-create-user', true);
    });

    ['btn-close-create','btn-cancel-create','backdrop-create'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('click', () => toggleModal('modal-create-user', false));
    });

    document.getElementById('btn-submit-create').addEventListener('click', () => {
        clearErrors('create');
        const name = document.getElementById('create-name').value.trim();
        const email = document.getElementById('create-email').value.trim();
        const password = document.getElementById('create-password').value;
        const passwordConfirm = document.getElementById('create-password-confirm').value;

        let valid = true;
        if (!name) { showFieldError('create-name-error', 'Nama lengkap wajib diisi.'); valid = false; }
        if (!email) { showFieldError('create-email-error', 'Email wajib diisi.'); valid = false; }
        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { showFieldError('create-email-error', 'Format email tidak valid.'); valid = false; }
        if (!password) { showFieldError('create-password-error', 'Password wajib diisi.'); valid = false; }
        else if (password.length < 8) { showFieldError('create-password-error', 'Password minimal 8 karakter.'); valid = false; }
        if (password !== passwordConfirm) { showFieldError('create-confirm-error', 'Konfirmasi password tidak cocok.'); valid = false; }
        if (!valid) return;

        setLoading('btn-submit-create', true);

        fetch('{{ route('users.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ name, email, password, password_confirmation: passwordConfirm })
        })
        .then(readJsonResponse)
        .then(({ response, data }) => {
            if (response.ok && data.success !== false) {
                toggleModal('modal-create-user', false);
                showToast(data.message || 'Pengguna berhasil ditambahkan!', 'success');
                fetchUsers();
            } else {
                const errors = data.errors || {};
                if (errors.name) showFieldError('create-name-error', errors.name[0]);
                if (errors.email) showFieldError('create-email-error', errors.email[0]);
                if (errors.password) showFieldError('create-password-error', errors.password[0]);
                if (!errors.name && !errors.email && !errors.password) {
                    showAlert('create-alert', data.message || 'Terjadi kesalahan. Coba lagi.', 'error');
                }
            }
        })
        .catch(() => showAlert('create-alert', 'Gagal terhubung ke server.', 'error'))
        .finally(() => setLoading('btn-submit-create', false, '<span class="material-symbols-outlined text-[18px]">person_add</span> Simpan Pengguna'));
    });

    // ========== Update Modal ==========
    window.openUpdateModal = (id) => {
        const user = allUsers.find(u => u.id == id);
        if (!user) return;
        clearErrors('update');
        document.getElementById('update-id').value = user.id;
        document.getElementById('update-name').value = user.name || '';
        document.getElementById('update-email').value = user.email || '';
        document.getElementById('update-password').value = '';
        document.getElementById('update-password-confirm').value = '';
        document.getElementById('update-subtitle').textContent = user.email || '';
        document.getElementById('btn-submit-update').innerHTML = '<span class="material-symbols-outlined text-[18px]">save</span> Simpan Perubahan';
        toggleModal('modal-update-user', true);
    };

    ['btn-close-update','btn-cancel-update','backdrop-update'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('click', () => toggleModal('modal-update-user', false));
    });

    document.getElementById('btn-submit-update').addEventListener('click', () => {
        clearErrors('update');
        const id = document.getElementById('update-id').value;
        const name = document.getElementById('update-name').value.trim();
        const email = document.getElementById('update-email').value.trim();
        const password = document.getElementById('update-password').value;
        const passwordConfirm = document.getElementById('update-password-confirm').value;

        let valid = true;
        if (!name) { showFieldError('update-name-error', 'Nama lengkap wajib diisi.'); valid = false; }
        if (!email) { showFieldError('update-email-error', 'Email wajib diisi.'); valid = false; }
        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { showFieldError('update-email-error', 'Format email tidak valid.'); valid = false; }
        if (password) {
            if (password.length < 8) { showFieldError('update-password-error', 'Password minimal 8 karakter.'); valid = false; }
            if (password !== passwordConfirm) { showFieldError('update-confirm-error', 'Konfirmasi password tidak cocok.'); valid = false; }
        }
        if (!valid) return;

        setLoading('btn-submit-update', true);

        const payload = { id, name, email };
        if (password) { payload.password = password; payload.password_confirmation = passwordConfirm; }

        fetch('{{ route('users.update') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(payload)
        })
        .then(readJsonResponse)
        .then(({ response, data }) => {
            if (response.ok && data.success !== false) {
                toggleModal('modal-update-user', false);
                showToast(data.message || 'Data pengguna berhasil diperbarui!', 'success');
                fetchUsers();
            } else {
                const errors = data.errors || {};
                if (errors.name) showFieldError('update-name-error', errors.name[0]);
                if (errors.email) showFieldError('update-email-error', errors.email[0]);
                if (errors.password) showFieldError('update-password-error', errors.password[0]);
                if (!errors.name && !errors.email && !errors.password) {
                    showAlert('update-alert', data.message || 'Terjadi kesalahan. Coba lagi.', 'error');
                }
            }
        })
        .catch(() => showAlert('update-alert', 'Gagal terhubung ke server.', 'error'))
        .finally(() => setLoading('btn-submit-update', false, '<span class="material-symbols-outlined text-[18px]">save</span> Simpan Perubahan'));
    });

    // ========== Delete Modal ==========
    window.openDeleteModal = (id, name) => {
        deleteTargetId = id;
        document.getElementById('delete-confirm-text').textContent =
            `Pengguna "${name}" akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.`;
        document.getElementById('btn-confirm-delete').innerHTML =
            '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus';
        toggleModal('modal-delete-user', true);
    };

    document.getElementById('btn-cancel-delete').addEventListener('click', () => {
        deleteTargetId = null;
        toggleModal('modal-delete-user', false);
    });

    document.getElementById('btn-confirm-delete').addEventListener('click', () => {
        if (!deleteTargetId) return;
        setLoading('btn-confirm-delete', true);

        fetch('{{ route('users.destroy') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ id: deleteTargetId })
        })
        .then(readJsonResponse)
        .then(({ response, data }) => {
            if (response.ok && data.success !== false) {
                toggleModal('modal-delete-user', false);
                showToast(data.message || 'Pengguna berhasil dihapus.', 'success');
                fetchUsers();
            } else {
                showToast(data.message || 'Gagal menghapus pengguna.', 'error');
            }
        })
        .catch(() => {
            toggleModal('modal-delete-user', false);
            showToast('Gagal terhubung ke server.', 'error');
        })
        .finally(() => {
            deleteTargetId = null;
            setLoading('btn-confirm-delete', false, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');
        });
    });

    // ========== Search & Refresh ==========
    document.getElementById('search-input').addEventListener('input', () => {
        currentPage = 1;
        renderTable();
    });

    document.getElementById('btn-refresh').addEventListener('click', fetchUsers);

    // ========== Password Toggle ==========
    window.togglePasswordVisibility = (inputId, iconId) => {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility_off';
        }
    };

    // ========== Init ==========
    // Force-clear the search field to prevent browser autofill (Chrome ignores autocomplete="off"
    // on text inputs and can inject saved form values such as usernames).
    const searchInput = document.getElementById('search-input');
    searchInput.value = '';
    // Also clear on any autofill event that fires after DOMContentLoaded
    searchInput.addEventListener('change', () => {
        // Only clear if the user hasn't intentionally typed something yet
    });
    // Reset value again after a short delay to catch late browser autofill
    setTimeout(() => { searchInput.value = ''; }, 50);
    setTimeout(() => { searchInput.value = ''; }, 300);

    fetchUsers();
});
</script>
@endsection
