@extends('viller.app')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
    <div>
        <h2 class="mb-1 font-headline-xl text-headline-xl text-on-surface">Hierarki Klien</h2>
        <p class="font-body-md text-body-md text-secondary">Kelola struktur klien, group, dan merchant yang terhubung.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <button id="btn-add-outlet"
            class="px-5 py-2.5 rounded-lg border border-outline-variant text-on-surface font-data-tabular hover:bg-surface-container transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]">point_of_sale</span>
            Tambah Outlet
        </button>
        <button id="btn-add-group"
            class="px-5 py-2.5 rounded-lg border border-outline-variant text-on-surface font-data-tabular hover:bg-surface-container transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]">account_tree</span>
            Tambah Group
        </button>
        <button id="btn-add-merchant"
            class="px-5 py-2.5 rounded-lg border border-outline-variant text-on-surface font-data-tabular hover:bg-surface-container transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]">storefront</span>
            Tambah Merchant
        </button>
        <button id="btn-add-client"
            class="px-5 py-2.5 rounded-lg bg-primary text-on-primary font-data-tabular hover:opacity-90 shadow-sm transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]">domain_add</span>
            Tambah Klien
        </button>
    </div>
</div>
@endsection

@section('content')
<style>
    .hierarchy-card { transition: all 0.2s ease; }
    .hierarchy-card:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06); }
    #toast-notification { transition: all 0.3s ease; transform: translateY(100px); opacity: 0; }
    #toast-notification.show { transform: translateY(0); opacity: 1; }
</style>

<div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">
    <div class="relative w-full md:w-96">
        <span class="absolute -translate-y-1/2 material-symbols-outlined left-3 top-1/2 text-secondary">search</span>
        <input id="search-input"
            class="w-full py-2.5 pl-10 pr-4 transition-all border rounded-lg bg-surface-bright border-outline-variant text-body-sm font-body-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary"
            placeholder="Cari klien, group, atau merchant..." type="text">
    </div>
    <button id="btn-refresh"
        class="px-5 py-2.5 rounded-lg border border-outline-variant text-on-surface font-data-tabular hover:bg-surface-container transition-colors flex items-center gap-2">
        <span class="material-symbols-outlined text-[20px]">refresh</span>
        Refresh
    </button>
</div>

<div id="summary-grid" class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-4">
    <div class="p-5 bg-white border rounded-2xl border-outline-variant">
        <p class="font-label-caps text-label-caps text-on-surface-variant">Client</p>
        <p id="summary-clients" class="mt-1 font-headline-lg text-headline-lg text-on-surface">0</p>
    </div>
    <div class="p-5 bg-white border rounded-2xl border-outline-variant">
        <p class="font-label-caps text-label-caps text-on-surface-variant">Group</p>
        <p id="summary-groups" class="mt-1 font-headline-lg text-headline-lg text-on-surface">0</p>
    </div>
    <div class="p-5 bg-white border rounded-2xl border-outline-variant">
        <p class="font-label-caps text-label-caps text-on-surface-variant">Merchant</p>
        <p id="summary-merchants" class="mt-1 font-headline-lg text-headline-lg text-on-surface">0</p>
    </div>
    <div class="p-5 bg-white border rounded-2xl border-outline-variant">
        <p class="font-label-caps text-label-caps text-on-surface-variant">Outlet</p>
        <p id="summary-outlets" class="mt-1 font-headline-lg text-headline-lg text-on-surface">0</p>
    </div>
</div>

<div id="hierarchy-grid" class="grid grid-cols-1 xl:grid-cols-2 gap-card-gap">
    <div class="p-6 bg-white border rounded-2xl border-outline-variant">
        <div class="flex items-center gap-3 text-on-surface-variant">
            <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
            Memuat hierarki...
        </div>
    </div>
</div>

