@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center mb-card-gap">
    <div>
        <h2 class="font-headline-xl text-headline-xl text-on-surface">Product Segments</h2>
        <p class="mt-1 font-body-md text-body-md text-on-surface-variant">Kelola penugasan produk ke segmen konsumen,
            margin harga jual, dan penyesuaian biaya administrasi.</p>
    </div>
    <button
        class="bg-primary text-on-primary font-data-tabular text-data-tabular px-6 h-[44px] rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-sm"
        id="btn-add-product-segment">
        <span class="text-sm material-symbols-outlined">add</span>
        Add New Product Segment
    </button>
</div>
@endsection

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

        #product-segments-table tbody tr td {
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
            <div class="relative w-full md:w-80">
                <span
                    class="absolute text-sm -translate-y-1/2 material-symbols-outlined left-3 top-1/2 text-on-surface-variant">search</span>
                <input id="search-input" name="table-search" autocomplete="off"
                    class="w-full pl-10 pr-4 h-11 bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg text-body-sm font-body-sm text-on-surface transition-all"
                    placeholder="Cari segmen atau produk..." type="text">
            </div>
            <div class="flex items-center w-full gap-3 md:w-auto">
                <button id="btn-refresh"
                    class="flex items-center justify-center gap-2 px-4 transition-colors border rounded-lg h-11 border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-sm text-body-sm">
                    <span class="material-symbols-outlined text-[20px]">refresh</span>
                    <span class="hidden sm:inline">Refresh</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="product-segments-table" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-bright/50">
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            No</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Segment</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Product Name</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Product Code</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Provider</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Product Provider Name</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Selling Price</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Admin Fee</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Merchant Fee</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Availability</th>
                        <th
                            class="px-6 py-4 tracking-wider text-center uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="product-segments-tbody" class="bg-white">
                    <tr id="loading-row">
                        <td colspan="11"
                            class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span
                                    class="material-symbols-outlined animate-spin text-primary">progress_activity</span>Memuat
                                konfigurasi segmen produk...
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

    <div class="fixed inset-0 z-50 hidden" id="modal-product-segment">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-product-segment"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="glass-panel w-full max-w-[750px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.10)] border border-white/40 overflow-hidden flex flex-col"
                style="background: rgba(255,255,255,0.92); backdrop-filter: blur(16px);">
                <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/50 bg-white/60">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary"
                            id="modal-icon-container">
                            <span class="material-symbols-outlined text-[20px]"
                                id="modal-icon">dashboard_customize</span>
                        </div>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface" id="modal-title">Add Segment
                            Product</h3>
                    </div>
                    <button
                        class="flex items-center justify-center w-8 h-8 transition-colors rounded-full text-on-surface-variant hover:text-error hover:bg-error-container/50"
                        id="btn-close-modal">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <div class="p-6 overflow-y-auto max-h-[75vh]">
                    <input type="hidden" id="product-segment-id">
                    <div id="product-segment-alert" class="hidden px-4 py-3 mb-4 rounded-xl text-body-sm font-body-sm">
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div class="space-y-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                    for="segment_id">Segment Target <span class="text-error">*</span></label>
                                <select id="segment_id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="" disabled selected>Select Segment</option>
                                    @foreach($segments as $segment)
                                    <option value="{{ $segment['id'] }}">{{ $segment['segment_name'] }}</option>
                                    @endforeach
                                </select>
                                <p id="error-segment_id" class="hidden ml-1 text-xs text-error"></p>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                    for="provider_id">Provider Source <span class="text-error">*</span></label>
                                <select id="provider_id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="" disabled selected>Select Provider</option>
                                    @foreach($providers as $provider)
                                    <option value="{{ $provider['id'] }}">{{ $provider['provider_name'] }}</option>
                                    @endforeach
                                </select>
                                <p id="error-provider_id" class="hidden ml-1 text-xs text-error"></p>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                    for="product_provider_id">Product Provider Selection <span
                                        class="text-error">*</span></label>
                                <select id="product_provider_id" disabled
                                    class="w-full h-[44px] bg-[#E2E8F0] disabled:opacity-60 border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="" disabled selected>Select Product Provider</option>
                                </select>
                                <p id="error-product_provider_id" class="hidden ml-1 text-xs text-error"></p>
                            </div>

                            <div
                                class="p-3 bg-surface-container-low rounded-xl space-y-2 border border-outline-variant/50 text-[13px]">
                                <p class="flex items-center gap-1 font-semibold text-secondary"><span
                                        class="material-symbols-outlined text-[16px]">info</span> Vendor Base Costs
                                    (Read-only)</p>
                                <div class="grid grid-cols-2 gap-1 font-data-tabular text-on-surface-variant">
                                    <span>Base Price:</span><span id="label-base-price"
                                        class="font-medium text-right">-</span>
                                    <span>Admin Fee:</span><span id="label-base-admin"
                                        class="font-medium text-right">-</span>
                                    <span>Merchant Fee:</span><span id="label-base-merchant"
                                        class="font-medium text-right">-</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                    for="product_type_id">Product Type <span class="text-error">*</span></label>
                                <select id="product_type_id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="" disabled selected>Select Type</option>
                                    @foreach($product_types as $type)
                                    <option value="{{ $type['id'] }}">{{ $type['product_type_name'] }}</option>
                                    @endforeach
                                </select>
                                <p id="error-product_type_id" class="hidden ml-1 text-xs text-error"></p>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                    for="product_id">Assigned Catalog Product <span class="text-error">*</span></label>
                                <select id="product_id"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all">
                                    <option value="" disabled selected>Select Product</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product['id'] }}">{{ $product['product_name'] }}</option>
                                    @endforeach
                                </select>
                                <p id="error-product_id" class="hidden ml-1 text-xs text-error"></p>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                    for="product_price">Final Consumer Price (Selling) <span
                                        class="text-error">*</span></label>
                                <div class="relative">
                                    <span
                                        class="absolute font-semibold -translate-y-1/2 left-3 top-1/2 text-body-sm text-on-surface-variant">Rp</span>
                                    <input id="product_price" type="number" step="any"
                                        class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                        placeholder="0">
                                </div>
                                <p id="error-product_price" class="hidden ml-1 text-xs text-error"></p>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                    for="product_admin_fee">Consumer Admin Fee <span class="text-error">*</span></label>
                                <div class="relative">
                                    <span
                                        class="absolute font-semibold -translate-y-1/2 left-3 top-1/2 text-body-sm text-on-surface-variant">Rp</span>
                                    <input id="product_admin_fee" type="number" step="any"
                                        class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                        placeholder="0">
                                </div>
                                <p id="error-product_admin_fee" class="hidden ml-1 text-xs text-error"></p>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                    for="product_merchant_fee">Consumer Merchant Fee <span
                                        class="text-error">*</span></label>
                                <div class="relative">
                                    <span
                                        class="absolute font-semibold -translate-y-1/2 left-3 top-1/2 text-body-sm text-on-surface-variant">Rp</span>
                                    <input id="product_merchant_fee" type="number" step="any"
                                        class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                        placeholder="0">
                                </div>
                                <p id="error-product_merchant_fee" class="hidden ml-1 text-xs text-error"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-3 px-6 py-4 border-t bg-surface-bright/80 border-outline-variant/50">
                    <button id="btn-cancel-modal"
                        class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">Batal</button>
                    <button id="btn-submit-modal"
                        class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular bg-primary text-white shadow-sm hover:opacity-90 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">save</span>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden" id="modal-delete-product-segment">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-delete"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-[420px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.12)] border border-outline-variant overflow-hidden flex flex-col bg-white">
                <div class="p-6 text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-error-container">
                        <span class="material-symbols-outlined text-[32px] text-error">delete_forever</span>
                    </div>
                    <h3 class="mb-2 font-headline-lg text-headline-lg text-on-surface">Hapus Segmen Produk?</h3>
                    <p id="delete-confirm-text" class="font-body-md text-body-md text-on-surface-variant">Tindakan ini
                        akan menghapus alokasi segmen produk secara permanen.</p>
                </div>
                <div class="flex gap-3 px-6 pb-6">
                    <button id="btn-cancel-delete"
                        class="flex-1 h-[44px] rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">Batal</button>
                    <button id="btn-confirm-delete"
                        class="flex-1 h-[44px] rounded-lg font-data-tabular text-data-tabular bg-error text-white shadow-sm hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">delete</span>Ya, Hapus
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

            // Blade Object Cache Maps (Vue Replacements)
            const cachedSegments = @json($segments);
            const cachedProducts = @json($products);
            const cachedProviders = @json($providers);
            const cachedTypes = @json($product_types);

            // ========== State Pipeline Layer ==========
            let allRecords = [];
            let currentLoadedProductProviders = [];
            let currentPage = 1;
            const perPage = 10;
            let deleteTargetId = null;
            let isEditMode = false;

            // ========== Notification Toast & Formatters ==========
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

            function setLoading(btnId, isLoading, defaultText) {
                const btn = document.getElementById(btnId);
                if (!btn) return;
                btn.disabled = isLoading;
                btn.innerHTML = isLoading ? '<span class="material-symbols-outlined text-[18px] animate-spin">progress_activity</span> Memproses...' : defaultText;
            }

            function formatIDR(amount) {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount || 0);
            }

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

            function clearErrors() {
                ['segment_id', 'provider_id', 'product_provider_id', 'product_type_id', 'product_id', 'product_price', 'product_admin_fee', 'product_merchant_fee'].forEach(f => {
                    const el = document.getElementById(`error-${f}`);
                    if (el) el.classList.add('hidden');
                });
                document.getElementById('product-segment-alert').classList.add('hidden');
            }

            // ========== Synchronous Table Population From POST Sync Engine ==========
            function fetchProductSegments() {
                document.getElementById('product-segments-tbody').innerHTML = `
                    <tr id="loading-row">
                        <td colspan="11" class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>Memuat konfigurasi segmen produk...
                            </div>
                        </td>
                    </tr>`;

                fetch('{{ route('product_segments.getAll') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                })
                .then(r => { if (!r.ok) throw new Error(); return r.json(); })
                .then(json => {
                    allRecords = json.data || [];
                    currentPage = 1;
                    renderTable();
                })
                .catch(() => {
                    document.getElementById('product-segments-tbody').innerHTML = `
                        <tr><td colspan="11" class="px-6 py-10 text-center text-error font-body-sm">
                            <span class="material-symbols-outlined text-[32px] block mb-2">cloud_off</span>Gagal memetakan matrix relasi segmen produk.
                        </td></tr>`;
                });
            }

            function renderTable() {
                const searchVal = document.getElementById('search-input').value.toLowerCase();
                const filtered = allRecords.filter(p => 
                    (p.segment_name || '').toLowerCase().includes(searchVal) ||
                    (p.product_name || '').toLowerCase().includes(searchVal) ||
                    (p.product_code || '').toLowerCase().includes(searchVal) ||
                    (p.provider_name || '').toLowerCase().includes(searchVal)
                );

                const total = filtered.length;
                const totalPages = Math.max(1, Math.ceil(total / perPage));
                if (currentPage > totalPages) currentPage = totalPages;

                const start = (currentPage - 1) * perPage;
                const pageData = filtered.slice(start, start + perPage);
                const tbody = document.getElementById('product-segments-tbody');

                if (pageData.length === 0) {
                    tbody.innerHTML = `
                        <tr><td colspan="11" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                            <span class="material-symbols-outlined text-[40px] block mb-2 opacity-40">search_off</span>Data segmen produk kosong.
                        </td></tr>`;
                } else {
                    tbody.innerHTML = pageData.map((p, i) => {
                        const rowIdx = start + i + 1;
                        const bg = rowIdx % 2 === 0 ? 'bg-[#F8FAFC]/50' : '';
                        const availabilityBadge = p.product_availability === 'active' || p.product_availability === 1
                            ? `<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-label-caps text-[11px] font-semibold">Active</span>`
                            : `<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 font-label-caps text-[11px] font-semibold">Disabled</span>`;

                        return `
                            <tr class="table-row-hover border-b border-surface-container group ${bg}">
                                <td class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant">${rowIdx}</td>
                                <td class="px-6 py-4 font-semibold text-on-surface whitespace-nowrap"><span class="px-2.5 py-1 rounded-md bg-primary/5 text-primary text-[13px] font-medium border border-primary/10">${p.segment_name || '-'}</span></td>
                                <td class="px-6 py-4 font-semibold text-on-surface whitespace-nowrap">${p.product_name || '-'}</td>
                                <td class="px-6 py-4 font-medium font-data-tabular text-body-sm text-primary">${p.product_code || '-'}</td>
                                <td class="px-6 py-4 text-body-sm text-secondary whitespace-nowrap">${p.provider_name || '-'}</td>
                                <td class="px-6 py-4 text-body-sm text-secondary whitespace-nowrap">${p.product_provider_name || '-'}</td>
                                <td class="px-6 py-4 font-medium text-right font-data-tabular text-body-sm text-on-surface">${formatIDR(p.product_price)}</td>
                                <td class="px-6 py-4 text-right font-data-tabular text-body-sm text-secondary">${formatIDR(p.product_admin_fee)}</td>
                                <td class="px-6 py-4 text-right font-data-tabular text-body-sm text-secondary">${formatIDR(p.product_merchant_fee)}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${availabilityBadge}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-2">
                                        <button onclick="openFormModal(${p.id})" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-primary hover:bg-primary/10 hover:scale-110" title="Edit"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button onclick="openDeleteModal(${p.id}, '${(p.product_name||'').replace(/'/g, "\\'")}')" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container hover:scale-110" title="Hapus"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </div>
                                </td>
                            </tr>`;
                    }).join('');
                }

                document.getElementById('pagination-info').textContent = total === 0 ? 'Tidak ada data' : `Menampilkan ${start+1}–${Math.min(start + perPage, total)} dari ${total} entitas`;
                renderPagination(totalPages);
            }

            function renderPagination(totalPages) {
                const ctrl = document.getElementById('pagination-controls');
                let html = '';
                html += `<button onclick="goPage(${currentPage - 1})" ${currentPage===1 ? 'disabled' : ''} class="flex items-center justify-center w-8 h-8 transition-colors border rounded-md border-outline-variant text-on-surface-variant hover:bg-surface-container disabled:opacity-40 disabled:cursor-not-allowed"><span class="text-sm material-symbols-outlined">chevron_left</span></button>`;
                for (let p = 1; p <= totalPages; p++) {
                    if (totalPages > 7 && Math.abs(p - currentPage) > 2 && p !== 1 && p !== totalPages) {
                        if (p === 2 || p === totalPages - 1) html += `<span class="flex items-center justify-center w-8 h-8 text-on-surface-variant">...</span>`;
                        continue;
                    }
                    html += `<button onclick="goPage(${p})" class="flex items-center justify-center w-8 h-8 rounded-md font-data-tabular transition-colors ${p===currentPage ? 'bg-primary text-white' : 'hover:bg-surface-container text-on-surface'}">${p}</button>`;
                }
                html += `<button onclick="goPage(${currentPage + 1})" ${currentPage===totalPages ? 'disabled' : ''} class="flex items-center justify-center w-8 h-8 transition-colors border rounded-md border-outline-variant text-on-surface-variant hover:bg-surface-container disabled:opacity-40 disabled:cursor-not-allowed"><span class="text-sm material-symbols-outlined">chevron_right</span></button>`;
                ctrl.innerHTML = html;
            }

            window.goPage = (p) => { currentPage = p; renderTable(); };

            // ========== Reaktivitas Dropdown Bertingkat (Asynchronous Dependent Dropdown) ==========
            function loadProductProvidersByProvider(providerId, selectedProductProviderId = null) {
                const dropdown = document.getElementById('product_provider_id');
                dropdown.disabled = true;
                dropdown.className = "w-full h-[44px] bg-[#E2E8F0] disabled:opacity-60 border-transparent rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all";
                dropdown.innerHTML = '<option value="" disabled selected>Loading Product Providers...</option>';

                fetch('{{ route('product_providers.getAll') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ provider_id: parseInt(providerId) })
                })
                .then(r => r.json())
                .then(json => {
                    currentLoadedProductProviders = json.data || [];
                    dropdown.innerHTML = '<option value="" disabled selected>Select Product Provider</option>';
                    
                    currentLoadedProductProviders.forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.id;
                        opt.textContent = item.product_provider_name;
                        if (selectedProductProviderId && item.id == selectedProductProviderId) {
                            opt.selected = true;
                        }
                        dropdown.appendChild(opt);
                    });

                    dropdown.disabled = false;
                    dropdown.className = "w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all";
                    
                    if (selectedProductProviderId) {
                        updateBaseCostLabels(selectedProductProviderId);
                    }
                })
                .catch(() => {
                    dropdown.innerHTML = '<option value="" disabled selected>Gagal memuat data provider</option>';
                });
            }

            function updateBaseCostLabels(productProviderId) {
                const target = currentLoadedProductProviders.find(p => p.id == productProviderId);
                if (target) {
                    document.getElementById('label-base-price').textContent = formatIDR(target.product_provider_price);
                    document.getElementById('label-base-admin').textContent = formatIDR(target.product_provider_admin_fee);
                    document.getElementById('label-base-merchant').textContent = formatIDR(target.product_provider_merchant_fee);
                    
                    // Autofill default consumer price equal to base cost upon conversion if creating new
                    if (!isEditMode) {
                        document.getElementById('product-price').value = target.product_provider_price;
                    }
                } else {
                    resetBaseCostLabels();
                }
            }

            function resetBaseCostLabels() {
                document.getElementById('label-base-price').textContent = '-';
                document.getElementById('label-base-admin').textContent = '-';
                document.getElementById('label-base-merchant').textContent = '-';
            }

            document.getElementById('provider_id').addEventListener('change', (e) => {
                resetBaseCostLabels();
                loadProductProvidersByProvider(e.target.value);
            });

            document.getElementById('product_provider_id').addEventListener('change', (e) => {
                updateBaseCostLabels(e.target.value);
            });

            // ========== Form Entry & Workflow States ==========
            document.getElementById('btn-add-product-segment').addEventListener('click', () => {
                isEditMode = false;
                clearErrors();
                resetBaseCostLabels();
                
                document.getElementById('product-segment-id').value = '';
                document.getElementById('segment_id').value = '';
                document.getElementById('provider_id').value = '';
                
                const pProviderDropdown = document.getElementById('product_provider_id');
                pProviderDropdown.innerHTML = '<option value="" disabled selected>Select Product Provider</option>';
                pProviderDropdown.disabled = true;
                pProviderDropdown.className = "w-full h-[44px] bg-[#E2E8F0] disabled:opacity-60 border-transparent rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all";

                document.getElementById('product_type_id').value = '';
                document.getElementById('product_id').value = '';
                document.getElementById('product_price').value = '';
                document.getElementById('product_admin_fee').value = '';
                document.getElementById('product_merchant_fee').value = '';

                document.getElementById('modal-title').textContent = 'Add Segment Product';
                document.getElementById('modal-icon').textContent = 'dashboard_customize';
                document.getElementById('modal-icon-container').className = 'flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary';
                toggleModal('modal-product-segment', true);
            });

            window.openFormModal = (id) => {
                const target = allRecords.find(r => r.id == id);
                if (!target) return;
                isEditMode = true;
                clearErrors();

                document.getElementById('product-segment-id').value = target.id;
                document.getElementById('segment_id').value = target.segment_id || '';
                document.getElementById('provider_id').value = target.provider_id || '';
                
                // Trigger load dependent array to match target entity configurations
                if (target.provider_id) {
                    loadProductProvidersByProvider(target.provider_id, target.product_provider_id);
                }

                document.getElementById('product_type_id').value = target.product_type_id || '';
                document.getElementById('product_id').value = target.product_id || '';
                document.getElementById('product_price').value = target.product_price || 0;
                document.getElementById('product_admin_fee').value = target.product_admin_fee || 0;
                document.getElementById('product_merchant_fee').value = target.product_merchant_fee || 0;

                document.getElementById('modal-title').textContent = 'Edit Segment Product';
                document.getElementById('modal-icon').textContent = 'edit';
                document.getElementById('modal-icon-container').className = 'flex items-center justify-center w-9 h-9 rounded-xl bg-amber-50 text-amber-700';
                toggleModal('modal-product-segment', true);
            };

            ['btn-close-modal', 'btn-cancel-modal', 'backdrop-product-segment'].forEach(id => {
                document.getElementById(id).addEventListener('click', () => toggleModal('modal-product-segment', false));
            });

            document.getElementById('btn-submit-modal').addEventListener('click', () => {
                clearErrors();

                const id = document.getElementById('product-segment-id').value;
                const segmentId = document.getElementById('segment_id').value;
                const providerId = document.getElementById('provider_id').value;
                const productProviderId = document.getElementById('product_provider_id').value;
                const productTypeId = document.getElementById('product_type_id').value;
                const productId = document.getElementById('product_id').value;
                const price = document.getElementById('product_price').value;
                const adminFee = document.getElementById('product_admin_fee').value;
                const merchantFee = document.getElementById('product_merchant_fee').value;

                let isValid = true;
                if (!segmentId) { document.getElementById('error-segment_id').textContent = 'Pilih segmen target.'; document.getElementById('error-segment_id').classList.remove('hidden'); isValid = false; }
                if (!providerId) { document.getElementById('error-provider_id').textContent = 'Pilih provider asal.'; document.getElementById('error-provider_id').classList.remove('hidden'); isValid = false; }
                if (!productProviderId) { document.getElementById('error-product_provider_id').textContent = 'Pilih produk vendor.'; document.getElementById('error-product_provider_id').classList.remove('hidden'); isValid = false; }
                if (!productTypeId) { document.getElementById('error-product_type_id').textContent = 'Pilih jenis produk.'; document.getElementById('error-product_type_id').classList.remove('hidden'); isValid = false; }
                if (!productId) { document.getElementById('error-product_id').textContent = 'Pilih produk katalog.'; document.getElementById('error-product_id').classList.remove('hidden'); isValid = false; }
                if (price === '') { document.getElementById('error-product_price').textContent = 'Harga konsumen wajib diisi.'; document.getElementById('error-product_price').classList.remove('hidden'); isValid = false; }
                if (adminFee === '') { document.getElementById('error-product_admin_fee').textContent = 'Biaya admin konsumen wajib diisi.'; document.getElementById('error-product_admin_fee').classList.remove('hidden'); isValid = false; }
                if (merchantFee === '') { document.getElementById('error-product_merchant_fee').textContent = 'Merchant fee wajib diisi.'; document.getElementById('error-product_merchant_fee').classList.remove('hidden'); isValid = false; }
                if (!isValid) return;

                // Sync internal labels payload matching structures (Vue structural conversion replacement)
                const segObj = cachedSegments.find(s => s.id == segmentId) || {};
                const provObj = cachedProviders.find(p => p.id == providerId) || {};
                const typeObj = cachedTypes.find(t => t.id == productTypeId) || {};
                const prodObj = cachedProducts.find(p => p.id == productId) || {};
                const subProvObj = currentLoadedProductProviders.find(sp => sp.id == productProviderId) || {};

                const payload = {
                    id: id ? parseInt(id) : 0,
                    segment_id: parseInt(segmentId),
                    segment_name: segObj.segment_name || '',
                    provider_id: parseInt(providerId),
                    provider_name: provObj.provider_name || '',
                    product_provider_id: parseInt(productProviderId),
                    product_provider_name: subProvObj.product_provider_name || '',
                    product_provider_code: subProvObj.product_provider_code || '',
                    product_provider_price: parseFloat(subProvObj.product_provider_price || 0),
                    product_provider_admin_fee: parseFloat(subProvObj.product_provider_admin_fee || 0),
                    product_provider_merchant_fee: parseFloat(subProvObj.product_provider_merchant_fee || 0),
                    product_type_id: parseInt(productTypeId),
                    product_type_name: typeObj.product_type_name || '',
                    product_id: parseInt(productId),
                    product_name: prodObj.product_name || '',
                    product_code: prodObj.product_code || '',
                    product_reference_id: parseInt(prodObj.product_reference_id || 0),
                    product_reference_name: prodObj.product_reference_name || '',
                    product_reference_code: prodObj.product_reference_code || '',
                    product_category_id: parseInt(prodObj.product_category_id || 0),
                    product_category_name: prodObj.product_category_name || '',
                    product_price: parseFloat(price),
                    product_admin_fee: parseFloat(adminFee),
                    product_merchant_fee: parseFloat(merchantFee),
                    product_availability: isEditMode ? undefined : 'active'
                };

                const endpoint = isEditMode ? '{{ route('product_segments.update') }}' : '{{ route('product_segments.store') }}';
                setLoading('btn-submit-modal', true, '<span class="material-symbols-outlined text-[18px]">save</span> Save Changes');

                fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload)
                })
                .then(r => r.json().catch(() => ({})))
                .then(data => {
                    if (data.success !== false) {
                        toggleModal('modal-product-segment', false);
                        showToast(data.message || 'Alokasi komersial segmen produk berhasil disimpan!', 'success');
                        fetchProductSegments();
                    } else {
                        const alertEl = document.getElementById('product-segment-alert');
                        alertEl.textContent = data.message || 'Terjadi kesalahan sistem penulisan parameter.';
                        alertEl.className = 'mb-5 px-4 py-3 rounded-xl text-body-sm font-body-sm bg-error-container text-on-error-container';
                        alertEl.classList.remove('hidden');
                    }
                })
                .catch(() => {
                    const alertEl = document.getElementById('product-segment-alert');
                    alertEl.textContent = 'Gagal terhubung dengan endpoint cluster API server.';
                    alertEl.classList.remove('hidden');
                })
                .finally(() => setLoading('btn-submit-modal', false, '<span class="material-symbols-outlined text-[18px]">save</span> Save Changes'));
            });

            // ========== Context Deletion Sequence ==========
            window.openDeleteModal = (id, name) => {
                deleteTargetId = id;
                document.getElementById('delete-confirm-text').textContent = `Alokasi segmen produk "${name}" akan dihapus secara permanen dari tabel matrix pemasaran.`;
                toggleModal('modal-delete-product-segment', true);
            };

            document.getElementById('btn-cancel-delete').addEventListener('click', () => {
                deleteTargetId = null;
                toggleModal('modal-delete-product-segment', false);
            });

            document.getElementById('btn-confirm-delete').addEventListener('click', () => {
                if (!deleteTargetId) return;
                setLoading('btn-confirm-delete', true, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');

                fetch('{{ route('product_segments.destroy') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ id: deleteTargetId })
                })
                .then(r => r.json().catch(() => ({})))
                .then(data => {
                    toggleModal('modal-delete-product-segment', false);
                    if (data.success !== false) {
                        showToast(data.message || 'Alokasi segmen produk berhasil dilepas.', 'success');
                        fetchProductSegments();
                    } else {
                        showToast(data.message || 'Gagal mengeksekusi penghapusan segmen produk.', 'error');
                    }
                })
                .catch(() => {
                    toggleModal('modal-delete-product-segment', false);
                    showToast('Gagal memproses akibat kendala transmisi interupsi jaringan.', 'error');
                })
                .finally(() => {
                    deleteTargetId = null;
                    setLoading('btn-confirm-delete', false, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');
                });
            });

            // ========== Search Context Binding Events ==========
            document.getElementById('search-input').addEventListener('input', () => {
                currentPage = 1;
                renderTable();
            });
            document.getElementById('btn-refresh').addEventListener('click', fetchProductSegments);

            // ========== Boot Loader Trigger Initializer ==========
            fetchProductSegments();
        });
    </script>
</x-app-layout>