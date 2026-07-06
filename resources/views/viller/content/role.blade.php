{{-- @extends('viller.app') --}}

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
    <div>
        <h2 class="mb-2 font-headline-xl text-headline-xl text-on-surface">Peran &amp; Otoritas</h2>
        <p class="font-body-md text-body-md text-on-surface-variant">Kelola tingkat akses dan izin fungsional untuk
            pengguna sistem.</p>
    </div>
    <button id="btn-add-role"
        class="h-[44px] px-6 bg-primary text-on-primary rounded-lg font-body-md text-body-md font-medium hover:opacity-90 transition-colors flex items-center gap-2 shadow-sm">
        <span class="material-symbols-outlined text-[20px]">add</span>
        Tambah Peran
    </button>
</div>
@endsection

{{-- @section('content') --}}
<x-app-layout>

    <style>
        .role-card-hover {
            transition: all 0.16s ease;
        }

        .role-card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(11, 28, 48, 0.08);
        }

        .table-row-hover {
            transition: all 0.15s ease;
        }

        .table-row-hover:hover {
            background-color: #f8fafe;
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

    <div class="grid items-start grid-cols-12 gap-card-gap">
        <div class="flex flex-col col-span-12 gap-4 md:col-span-4">
            <div
                class="flex items-center gap-3 p-4 bg-white border rounded-[24px] border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.03)]">
                <span class="material-symbols-outlined text-on-surface-variant">search</span>
                <input id="search-input" name="role-table-search" autocomplete="new-password"
                    class="w-full bg-transparent border-none outline-none focus:ring-0 text-body-sm font-body-sm text-on-surface placeholder:text-on-surface-variant"
                    placeholder="Cari nama atau kode peran..." type="text">
            </div>
            <div id="roles-card-list" class="flex flex-col gap-4">
                <div class="p-6 bg-white border rounded-[24px] border-outline-variant">
                    <div class="flex items-center gap-3 text-on-surface-variant">
                        <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
                        Memuat peran...
                    </div>
                </div>
            </div>
        </div>

        <div
            class="col-span-12 md:col-span-8 bg-white rounded-[24px] border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col min-h-[620px]">
            <div
                class="flex flex-col gap-4 p-6 border-b md:flex-row md:items-center md:justify-between border-outline-variant bg-surface-bright">
                <div>
                    <h3 id="detail-title" class="mb-1 font-headline-lg text-headline-lg text-on-surface">Daftar Peran
                    </h3>
                    <p id="detail-subtitle" class="font-body-sm text-body-sm text-on-surface-variant">Pilih salah satu
                        peran
                        untuk melihat detailnya.</p>
                </div>
                <div class="flex gap-3">
                    <button id="btn-refresh"
                        class="h-[40px] px-4 border border-outline-variant rounded-lg font-body-sm text-body-sm font-medium text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">refresh</span>
                        Refresh
                    </button>
                    <button id="btn-edit-selected"
                        class="h-[40px] px-4 border border-outline-variant rounded-lg font-body-sm text-body-sm font-medium text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2 disabled:opacity-40 disabled:cursor-not-allowed"
                        disabled>
                        <span class="material-symbols-outlined text-[18px]">edit</span>
                        Edit
                    </button>
                </div>
            </div>

            <div id="selected-summary"
                class="grid grid-cols-1 gap-3 px-6 py-5 border-b sm:grid-cols-3 border-outline-variant bg-surface-container-low/40">
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant">Nama Peran</p>
                    <p id="summary-name" class="mt-1 font-data-tabular text-data-tabular text-on-surface">-</p>
                </div>
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant">Kode</p>
                    <p id="summary-code" class="mt-1 font-data-tabular text-data-tabular text-on-surface">-</p>
                </div>
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant">Dibuat</p>
                    <p id="summary-created" class="mt-1 font-data-tabular text-data-tabular text-on-surface">-</p>
                </div>
            </div>

            <div class="flex-1 overflow-auto">
                <table id="roles-table" class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-4 border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                                NO</th>
                            <th
                                class="px-6 py-4 border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                                ROLE NAME</th>
                            <th
                                class="px-6 py-4 border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                                ROLE CODE</th>
                            <th
                                class="px-6 py-4 border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                                DIBUAT</th>
                            <th
                                class="px-6 py-4 text-center border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                                AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="roles-tbody">
                        <tr>
                            <td colspan="5"
                                class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                                <span
                                    class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
                                Memuat data...
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between p-4 bg-white border-t border-outline-variant">
                <span id="pagination-info" class="font-body-sm text-body-sm text-on-surface-variant">-</span>
                <div id="pagination-controls" class="flex gap-1"></div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden" id="modal-role">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-role"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="glass-panel w-full max-w-[520px] rounded-[24px] overflow-hidden flex flex-col"
                style="background: rgba(255,255,255,0.94); backdrop-filter: blur(16px);">
                <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/50 bg-white/60">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary">
                            <span id="modal-icon"
                                class="material-symbols-outlined text-[20px]">admin_panel_settings</span>
                        </div>
                        <h3 id="modal-title" class="font-headline-lg text-headline-lg text-on-surface">Tambah Peran</h3>
                    </div>
                    <button id="btn-close-role"
                        class="flex items-center justify-center w-8 h-8 transition-colors rounded-full text-on-surface-variant hover:text-error hover:bg-error-container/50">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <div class="p-6">
                    <input type="hidden" id="role-id">
                    <div id="role-alert" class="hidden px-4 py-3 mb-5 rounded-xl text-body-sm font-body-sm"></div>
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-1.5">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant" for="role-name">
                                Role Name <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">badge</span>
                                <input id="role-name" type="text"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                    placeholder="Contoh: Admin Sistem">
                            </div>
                            <p id="role-name-error" class="hidden ml-1 text-xs text-error"></p>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant" for="role-code">
                                Role Code <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">key</span>
                                <input id="role-code" type="text"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all uppercase"
                                    placeholder="Contoh: ADMT">
                            </div>
                            <p id="role-code-error" class="hidden ml-1 text-xs text-error"></p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-3 px-6 py-4 border-t bg-surface-bright/80 border-outline-variant/50">
                    <button id="btn-cancel-role"
                        class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">
                        Batal
                    </button>
                    <button id="btn-submit-role"
                        class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular bg-primary text-white shadow-sm hover:opacity-90 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        Simpan Peran
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden" id="modal-delete-role">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-[420px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.12)] border border-outline-variant overflow-hidden flex flex-col bg-white">
                <div class="p-6 text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-error-container">
                        <span class="material-symbols-outlined text-[32px] text-error">delete_forever</span>
                    </div>
                    <h3 class="mb-2 font-headline-lg text-headline-lg text-on-surface">Hapus Peran?</h3>
                    <p id="delete-confirm-text" class="font-body-md text-body-md text-on-surface-variant">Tindakan ini
                        tidak
                        dapat dibatalkan.</p>
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
    let allRoles = [];
    let selectedRoleId = null;
    let deleteTargetId = null;
    let currentPage = 1;
    const perPage = 8;

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

    function formatDate(dateStr) {
        if (!dateStr) return '-';
        try {
            return new Date(dateStr).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        } catch (e) {
            return dateStr;
        }
    }

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[char]));
    }

    function readJsonResponse(response) {
        return response.json()
            .catch(() => ({ success: response.ok }))
            .then(data => ({ response, data }));
    }

    function clearErrors() {
        ['role-name-error', 'role-code-error'].forEach(id => {
            const el = document.getElementById(id);
            el.textContent = '';
            el.classList.add('hidden');
        });
        document.getElementById('role-alert').classList.add('hidden');
    }

    function showFieldError(id, message) {
        const el = document.getElementById(id);
        el.textContent = message;
        el.classList.remove('hidden');
    }

    function showAlert(message) {
        const alert = document.getElementById('role-alert');
        alert.textContent = message;
        alert.className = 'px-4 py-3 mb-5 rounded-xl text-body-sm font-body-sm bg-error-container text-on-error-container';
        alert.classList.remove('hidden');
    }

    function toggleModal(id, show) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : '';
    }

    function getFilteredRoles() {
        const searchVal = document.getElementById('search-input').value.toLowerCase();
        return allRoles.filter(role =>
            (role.role_name || '').toLowerCase().includes(searchVal) ||
            (role.role_code || '').toLowerCase().includes(searchVal)
        );
    }

    function selectRole(id) {
        selectedRoleId = id;
        const role = allRoles.find(item => item.id == id);
        const editBtn = document.getElementById('btn-edit-selected');
        editBtn.disabled = !role;

        document.getElementById('detail-title').textContent = role ? `Detail Peran: ${role.role_name}` : 'Daftar Peran';
        document.getElementById('detail-subtitle').textContent = role ? `Kode ${role.role_code || '-'}` : 'Pilih salah satu peran untuk melihat detailnya.';
        document.getElementById('summary-name').textContent = role?.role_name || '-';
        document.getElementById('summary-code').textContent = role?.role_code || '-';
        document.getElementById('summary-created').textContent = role ? formatDate(role.created_at) : '-';
        renderCards();
        renderTable();
    }

    function renderCards() {
        const roles = getFilteredRoles();
        const list = document.getElementById('roles-card-list');
        if (roles.length === 0) {
            list.innerHTML = `
                <div class="p-6 bg-white border rounded-[24px] border-outline-variant text-center text-on-surface-variant">
                    <span class="material-symbols-outlined text-[36px] block mb-2 opacity-50">manage_search</span>
                    Tidak ada peran ditemukan.
                </div>`;
            return;
        }

        list.innerHTML = roles.map(role => {
            const active = role.id == selectedRoleId;
            const roleName = escapeHtml(role.role_name || '-');
            const roleCode = escapeHtml(role.role_code || '-');
            const cardClass = active
                ? 'bg-surface-container-low rounded-[24px] p-6 border-2 border-primary shadow-[0px_8px_28px_rgba(53,37,205,0.12)] relative overflow-hidden cursor-pointer'
                : 'bg-white rounded-[24px] p-6 border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.03)] role-card-hover cursor-pointer';
            return `
                <button type="button" onclick="selectRole(${role.id})" class="${cardClass} w-full text-left">
                    ${active ? '<div class="absolute top-0 right-0 w-24 h-24 rounded-bl-full opacity-50 bg-primary-fixed -z-10"></div>' : ''}
                    <div class="flex items-start justify-between gap-3 mb-2">
                        <h3 class="font-headline-lg text-[20px] font-semibold text-on-surface break-words">${roleName}</h3>
                        <span class="material-symbols-outlined ${active ? 'text-primary' : 'text-secondary'}">${active ? 'verified_user' : 'manage_accounts'}</span>
                    </div>
                    <p class="mb-4 font-body-sm text-body-sm text-on-surface-variant">Kode peran: ${roleCode}</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-white border rounded-full font-label-caps text-label-caps text-on-surface-variant border-outline-variant">ID ${role.id}</span>
                        ${active ? '<span class="px-3 py-1 border rounded-full bg-surface-container-highest font-label-caps text-label-caps text-primary border-primary-fixed-dim">DIPILIH</span>' : ''}
                    </div>
                </button>`;
        }).join('');
    }

    function renderTable() {
        const filtered = getFilteredRoles();
        const total = filtered.length;
        const totalPages = Math.max(1, Math.ceil(total / perPage));
        if (currentPage > totalPages) currentPage = totalPages;
        const start = (currentPage - 1) * perPage;
        const pageData = filtered.slice(start, start + perPage);
        const tbody = document.getElementById('roles-tbody');

        if (pageData.length === 0) {
            tbody.innerHTML = `
                <tr><td colspan="5" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                    <span class="material-symbols-outlined text-[40px] block mb-2 opacity-40">search_off</span>
                    Tidak ada data ditemukan.
                </td></tr>`;
        } else {
            tbody.innerHTML = pageData.map((role, idx) => {
                const rowIdx = start + idx + 1;
                const active = role.id == selectedRoleId;
                const roleName = escapeHtml(role.role_name || '-');
                const roleCode = escapeHtml(role.role_code || '-');
                return `
                    <tr class="table-row-hover border-b border-surface-container ${active ? 'bg-primary/5' : ''}">
                        <td class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant">${rowIdx}</td>
                        <td class="px-6 py-4 font-semibold font-data-tabular text-data-tabular text-on-surface">${roleName}</td>
                        <td class="px-6 py-4"><span class="px-2.5 py-1 rounded-full bg-surface-container-high text-primary font-label-caps text-label-caps">${roleCode}</span></td>
                        <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">${formatDate(role.created_at)}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <button onclick="selectRole(${role.id})" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-primary hover:bg-primary/10" title="Pilih">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </button>
                                <button onclick="openEditModal(${role.id})" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-primary hover:bg-primary/10" title="Edit">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </button>
                                <button onclick="openDeleteModal(${role.id})" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container" title="Hapus">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>`;
            }).join('');
        }

        const endIdx = Math.min(start + perPage, total);
        document.getElementById('pagination-info').textContent = total === 0 ? 'Tidak ada data' : `Menampilkan ${start + 1}-${endIdx} dari ${total} peran`;
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

    function fetchRoles() {
        document.getElementById('roles-tbody').innerHTML = `
            <tr><td colspan="5" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
                Memuat data...
            </td></tr>`;

        fetch('{{ route('roles.getAll') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(json => {
            allRoles = json.data || [];
            if (selectedRoleId && !allRoles.some(role => role.id == selectedRoleId)) selectedRoleId = null;
            if (!selectedRoleId && allRoles.length > 0) selectedRoleId = allRoles[0].id;
            currentPage = 1;
            selectRole(selectedRoleId);
        })
        .catch(() => {
            document.getElementById('roles-tbody').innerHTML = `
                <tr><td colspan="5" class="px-6 py-10 text-center text-error font-body-sm">
                    <span class="material-symbols-outlined text-[32px] block mb-2">cloud_off</span>
                    Gagal memuat data. Coba refresh.
                </td></tr>`;
            showToast('Gagal memuat data role.', 'error');
        });
    }

    function openRoleModal(mode, role = null) {
        clearErrors();
        document.getElementById('role-id').value = role?.id || '';
        document.getElementById('role-name').value = role?.role_name || '';
        document.getElementById('role-code').value = role?.role_code || '';
        document.getElementById('modal-title').textContent = mode === 'edit' ? 'Edit Peran' : 'Tambah Peran';
        document.getElementById('modal-icon').textContent = mode === 'edit' ? 'edit' : 'admin_panel_settings';
        document.getElementById('btn-submit-role').innerHTML = '<span class="material-symbols-outlined text-[18px]">save</span> Simpan Peran';
        toggleModal('modal-role', true);
    }

    window.openEditModal = id => {
        const role = allRoles.find(item => item.id == id);
        if (role) openRoleModal('edit', role);
    };

    window.openDeleteModal = id => {
        const role = allRoles.find(item => item.id == id);
        if (!role) return;
        deleteTargetId = id;
        document.getElementById('delete-confirm-text').textContent = `Peran "${role.role_name}" akan dihapus secara permanen.`;
        document.getElementById('btn-confirm-delete').innerHTML = '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus';
        toggleModal('modal-delete-role', true);
    };

    window.selectRole = selectRole;

    window.goPage = page => {
        const totalPages = Math.max(1, Math.ceil(getFilteredRoles().length / perPage));
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderTable();
    };

    document.getElementById('btn-add-role').addEventListener('click', () => openRoleModal('create'));
    document.getElementById('btn-edit-selected').addEventListener('click', () => {
        const role = allRoles.find(item => item.id == selectedRoleId);
        if (role) openRoleModal('edit', role);
    });

    ['btn-close-role', 'btn-cancel-role', 'backdrop-role'].forEach(id => {
        document.getElementById(id).addEventListener('click', () => toggleModal('modal-role', false));
    });

    document.getElementById('btn-submit-role').addEventListener('click', () => {
        clearErrors();
        const id = document.getElementById('role-id').value;
        const role_name = document.getElementById('role-name').value.trim();
        const role_code = document.getElementById('role-code').value.trim().toUpperCase();
        let valid = true;

        if (!role_name) { showFieldError('role-name-error', 'Role name wajib diisi.'); valid = false; }
        if (!role_code) { showFieldError('role-code-error', 'Role code wajib diisi.'); valid = false; }
        if (!valid) return;

        setLoading('btn-submit-role', true);
        fetch(id ? '{{ route('roles.update') }}' : '{{ route('roles.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ id, role_name, role_code })
        })
        .then(readJsonResponse)
        .then(({ response, data }) => {
            if (response.ok && data.success !== false) {
                toggleModal('modal-role', false);
                showToast(data.message || 'Peran berhasil disimpan.', 'success');
                selectedRoleId = data.data?.id || id || selectedRoleId;
                fetchRoles();
            } else {
                const errors = data.errors || {};
                if (errors.role_name) showFieldError('role-name-error', errors.role_name[0]);
                if (errors.role_code) showFieldError('role-code-error', errors.role_code[0]);
                if (!errors.role_name && !errors.role_code) showAlert(data.message || 'Terjadi kesalahan. Coba lagi.');
            }
        })
        .catch(() => showAlert('Gagal terhubung ke server.'))
        .finally(() => setLoading('btn-submit-role', false, '<span class="material-symbols-outlined text-[18px]">save</span> Simpan Peran'));
    });

    document.getElementById('btn-cancel-delete').addEventListener('click', () => {
        deleteTargetId = null;
        toggleModal('modal-delete-role', false);
    });

    document.getElementById('btn-confirm-delete').addEventListener('click', () => {
        if (!deleteTargetId) return;
        setLoading('btn-confirm-delete', true);
        fetch('{{ route('roles.destroy') }}', {
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
                toggleModal('modal-delete-role', false);
                showToast(data.message || 'Peran berhasil dihapus.', 'success');
                selectedRoleId = selectedRoleId == deleteTargetId ? null : selectedRoleId;
                fetchRoles();
            } else {
                showToast(data.message || 'Gagal menghapus peran.', 'error');
            }
        })
        .catch(() => {
            toggleModal('modal-delete-role', false);
            showToast('Gagal terhubung ke server.', 'error');
        })
        .finally(() => {
            deleteTargetId = null;
            setLoading('btn-confirm-delete', false, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');
        });
    });

    document.getElementById('search-input').addEventListener('input', () => {
        currentPage = 1;
        renderCards();
        renderTable();
    });
    document.getElementById('btn-refresh').addEventListener('click', fetchRoles);

    fetchRoles();
});
    </script>
    {{-- @endsection --}}
</x-app-layout>