<div class="fixed inset-0 z-50 hidden" id="entity-modal">
    <div class="absolute inset-0 bg-inverse-surface/30 backdrop-blur-sm" id="entity-backdrop"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="relative w-full max-w-[560px] bg-white/90 backdrop-blur-xl rounded-2xl shadow-[0px_10px_40px_rgba(0,0,0,0.08)] border border-white/20 overflow-hidden flex flex-col">
            <div class="flex items-center justify-between px-6 py-5 border-b border-surface-variant">
                <h3 id="entity-title" class="font-headline-lg text-headline-lg text-on-surface">Tambah Data</h3>
                <button id="btn-close-entity" class="transition-colors text-secondary hover:text-error">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="flex-1 p-6 space-y-5 overflow-y-auto max-h-[70vh]">
                <input type="hidden" id="entity-type">
                <input type="hidden" id="entity-id">
                <div id="entity-alert" class="hidden px-4 py-3 rounded-xl text-body-sm font-body-sm"></div>

                <div id="client-fields" class="space-y-5">
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="client-name">Nama Klien</label>
                        <input id="client-name"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all"
                            placeholder="Masukkan nama entitas klien" type="text">
                        <p id="client-name-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                </div>

                <div id="group-fields" class="hidden space-y-5">
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="group-client-id">Client</label>
                        <select id="group-client-id"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all">
                        </select>
                        <p id="group-client-id-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="group-name">Nama Group</label>
                        <input id="group-name"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all"
                            placeholder="Masukkan nama group" type="text">
                        <p id="group-name-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                </div>

                <div id="merchant-fields" class="hidden space-y-5">
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="merchant-client-id">Client</label>
                        <select id="merchant-client-id"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all">
                        </select>
                        <p id="merchant-client-id-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="merchant-group-id">Group</label>
                        <select id="merchant-group-id"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all">
                        </select>
                        <p id="merchant-group-id-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="merchant-name">Nama Merchant</label>
                        <input id="merchant-name"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all"
                            placeholder="Masukkan nama merchant" type="text">
                        <p id="merchant-name-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="merchant-segment-id">Segment</label>
                        <select id="merchant-segment-id"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all">
                        </select>
                        <p id="merchant-segment-id-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="first-name">First Name</label>
                            <input id="first-name" class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all" type="text">
                        </div>
                        <div>
                            <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="last-name">Last Name</label>
                            <input id="last-name" class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all" type="text">
                        </div>
                    </div>
                </div>

                <div id="outlet-fields" class="hidden space-y-5">
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="outlet-client-id">Client</label>
                        <select id="outlet-client-id"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all">
                        </select>
                        <p id="outlet-client-id-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="outlet-group-id">Group</label>
                        <select id="outlet-group-id"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all">
                        </select>
                        <p id="outlet-group-id-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="outlet-merchant-id">Merchant</label>
                        <select id="outlet-merchant-id"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all">
                        </select>
                        <p id="outlet-merchant-id-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div>
                        <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="outlet-name">Nama Outlet</label>
                        <input id="outlet-name"
                            class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all"
                            placeholder="Masukkan nama outlet" type="text">
                        <p id="outlet-name-error" class="hidden mt-1 text-xs text-error"></p>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="outlet-username">Username</label>
                            <input id="outlet-username" class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all" type="text">
                        </div>
                        <div>
                            <label class="block mb-1 font-data-tabular text-data-tabular text-on-surface-variant" for="outlet-device-uid">Device UID</label>
                            <input id="outlet-device-uid" class="w-full bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2.5 text-body-md transition-all" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-3 px-6 py-4 border-t bg-surface-container-lowest/50 border-surface-variant">
                <button id="btn-cancel-entity" class="px-4 py-2 transition-colors rounded-lg text-secondary hover:bg-surface-container font-data-tabular">Batal</button>
                <button id="btn-submit-entity" class="px-6 py-2 transition-all rounded-lg shadow-sm bg-primary text-on-primary font-data-tabular hover:opacity-90 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>

