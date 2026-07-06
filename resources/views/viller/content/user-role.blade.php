{{-- @extends('viller.app') --}}

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center mb-card-gap">
    <div>
        <h2 class="font-headline-xl text-headline-xl text-on-surface">User Roles</h2>
        <p class="mt-1 font-body-md text-body-md text-on-surface-variant">Kelola relasi pengguna, peran, dan cakupan
            akses operasional.</p>
    </div>
    <button id="btn-add-user-role"
        class="bg-primary text-on-primary font-data-tabular text-data-tabular px-6 h-[44px] rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-sm">
        <span class="text-sm material-symbols-outlined">add</span>
        Tambah User Role
    </button>
</div>
@endsection

{{-- @section('content') --}}
<x-app-layout>

    <style>
        .table-row-hover {
            transition: all 0.15s ease;
        }

        .table-row-hover:hover {
            background-color: #f8fafe;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        #user-roles-table tbody tr td {
            vertical-align: middle;
        }

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

    <div
        class="bg-surface-container-lowest rounded-[24px] shadow-[0px_4px_20px_rgba(0,0,0,0.03)] border border-outline-variant overflow-hidden flex flex-col">
        <div
            class="flex flex-col items-center justify-between gap-4 p-6 border-b border-outline-variant md:flex-row bg-white/50">
            <div class="relative w-full md:w-96">
                <span
                    class="absolute text-sm -translate-y-1/2 material-symbols-outlined left-3 top-1/2 text-on-surface-variant">search</span>
                <input id="search-input" name="user-role-table-search" autocomplete="new-password"
                    class="w-full pl-10 pr-4 h-11 bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg text-body-sm font-body-sm text-on-surface transition-all"
                    placeholder="Cari user, role, client, merchant, outlet..." type="text">
            </div>
            <button id="btn-refresh"
                class="flex items-center justify-center gap-2 px-4 transition-colors border rounded-lg h-11 border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-sm text-body-sm">
                <span class="material-symbols-outlined text-[20px]">refresh</span>
                <span class="hidden sm:inline">Refresh</span>
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="user-roles-table" class="w-full text-left border-collapse">
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
                            Role</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Scope</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Dibuat</th>
                        <th
                            class="px-6 py-4 tracking-wider text-center uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="user-roles-tbody" class="bg-white">
                    <tr>
                        <td colspan="6"
                            class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span
                                    class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
                                Memuat data...
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="pagination-footer"
            class="flex items-center justify-between p-4 bg-white border-t border-outline-variant">
            <span id="pagination-info" class="font-body-sm text-body-sm text-on-surface-variant">-</span>
            <div id="pagination-controls" class="flex gap-1"></div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden" id="modal-user-role">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-user-role"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="glass-panel w-full max-w-[640px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.10)] border border-white/40 overflow-hidden flex flex-col"
                style="background: rgba(255,255,255,0.92); backdrop-filter: blur(16px);">
                <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/50 bg-white/60">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary">
                            <span id="modal-icon" class="material-symbols-outlined text-[20px]">assignment_ind</span>
                        </div>
                        <h3 id="modal-title" class="font-headline-lg text-headline-lg text-on-surface">Tambah User Role
                        </h3>
                    </div>
                    <button id="btn-close-user-role"
                        class="flex items-center justify-center w-8 h-8 transition-colors rounded-full text-on-surface-variant hover:text-error hover:bg-error-container/50">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <div class="p-6 overflow-y-auto max-h-[70vh]">
                    <input type="hidden" id="user-role-id">
                    <div id="user-role-alert" class="hidden px-4 py-3 mb-5 rounded-xl text-body-sm font-body-sm"></div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div class="flex flex-col gap-1.5 md:col-span-2">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant" for="user-id">
                                User <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">person</span>
                                <select id="user-id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="">Pilih user</option>
                                </select>
                            </div>
                            <p id="user-id-error" class="hidden ml-1 text-xs text-error"></p>
                        </div>

                        <div class="flex flex-col gap-1.5 md:col-span-2">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant" for="role-id">
                                Role <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">admin_panel_settings</span>
                                <select id="role-id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="">Pilih role</option>
                                </select>
                            </div>
                            <p id="role-id-error" class="hidden ml-1 text-xs text-error"></p>
                        </div>

                        <div id="client-field" class="hidden flex flex-col gap-1.5 md:col-span-2">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                for="client-id">Client</label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">business</span>
                                <select id="client-id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="0">Pilih client</option>
                                </select>
                            </div>
                            <p id="client-id-error" class="hidden ml-1 text-xs text-error"></p>
                        </div>

                        <div id="merchant-field" class="hidden flex flex-col gap-1.5 md:col-span-2">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                for="merchant-id">Merchant</label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">storefront</span>
                                <select id="merchant-id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="0">Pilih merchant</option>
                                </select>
                            </div>
                            <p id="merchant-id-error" class="hidden ml-1 text-xs text-error"></p>
                        </div>

                        <div id="merchant-outlet-field" class="hidden flex flex-col gap-1.5 md:col-span-2">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                for="merchant-outlet-id">Merchant Outlet</label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">point_of_sale</span>
                                <select id="merchant-outlet-id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="0">Pilih outlet</option>
                                </select>
                            </div>
                            <p id="merchant-outlet-id-error" class="hidden ml-1 text-xs text-error"></p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 px-6 py-4 border-t bg-surface-bright/80 border-outline-variant/50">
                    <button id="btn-cancel-user-role"
                        class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">
                        Batal
                    </button>
                    <button id="btn-submit-user-role"
                        class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular bg-primary text-white shadow-sm hover:opacity-90 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        Simpan User Role
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden" id="modal-delete-user-role">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-[420px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.12)] border border-outline-variant overflow-hidden flex flex-col bg-white">
                <div class="p-6 text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-error-container">
                        <span class="material-symbols-outlined text-[32px] text-error">delete_forever</span>
                    </div>
                    <h3 class="mb-2 font-headline-lg text-headline-lg text-on-surface">Hapus User Role?</h3>
                    <p id="delete-confirm-text" class="font-body-md text-body-md text-on-surface-variant">Tindakan ini
                        tidak dapat dibatalkan.</p>
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

    <div id="toast-notification"
        class="fixed bottom-6 right-6 z-[100] flex items-center gap-3 px-5 py-3.5 rounded-xl shadow-lg max-w-sm">
        <span id="toast-icon" class="material-symbols-outlined text-[22px] shrink-0"></span>
        <p id="toast-message" class="font-body-sm text-body-sm"></p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const users = @json($users);
    const roles = @json($roles);
    const clients = @json($clients);
    const merchants = @json($merchants);
    const merchantOutlets = @json($merchant_outlets);
    let allUserRoles = [];
    let currentPage = 1;
    const perPage = 10;
    let deleteTargetId = null;

    function byId(items, id) {
        return items.find(item => String(item.id) === String(id));
    }

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'
        }[char]));
    }

    function formatDate(dateStr) {
        if (!dateStr) return '<span class="italic text-on-surface-variant/50">-</span>';
        try {
            return new Date(dateStr).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        } catch (e) { return dateStr; }
    }

    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast-notification');
        const icon = document.getElementById('toast-icon');
        document.getElementById('toast-message').textContent = message;
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

    function readJsonResponse(response) {
        return response.json()
            .catch(() => ({ success: response.ok }))
            .then(data => ({ response, data }));
    }

    function showFieldError(id, message) {
        const el = document.getElementById(id);
        if (el) {
            el.textContent = message;
            el.classList.remove('hidden');
        }
    }

    function clearErrors() {
        ['user-id', 'role-id', 'client-id', 'merchant-id', 'merchant-outlet-id'].forEach(field => {
            const el = document.getElementById(`${field}-error`);
            if (el) {
                el.textContent = '';
                el.classList.add('hidden');
            }
        });
        document.getElementById('user-role-alert').classList.add('hidden');
    }

    function showAlert(message) {
        const alert = document.getElementById('user-role-alert');
        alert.textContent = message;
        alert.className = 'mb-5 px-4 py-3 rounded-xl text-body-sm font-body-sm bg-error-container text-on-error-container';
        alert.classList.remove('hidden');
    }

    function toggleModal(id, show) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : '';
    }

    function fillSelect(id, items, labelKey, placeholder) {
        const select = document.getElementById(id);
        select.innerHTML = `<option value="">${placeholder}</option>` + items.map(item =>
            `<option value="${item.id}">${escapeHtml(item[labelKey] || item.name || '-')}</option>`
        ).join('');
    }

    function fillScopeSelects() {
        fillSelect('user-id', users, 'name', 'Pilih user');
        fillSelect('role-id', roles, 'role_name', 'Pilih role');
        fillSelect('client-id', clients, 'client_name', 'Pilih client');
        fillSelect('merchant-id', merchants, 'merchant_name', 'Pilih merchant');
        fillSelect('merchant-outlet-id', merchantOutlets, 'merchant_outlet_name', 'Pilih outlet');
    }

    function getScopeInfo(item) {
        if (Number(item.client_id) > 0) {
            return { icon: 'business', label: byId(clients, item.client_id)?.client_name || `Client #${item.client_id}` };
        }
        if (Number(item.merchant_id) > 0) {
            return { icon: 'storefront', label: byId(merchants, item.merchant_id)?.merchant_name || `Merchant #${item.merchant_id}` };
        }
        if (Number(item.outlet_id) > 0) {
            return { icon: 'point_of_sale', label: byId(merchantOutlets, item.outlet_id)?.merchant_outlet_name || `Outlet #${item.outlet_id}` };
        }
        return { icon: 'public', label: 'Global' };
    }

    function syncScopeFields(resetValues = false) {
        const roleId = Number(document.getElementById('role-id').value || 0);
        const showClient = roleId === 2;
        const showOutlet = roleId === 3;
        const showMerchant = roleId === 4;
        document.getElementById('client-field').classList.toggle('hidden', !showClient);
        document.getElementById('merchant-outlet-field').classList.toggle('hidden', !showOutlet);
        document.getElementById('merchant-field').classList.toggle('hidden', !showMerchant);
        if (resetValues) {
            if (!showClient) document.getElementById('client-id').value = '';
            if (!showOutlet) document.getElementById('merchant-outlet-id').value = '';
            if (!showMerchant) document.getElementById('merchant-id').value = '';
        }
    }

    function enrichedItem(item) {
        const scope = getScopeInfo(item);
        return {
            ...item,
            scope_label: scope.label,
            user_name: item.user_name || byId(users, item.user_id)?.name || '-',
            role_name: item.role_name || byId(roles, item.role_id)?.role_name || '-',
        };
    }

    function getFilteredData() {
        const searchVal = document.getElementById('search-input').value.toLowerCase();
        return allUserRoles.map(enrichedItem).filter(item =>
            (item.user_name || '').toLowerCase().includes(searchVal) ||
            (item.role_name || '').toLowerCase().includes(searchVal) ||
            (item.scope_label || '').toLowerCase().includes(searchVal)
        );
    }

    function renderTable() {
        const filtered = getFilteredData();
        const total = filtered.length;
        const totalPages = Math.max(1, Math.ceil(total / perPage));
        if (currentPage > totalPages) currentPage = totalPages;
        const start = (currentPage - 1) * perPage;
        const pageData = filtered.slice(start, start + perPage);
        const tbody = document.getElementById('user-roles-tbody');

        if (pageData.length === 0) {
            tbody.innerHTML = `
                <tr><td colspan="6" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                    <span class="material-symbols-outlined text-[40px] block mb-2 opacity-40">search_off</span>
                    Tidak ada data ditemukan.
                </td></tr>`;
        } else {
            tbody.innerHTML = pageData.map((item, i) => {
                const rowIdx = start + i + 1;
                const scope = getScopeInfo(item);
                const bg = rowIdx % 2 === 0 ? 'bg-[#F8FAFC]/50' : '';
                return `
                    <tr class="table-row-hover border-b border-surface-container group ${bg}">
                        <td class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant">${rowIdx}</td>
                        <td class="px-6 py-4 font-semibold font-data-tabular text-data-tabular text-on-surface">${escapeHtml(item.user_name)}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-primary/10 text-primary font-label-caps text-label-caps">
                                <span class="material-symbols-outlined text-[14px]">admin_panel_settings</span>
                                ${escapeHtml(item.role_name)}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-caps text-label-caps">
                                <span class="material-symbols-outlined text-[14px]">${scope.icon}</span>
                                ${escapeHtml(scope.label)}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">${formatDate(item.created_at)}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <button onclick="openEditModal(${item.id})" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-primary hover:bg-primary/10 hover:scale-110" title="Edit">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </button>
                                <button onclick="openDeleteModal(${item.id})" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container hover:scale-110" title="Hapus">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>`;
            }).join('');
        }

        const endIdx = Math.min(start + perPage, total);
        document.getElementById('pagination-info').textContent = total === 0 ? 'Tidak ada data' : `Menampilkan ${start + 1}-${endIdx} dari ${total} user role`;
        renderPagination(totalPages);
    }

    function renderPagination(totalPages) {
        const ctrl = document.getElementById('pagination-controls');
        let html = `<button onclick="goPage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}
            class="flex items-center justify-center w-8 h-8 transition-colors border rounded-md border-outline-variant text-on-surface-variant hover:bg-surface-container disabled:opacity-40 disabled:cursor-not-allowed">
            <span class="text-sm material-symbols-outlined">chevron_left</span>
        </button>`;
        for (let p = 1; p <= totalPages; p++) {
            html += `<button onclick="goPage(${p})"
                class="flex items-center justify-center w-8 h-8 rounded-md font-data-tabular transition-colors ${p === currentPage ? 'bg-primary text-white' : 'hover:bg-surface-container text-on-surface'}">${p}</button>`;
        }
        html += `<button onclick="goPage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}
            class="flex items-center justify-center w-8 h-8 transition-colors border rounded-md border-outline-variant text-on-surface-variant hover:bg-surface-container disabled:opacity-40 disabled:cursor-not-allowed">
            <span class="text-sm material-symbols-outlined">chevron_right</span>
        </button>`;
        ctrl.innerHTML = html;
    }

    function fetchUserRoles() {
        document.getElementById('user-roles-tbody').innerHTML = `
            <tr><td colspan="6" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
                Memuat data...
            </td></tr>`;
        fetch('{{ route('user_roles.getAll') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(json => {
            allUserRoles = json.data || [];
            currentPage = 1;
            renderTable();
        })
        .catch(() => {
            document.getElementById('user-roles-tbody').innerHTML = `
                <tr><td colspan="6" class="px-6 py-10 text-center text-error font-body-sm">
                    <span class="material-symbols-outlined text-[32px] block mb-2">cloud_off</span>
                    Gagal memuat data. Coba refresh.
                </td></tr>`;
        });
    }

    function resetForm() {
        document.getElementById('user-role-id').value = '';
        document.getElementById('user-id').value = '';
        document.getElementById('role-id').value = '';
        document.getElementById('client-id').value = '';
        document.getElementById('merchant-id').value = '';
        document.getElementById('merchant-outlet-id').value = '';
        syncScopeFields(false);
    }

    function openFormModal(mode, item = null) {
        clearErrors();
        resetForm();
        document.getElementById('modal-title').textContent = mode === 'edit' ? 'Edit User Role' : 'Tambah User Role';
        document.getElementById('modal-icon').textContent = mode === 'edit' ? 'edit' : 'assignment_ind';
        if (item) {
            document.getElementById('user-role-id').value = item.id || '';
            document.getElementById('user-id').value = item.user_id || '';
            document.getElementById('role-id').value = item.role_id || '';
            document.getElementById('client-id').value = item.client_id || '';
            document.getElementById('merchant-id').value = item.merchant_id || '';
            document.getElementById('merchant-outlet-id').value = item.outlet_id || '';
            syncScopeFields(false);
        }
        toggleModal('modal-user-role', true);
    }

    function buildPayload() {
        const roleId = Number(document.getElementById('role-id').value || 0);
        const payload = {
            id: document.getElementById('user-role-id').value,
            user_id: document.getElementById('user-id').value,
            role_id: roleId,
            client_id: roleId === 2 ? Number(document.getElementById('client-id').value || 0) : 0,
            merchant_id: roleId === 4 ? Number(document.getElementById('merchant-id').value || 0) : 0,
            merchant_outlet_id: roleId === 3 ? Number(document.getElementById('merchant-outlet-id').value || 0) : 0,
        };
        return payload;
    }

    window.openEditModal = id => {
        const item = allUserRoles.find(row => row.id == id);
        if (item) openFormModal('edit', item);
    };

    window.openDeleteModal = id => {
        const rawItem = allUserRoles.find(row => row.id == id);
        if (!rawItem) return;
        const item = enrichedItem(rawItem);
        deleteTargetId = id;
        document.getElementById('delete-confirm-text').textContent = `User role "${item.user_name} - ${item.role_name}" akan dihapus secara permanen.`;
        document.getElementById('btn-confirm-delete').innerHTML = '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus';
        toggleModal('modal-delete-user-role', true);
    };

    window.goPage = page => {
        const totalPages = Math.max(1, Math.ceil(getFilteredData().length / perPage));
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderTable();
    };

    document.getElementById('btn-add-user-role').addEventListener('click', () => openFormModal('create'));
    ['btn-close-user-role', 'btn-cancel-user-role', 'backdrop-user-role'].forEach(id => {
        document.getElementById(id).addEventListener('click', () => toggleModal('modal-user-role', false));
    });
    document.getElementById('role-id').addEventListener('change', () => syncScopeFields(true));

    document.getElementById('btn-submit-user-role').addEventListener('click', () => {
        clearErrors();
        const payload = buildPayload();
        let valid = true;
        if (!payload.user_id) { showFieldError('user-id-error', 'User wajib dipilih.'); valid = false; }
        if (!payload.role_id) { showFieldError('role-id-error', 'Role wajib dipilih.'); valid = false; }
        if (payload.role_id === 2 && !payload.client_id) { showFieldError('client-id-error', 'Client wajib dipilih untuk role ini.'); valid = false; }
        if (payload.role_id === 3 && !payload.merchant_outlet_id) { showFieldError('merchant-outlet-id-error', 'Outlet wajib dipilih untuk role ini.'); valid = false; }
        if (payload.role_id === 4 && !payload.merchant_id) { showFieldError('merchant-id-error', 'Merchant wajib dipilih untuk role ini.'); valid = false; }
        if (!valid) return;

        setLoading('btn-submit-user-role', true);
        fetch(payload.id ? '{{ route('user_roles.update') }}' : '{{ route('user_roles.store') }}', {
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
                toggleModal('modal-user-role', false);
                showToast(data.message || 'User role berhasil disimpan.', 'success');
                fetchUserRoles();
            } else {
                const errors = data.errors || {};
                if (errors.user_id) showFieldError('user-id-error', errors.user_id[0]);
                if (errors.role_id) showFieldError('role-id-error', errors.role_id[0]);
                if (errors.client_id) showFieldError('client-id-error', errors.client_id[0]);
                if (errors.merchant_id) showFieldError('merchant-id-error', errors.merchant_id[0]);
                if (errors.merchant_outlet_id) showFieldError('merchant-outlet-id-error', errors.merchant_outlet_id[0]);
                if (!Object.keys(errors).length) showAlert(data.message || 'Terjadi kesalahan. Coba lagi.');
            }
        })
        .catch(() => showAlert('Gagal terhubung ke server.'))
        .finally(() => setLoading('btn-submit-user-role', false, '<span class="material-symbols-outlined text-[18px]">save</span> Simpan User Role'));
    });

    document.getElementById('btn-cancel-delete').addEventListener('click', () => {
        deleteTargetId = null;
        toggleModal('modal-delete-user-role', false);
    });

    document.getElementById('btn-confirm-delete').addEventListener('click', () => {
        if (!deleteTargetId) return;
        setLoading('btn-confirm-delete', true);
        fetch('{{ route('user_roles.destroy') }}', {
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
                toggleModal('modal-delete-user-role', false);
                showToast(data.message || 'User role berhasil dihapus.', 'success');
                fetchUserRoles();
            } else {
                showToast(data.message || 'Gagal menghapus user role.', 'error');
            }
        })
        .catch(() => {
            toggleModal('modal-delete-user-role', false);
            showToast('Gagal terhubung ke server.', 'error');
        })
        .finally(() => {
            deleteTargetId = null;
            setLoading('btn-confirm-delete', false, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');
        });
    });

    document.getElementById('search-input').addEventListener('input', () => {
        currentPage = 1;
        renderTable();
    });
    document.getElementById('btn-refresh').addEventListener('click', fetchUserRoles);

    fillScopeSelects();
    fetchUserRoles();
});
    </script>
    {{-- @endsection --}}

</x-app-layout>