<div class="fixed inset-0 z-50 hidden" id="delete-modal">
    <div class="absolute inset-0 bg-inverse-surface/30 backdrop-blur-sm"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="w-full max-w-[420px] bg-white rounded-2xl shadow-[0px_10px_40px_rgba(0,0,0,0.10)] border border-outline-variant overflow-hidden">
            <div class="p-6 text-center">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-error-container">
                    <span class="material-symbols-outlined text-[32px] text-error">delete_forever</span>
                </div>
                <h3 class="mb-2 font-headline-lg text-headline-lg text-on-surface">Hapus Data?</h3>
                <p id="delete-text" class="font-body-md text-body-md text-on-surface-variant">Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="flex gap-3 px-6 pb-6">
                <button id="btn-cancel-delete" class="flex-1 h-[44px] rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">Batal</button>
                <button id="btn-confirm-delete" class="flex-1 h-[44px] rounded-lg font-data-tabular text-data-tabular bg-error text-white shadow-sm hover:opacity-90 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<div id="toast-notification" class="fixed bottom-6 right-6 z-[100] flex items-center gap-3 px-5 py-3.5 rounded-xl shadow-lg max-w-sm">
    <span id="toast-icon" class="material-symbols-outlined text-[22px] shrink-0"></span>
    <p id="toast-message" class="font-body-sm text-body-sm"></p>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let clients = [];
    let groups = [];
    let merchants = [];
    let outlets = [];
    let segments = [];
    let deleteTarget = null;

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' }[char]));
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

    function readJsonResponse(response) {
        return response.json().catch(() => ({ success: response.ok })).then(data => ({ response, data }));
    }

    function setLoading(btnId, isLoading, defaultText = null) {
        const btn = document.getElementById(btnId);
        btn.disabled = isLoading;
        if (isLoading) btn.innerHTML = '<span class="material-symbols-outlined text-[18px] animate-spin">progress_activity</span> Memproses...';
        else if (defaultText) btn.innerHTML = defaultText;
    }

    function byId(items, id) {
        return items.find(item => String(item.id) === String(id));
    }

    function clearErrors() {
        ['client-name', 'group-client-id', 'group-name', 'merchant-client-id', 'merchant-group-id', 'merchant-name', 'merchant-segment-id', 'outlet-client-id', 'outlet-group-id', 'outlet-merchant-id', 'outlet-name'].forEach(id => {
            const el = document.getElementById(`${id}-error`);
            if (el) {
                el.textContent = '';
                el.classList.add('hidden');
            }
        });
        document.getElementById('entity-alert').classList.add('hidden');
    }

    function showFieldError(id, message) {
        const el = document.getElementById(`${id}-error`);
        if (el) {
            el.textContent = message;
            el.classList.remove('hidden');
        }
    }

    function showAlert(message) {
        const alert = document.getElementById('entity-alert');
        alert.textContent = message;
        alert.className = 'px-4 py-3 rounded-xl text-body-sm font-body-sm bg-error-container text-on-error-container';
        alert.classList.remove('hidden');
    }

    function toggleModal(id, show) {
        document.getElementById(id).classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : '';
    }

    function fillSelect(id, items, labelKey, placeholder) {
        document.getElementById(id).innerHTML = `<option value="">${placeholder}</option>` + items.map(item =>
            `<option value="${item.id}">${escapeHtml(item[labelKey] || '-')}</option>`
        ).join('');
    }

    function groupsForClient(clientId) {
        return groups.filter(group => String(group.client_id) === String(clientId));
    }

    function merchantsForGroup(groupId) {
        return merchants.filter(merchant => String(merchant.group_id) === String(groupId));
    }

    function refreshSelects() {
        fillSelect('group-client-id', clients, 'client_name', 'Pilih client');
        fillSelect('merchant-client-id', clients, 'client_name', 'Pilih client');
        fillSelect('merchant-group-id', groupsForClient(document.getElementById('merchant-client-id').value), 'group_name', 'Pilih group');
        fillSelect('merchant-segment-id', segments, 'segment_name', 'Pilih segment');
        fillSelect('outlet-client-id', clients, 'client_name', 'Pilih client');
        fillSelect('outlet-group-id', groupsForClient(document.getElementById('outlet-client-id').value), 'group_name', 'Pilih group');
        fillSelect('outlet-merchant-id', merchantsForGroup(document.getElementById('outlet-group-id').value), 'merchant_name', 'Pilih merchant');
    }

    function renderHierarchy() {
        const search = document.getElementById('search-input').value.toLowerCase();
        const grid = document.getElementById('hierarchy-grid');
        document.getElementById('summary-clients').textContent = clients.length;
        document.getElementById('summary-groups').textContent = groups.length;
        document.getElementById('summary-merchants').textContent = merchants.length;
        document.getElementById('summary-outlets').textContent = outlets.length;

        const filteredClients = clients.filter(client => {
            const clientGroups = groupsForClient(client.id);
            const clientMerchants = merchants.filter(merchant => String(merchant.client_id) === String(client.id));
            const clientOutlets = outlets.filter(outlet => String(outlet.client_id) === String(client.id));
            return (client.client_name || '').toLowerCase().includes(search)
                || clientGroups.some(group => (group.group_name || '').toLowerCase().includes(search))
                || clientMerchants.some(merchant => (merchant.merchant_name || '').toLowerCase().includes(search))
                || clientOutlets.some(outlet => (outlet.merchant_outlet_name || '').toLowerCase().includes(search));
        });

        if (filteredClients.length === 0) {
            grid.innerHTML = `
                <div class="col-span-full p-10 text-center bg-white border rounded-2xl border-outline-variant text-on-surface-variant">
                    <span class="material-symbols-outlined text-[44px] block mb-2 opacity-50">account_tree_off</span>
                    Tidak ada data hierarki ditemukan.
                </div>`;
            return;
        }

        grid.innerHTML = filteredClients.map(client => {
            const clientGroups = groupsForClient(client.id);
            const clientMerchants = merchants.filter(merchant => String(merchant.client_id) === String(client.id));
            const clientOutlets = outlets.filter(outlet => String(outlet.client_id) === String(client.id));
            const groupBlocks = clientGroups.map(group => {
                const groupMerchants = clientMerchants.filter(merchant => String(merchant.group_id) === String(group.id));
                const merchantCards = groupMerchants.length
                    ? groupMerchants.map(merchant => {
                        const merchantOutlets = clientOutlets.filter(outlet => String(outlet.merchant_id) === String(merchant.id));
                        const outletCards = merchantOutlets.length
                            ? merchantOutlets.map(outlet => `
                                <div class="flex items-start justify-between gap-2 p-2 border rounded-md bg-white border-outline-variant/50">
                                    <div>
                                        <span class="block font-body-sm text-body-sm text-on-surface">${escapeHtml(outlet.merchant_outlet_name)}</span>
                                        <span class="font-label-caps text-label-caps text-secondary">OUT-${outlet.id}</span>
                                    </div>
                                    <div class="flex gap-1">
                                        <button onclick="openEntityModal('outlet', ${outlet.id})" class="p-1 rounded text-secondary hover:text-primary hover:bg-surface-container"><span class="material-symbols-outlined text-[16px]">edit</span></button>
                                        <button onclick="openDeleteModal('outlet', ${outlet.id})" class="p-1 rounded text-secondary hover:text-error hover:bg-error-container"><span class="material-symbols-outlined text-[16px]">delete</span></button>
                                    </div>
                                </div>`).join('')
                            : '<div class="p-2 text-xs border border-dashed rounded-md text-on-surface-variant border-outline-variant">Belum ada outlet.</div>';
                        return `
                            <div class="p-3 border rounded-lg bg-surface-bright border-outline-variant/50">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <span class="block font-data-tabular text-data-tabular text-on-surface">${escapeHtml(merchant.merchant_name)}</span>
                                        <span class="font-label-caps text-label-caps text-secondary">MER-${merchant.id} · ${merchantOutlets.length} Outlet</span>
                                    </div>
                                    <div class="flex gap-1">
                                        <button onclick="openEntityModal('merchant', ${merchant.id})" class="p-1 rounded text-secondary hover:text-primary hover:bg-surface-container"><span class="material-symbols-outlined text-[18px]">edit</span></button>
                                        <button onclick="openDeleteModal('merchant', ${merchant.id})" class="p-1 rounded text-secondary hover:text-error hover:bg-error-container"><span class="material-symbols-outlined text-[18px]">delete</span></button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-2 mt-3">${outletCards}</div>
                                <button onclick="openEntityModal('outlet', null, ${client.id}, ${group.id}, ${merchant.id})" class="flex items-center justify-center w-full gap-2 p-2 mt-2 transition-colors border border-dashed rounded-md bg-white border-outline-variant text-secondary hover:text-primary hover:border-primary hover:bg-surface-container">
                                    <span class="material-symbols-outlined text-[16px]">add</span>
                                    <span class="font-label-caps text-label-caps">Tambah Outlet</span>
                                </button>
                            </div>`;
                    }).join('')
                    : '<div class="p-3 text-sm border border-dashed rounded-lg text-on-surface-variant border-outline-variant">Belum ada merchant.</div>';
                return `
                    <div class="p-4 border rounded-xl border-outline-variant/70 bg-white/70">
                        <div class="flex items-center justify-between gap-3 mb-3">
                            <div>
                                <h4 class="font-data-tabular text-data-tabular text-on-surface">${escapeHtml(group.group_name)}</h4>
                                <p class="font-label-caps text-label-caps text-secondary">GROUP-${group.id}</p>
                            </div>
                            <div class="flex gap-1">
                                <button onclick="openEntityModal('group', ${group.id})" class="p-2 transition-colors rounded-full text-secondary hover:text-primary hover:bg-surface-container"><span class="material-symbols-outlined text-[18px]">edit</span></button>
                                <button onclick="openDeleteModal('group', ${group.id})" class="p-2 transition-colors rounded-full text-secondary hover:text-error hover:bg-error-container"><span class="material-symbols-outlined text-[18px]">delete</span></button>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-3">${merchantCards}</div>
                        <button onclick="openEntityModal('merchant', null, ${client.id}, ${group.id})" class="flex items-center justify-center w-full gap-2 p-3 mt-3 transition-colors border border-dashed rounded-lg bg-surface-container-low border-outline-variant text-secondary hover:text-primary hover:border-primary hover:bg-surface-container">
                            <span class="material-symbols-outlined text-[18px]">add</span>
                            <span class="font-data-tabular text-data-tabular">Tambah Merchant</span>
                        </button>
                    </div>`;
            }).join('');

            return `
                <div class="hierarchy-card bg-surface rounded-2xl p-6 shadow-[0px_4px_20px_rgba(0,0,0,0.03)] border border-surface-variant">
                    <div class="flex items-start justify-between gap-4 mb-6">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-surface-container-high text-primary">
                                <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">corporate_fare</span>
                            </div>
                            <div>
                                <h3 class="font-headline-lg text-headline-lg text-on-surface">${escapeHtml(client.client_name)}</h3>
                                <p class="flex items-center gap-1 mt-1 font-body-sm text-body-sm text-secondary">
                                    <span class="material-symbols-outlined text-[16px]">tag</span> CLI-${client.id}
                                </p>
                            </div>
                        </div>
                        <div class="flex gap-1">
                            <button onclick="openEntityModal('client', ${client.id})" class="p-2 transition-colors rounded-full text-secondary hover:text-primary hover:bg-surface-container"><span class="material-symbols-outlined">edit</span></button>
                            <button onclick="openDeleteModal('client', ${client.id})" class="p-2 transition-colors rounded-full text-secondary hover:text-error hover:bg-error-container"><span class="material-symbols-outlined">delete</span></button>
                        </div>
                    </div>
                    <div class="pt-4 border-t border-surface-variant">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="font-label-caps text-label-caps text-on-surface-variant">Group Terhubung (${clientGroups.length})</h4>
                            <span class="font-label-caps text-label-caps text-secondary">${clientMerchants.length} Merchant · ${clientOutlets.length} Outlet</span>
                        </div>
                        <div class="grid grid-cols-1 gap-3">
                            ${groupBlocks || '<div class="p-4 text-sm border border-dashed rounded-xl text-on-surface-variant border-outline-variant">Belum ada group.</div>'}
                            <button onclick="openEntityModal('group', null, ${client.id})" class="flex items-center justify-center gap-2 p-3 transition-colors border border-dashed rounded-lg cursor-pointer bg-surface-container-low border-outline-variant text-secondary hover:text-primary hover:border-primary hover:bg-surface-container">
                                <span class="material-symbols-outlined text-[18px]">add</span>
                                <span class="font-data-tabular text-data-tabular">Tambah Group</span>
                            </button>
                        </div>
                    </div>
                </div>`;
        }).join('');
    }

    function fetchJson(url, body = {}) {
        return fetch(url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify(body)
        }).then(response => response.json());
    }

    function loadAll() {
        document.getElementById('hierarchy-grid').innerHTML = `
            <div class="p-6 bg-white border rounded-2xl border-outline-variant">
                <div class="flex items-center gap-3 text-on-surface-variant">
                    <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>
                    Memuat hierarki...
                </div>
            </div>`;
        Promise.all([
            fetchJson('{{ route('clients.getAll') }}'),
            fetchJson('{{ route('groups.getAll') }}'),
            fetchJson('{{ route('merchants.getAll') }}'),
            fetchJson('{{ route('merchant_outlets.getAll') }}'),
            fetchJson('{{ route('segments.getAll') }}')
        ]).then(([clientJson, groupJson, merchantJson, outletJson, segmentJson]) => {
            clients = clientJson.data || [];
            groups = groupJson.data || [];
            merchants = merchantJson.data || [];
            outlets = outletJson.data || [];
            segments = segmentJson.data || [];
            refreshSelects();
            renderHierarchy();
        }).catch(() => {
            showToast('Gagal memuat data hierarki.', 'error');
        });
    }

    function currentEntity() {
        const type = document.getElementById('entity-type').value;
        const id = document.getElementById('entity-id').value;
        if (type === 'client') return byId(clients, id);
        if (type === 'group') return byId(groups, id);
        if (type === 'merchant') return byId(merchants, id);
        if (type === 'outlet') return byId(outlets, id);
        return null;
    }

    function openEntityModal(type, id = null, clientId = null, groupId = null, merchantId = null) {
        clearErrors();
        refreshSelects();
        document.getElementById('entity-type').value = type;
        document.getElementById('entity-id').value = id || '';
        document.getElementById('client-fields').classList.toggle('hidden', type !== 'client');
        document.getElementById('group-fields').classList.toggle('hidden', type !== 'group');
        document.getElementById('merchant-fields').classList.toggle('hidden', type !== 'merchant');
        document.getElementById('outlet-fields').classList.toggle('hidden', type !== 'outlet');
        document.getElementById('entity-title').textContent = `${id ? 'Edit' : 'Tambah'} ${type === 'client' ? 'Klien' : type === 'group' ? 'Group' : type === 'merchant' ? 'Merchant' : 'Merchant Outlet'}`;

        document.getElementById('client-name').value = '';
        document.getElementById('group-client-id').value = clientId || '';
        document.getElementById('group-name').value = '';
        document.getElementById('merchant-client-id').value = clientId || '';
        fillSelect('merchant-group-id', groupsForClient(clientId || ''), 'group_name', 'Pilih group');
        document.getElementById('merchant-group-id').value = groupId || '';
        document.getElementById('merchant-name').value = '';
        document.getElementById('merchant-segment-id').value = '';
        document.getElementById('first-name').value = '';
        document.getElementById('last-name').value = '';
        document.getElementById('outlet-client-id').value = clientId || '';
        fillSelect('outlet-group-id', groupsForClient(clientId || ''), 'group_name', 'Pilih group');
        document.getElementById('outlet-group-id').value = groupId || '';
        fillSelect('outlet-merchant-id', merchantsForGroup(groupId || ''), 'merchant_name', 'Pilih merchant');
        document.getElementById('outlet-merchant-id').value = merchantId || '';
        document.getElementById('outlet-name').value = '';
        document.getElementById('outlet-username').value = '';
        document.getElementById('outlet-device-uid').value = '';

        const entity = currentEntity();
        if (entity && type === 'client') document.getElementById('client-name').value = entity.client_name || '';
        if (entity && type === 'group') {
            document.getElementById('group-client-id').value = entity.client_id || '';
            document.getElementById('group-name').value = entity.group_name || '';
        }
        if (entity && type === 'merchant') {
            document.getElementById('merchant-client-id').value = entity.client_id || '';
            fillSelect('merchant-group-id', groupsForClient(entity.client_id || ''), 'group_name', 'Pilih group');
            document.getElementById('merchant-group-id').value = entity.group_id || '';
            document.getElementById('merchant-name').value = entity.merchant_name || '';
            document.getElementById('merchant-segment-id').value = entity.segment_id || '';
            document.getElementById('first-name').value = entity.first_name || '';
            document.getElementById('last-name').value = entity.last_name || '';
        }
        if (entity && type === 'outlet') {
            document.getElementById('outlet-client-id').value = entity.client_id || '';
            fillSelect('outlet-group-id', groupsForClient(entity.client_id || ''), 'group_name', 'Pilih group');
            document.getElementById('outlet-group-id').value = entity.group_id || '';
            fillSelect('outlet-merchant-id', merchantsForGroup(entity.group_id || ''), 'merchant_name', 'Pilih merchant');
            document.getElementById('outlet-merchant-id').value = entity.merchant_id || '';
            document.getElementById('outlet-name').value = entity.merchant_outlet_name || '';
            document.getElementById('outlet-username').value = entity.username || '';
            document.getElementById('outlet-device-uid').value = entity.device_uid || '';
        }

        toggleModal('entity-modal', true);
    }

    function buildPayload() {
        const type = document.getElementById('entity-type').value;
        const id = document.getElementById('entity-id').value;
        if (type === 'client') return { id, client_name: document.getElementById('client-name').value.trim() };
        if (type === 'group') {
            const client = byId(clients, document.getElementById('group-client-id').value);
            return {
                id,
                client_id: document.getElementById('group-client-id').value,
                client_name: client?.client_name || '',
                group_name: document.getElementById('group-name').value.trim(),
            };
        }
        if (type === 'outlet') {
            const client = byId(clients, document.getElementById('outlet-client-id').value);
            const group = byId(groups, document.getElementById('outlet-group-id').value);
            const merchant = byId(merchants, document.getElementById('outlet-merchant-id').value);
            return {
                id,
                client_id: document.getElementById('outlet-client-id').value,
                client_name: client?.client_name || '',
                group_id: document.getElementById('outlet-group-id').value,
                group_name: group?.group_name || '',
                merchant_id: document.getElementById('outlet-merchant-id').value,
                merchant_name: merchant?.merchant_name || '',
                merchant_outlet_name: document.getElementById('outlet-name').value.trim(),
                segment_id: merchant?.segment_id || 0,
                segment_name: merchant?.segment_name || '',
                username: document.getElementById('outlet-username').value.trim(),
                device_uid: document.getElementById('outlet-device-uid').value.trim(),
            };
        }
        const client = byId(clients, document.getElementById('merchant-client-id').value);
        const group = byId(groups, document.getElementById('merchant-group-id').value);
        const segment = byId(segments, document.getElementById('merchant-segment-id').value);
        return {
            id,
            client_id: document.getElementById('merchant-client-id').value,
            client_name: client?.client_name || '',
            group_id: document.getElementById('merchant-group-id').value,
            group_name: group?.group_name || '',
            merchant_name: document.getElementById('merchant-name').value.trim(),
            segment_id: document.getElementById('merchant-segment-id').value,
            segment_name: segment?.segment_name || '',
            first_name: document.getElementById('first-name').value.trim(),
            last_name: document.getElementById('last-name').value.trim(),
        };
    }

    function validatePayload(type, payload) {
        let valid = true;
        if (type === 'client' && !payload.client_name) { showFieldError('client-name', 'Nama client wajib diisi.'); valid = false; }
        if (type === 'group') {
            if (!payload.client_id) { showFieldError('group-client-id', 'Client wajib dipilih.'); valid = false; }
            if (!payload.group_name) { showFieldError('group-name', 'Nama group wajib diisi.'); valid = false; }
        }
        if (type === 'merchant') {
            if (!payload.client_id) { showFieldError('merchant-client-id', 'Client wajib dipilih.'); valid = false; }
            if (!payload.group_id) { showFieldError('merchant-group-id', 'Group wajib dipilih.'); valid = false; }
            if (!payload.merchant_name) { showFieldError('merchant-name', 'Nama merchant wajib diisi.'); valid = false; }
            if (!payload.segment_id) { showFieldError('merchant-segment-id', 'Segment wajib dipilih.'); valid = false; }
        }
        if (type === 'outlet') {
            if (!payload.client_id) { showFieldError('outlet-client-id', 'Client wajib dipilih.'); valid = false; }
            if (!payload.group_id) { showFieldError('outlet-group-id', 'Group wajib dipilih.'); valid = false; }
            if (!payload.merchant_id) { showFieldError('outlet-merchant-id', 'Merchant wajib dipilih.'); valid = false; }
            if (!payload.merchant_outlet_name) { showFieldError('outlet-name', 'Nama outlet wajib diisi.'); valid = false; }
        }
        return valid;
    }

    function endpointFor(type, id) {
        if (type === 'client') return id ? '{{ route('clients.update') }}' : '{{ route('clients.store') }}';
        if (type === 'group') return id ? '{{ route('groups.update') }}' : '{{ route('groups.store') }}';
        if (type === 'outlet') return id ? '{{ route('merchant_outlets.update') }}' : '{{ route('merchant_outlets.store') }}';
        return id ? '{{ route('merchants.update') }}' : '{{ route('merchants.store') }}';
    }

    function deleteEndpoint(type) {
        if (type === 'client') return '{{ route('clients.destroy') }}';
        if (type === 'group') return '{{ route('groups.destroy') }}';
        if (type === 'outlet') return '{{ route('merchant_outlets.destroy') }}';
        return '{{ route('merchants.destroy') }}';
    }

    window.openEntityModal = openEntityModal;
    window.openDeleteModal = (type, id) => {
        deleteTarget = { type, id };
        const label = type === 'client' ? byId(clients, id)?.client_name : type === 'group' ? byId(groups, id)?.group_name : type === 'merchant' ? byId(merchants, id)?.merchant_name : byId(outlets, id)?.merchant_outlet_name;
        document.getElementById('delete-text').textContent = `${label || 'Data'} akan dihapus secara permanen.`;
        toggleModal('delete-modal', true);
    };

    document.getElementById('btn-add-client').addEventListener('click', () => openEntityModal('client'));
    document.getElementById('btn-add-group').addEventListener('click', () => openEntityModal('group'));
    document.getElementById('btn-add-merchant').addEventListener('click', () => openEntityModal('merchant'));
    document.getElementById('btn-add-outlet').addEventListener('click', () => openEntityModal('outlet'));
    document.getElementById('btn-refresh').addEventListener('click', loadAll);
    document.getElementById('search-input').addEventListener('input', renderHierarchy);
    document.getElementById('merchant-client-id').addEventListener('change', () => {
        fillSelect('merchant-group-id', groupsForClient(document.getElementById('merchant-client-id').value), 'group_name', 'Pilih group');
    });
    document.getElementById('outlet-client-id').addEventListener('change', () => {
        fillSelect('outlet-group-id', groupsForClient(document.getElementById('outlet-client-id').value), 'group_name', 'Pilih group');
        fillSelect('outlet-merchant-id', [], 'merchant_name', 'Pilih merchant');
    });
    document.getElementById('outlet-group-id').addEventListener('change', () => {
        fillSelect('outlet-merchant-id', merchantsForGroup(document.getElementById('outlet-group-id').value), 'merchant_name', 'Pilih merchant');
    });

    ['btn-close-entity', 'btn-cancel-entity', 'entity-backdrop'].forEach(id => {
        document.getElementById(id).addEventListener('click', () => toggleModal('entity-modal', false));
    });
    document.getElementById('btn-cancel-delete').addEventListener('click', () => toggleModal('delete-modal', false));

    document.getElementById('btn-submit-entity').addEventListener('click', () => {
        clearErrors();
        const type = document.getElementById('entity-type').value;
        const id = document.getElementById('entity-id').value;
        const payload = buildPayload();
        if (!validatePayload(type, payload)) return;

        setLoading('btn-submit-entity', true);
        fetch(endpointFor(type, id), {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify(payload)
        })
        .then(readJsonResponse)
        .then(({ response, data }) => {
            if (response.ok && data.success !== false) {
                toggleModal('entity-modal', false);
                showToast(data.message || 'Data berhasil disimpan.', 'success');
                loadAll();
            } else {
                const errors = data.errors || {};
                Object.entries(errors).forEach(([key, messages]) => {
                    const idMap = {
                        client_name: 'client-name',
                        group_name: 'group-name',
                        client_id: type === 'group' ? 'group-client-id' : type === 'outlet' ? 'outlet-client-id' : 'merchant-client-id',
                        group_id: type === 'outlet' ? 'outlet-group-id' : 'merchant-group-id',
                        merchant_name: 'merchant-name',
                        segment_id: 'merchant-segment-id',
                        segment_name: 'merchant-segment-id',
                        merchant_id: 'outlet-merchant-id',
                        merchant_outlet_name: 'outlet-name',
                    };
                    if (idMap[key]) showFieldError(idMap[key], messages[0]);
                });
                if (!Object.keys(errors).length) showAlert(data.message || 'Terjadi kesalahan. Coba lagi.');
            }
        })
        .catch(() => showAlert('Gagal terhubung ke server.'))
        .finally(() => setLoading('btn-submit-entity', false, '<span class="material-symbols-outlined text-[18px]">save</span> Simpan Data'));
    });

    document.getElementById('btn-confirm-delete').addEventListener('click', () => {
        if (!deleteTarget) return;
        setLoading('btn-confirm-delete', true);
        fetch(deleteEndpoint(deleteTarget.type), {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({ id: deleteTarget.id })
        })
        .then(readJsonResponse)
        .then(({ response, data }) => {
            if (response.ok && data.success !== false) {
                toggleModal('delete-modal', false);
                showToast(data.message || 'Data berhasil dihapus.', 'success');
                loadAll();
            } else {
                showToast(data.message || 'Gagal menghapus data.', 'error');
            }
        })
        .catch(() => showToast('Gagal terhubung ke server.', 'error'))
        .finally(() => {
            deleteTarget = null;
            setLoading('btn-confirm-delete', false, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');
        });
    });

    loadAll();
});
</script>
@endsection
