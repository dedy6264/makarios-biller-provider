@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center mb-card-gap">
    <div>
        <h2 class="font-headline-xl text-headline-xl text-on-surface">Products</h2>
        <p class="mt-1 font-body-md text-body-md text-on-surface-variant">Kelola daftar item produk, kode registrasi,
            konfigurasi referensi, beserta kategori pemetaannya.</p>
    </div>
    <button
        class="bg-primary text-on-primary font-data-tabular text-data-tabular px-6 h-[44px] rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-sm"
        id="btn-add-product">
        <span class="text-sm material-symbols-outlined">add</span>
        Add New Product
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

        #products-table tbody tr td {
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
                <input id="search-input" name="product-table-search" autocomplete="off"
                    class="w-full pl-10 pr-4 h-11 bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg text-body-sm font-body-sm text-on-surface transition-all"
                    placeholder="Cari produk atau kode..." type="text">
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
            <table id="products-table" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-bright/50">
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            No</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Product Name</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Product Code</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Category</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Ref Name</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Ref Code</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Created At</th>
                        <th
                            class="px-6 py-4 tracking-wider text-center uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="products-tbody" class="bg-white">
                    <tr id="loading-row">
                        <td colspan="8"
                            class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span
                                    class="material-symbols-outlined animate-spin text-primary">progress_activity</span>Memuat
                                data produk...
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

    <div class="fixed inset-0 z-50 hidden" id="modal-product">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-product"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="glass-panel w-full max-w-[600px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.10)] border border-white/40 overflow-hidden flex flex-col"
                style="background: rgba(255,255,255,0.92); backdrop-filter: blur(16px);">
                <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/50 bg-white/60">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary"
                            id="modal-icon-container">
                            <span class="material-symbols-outlined text-[20px]" id="modal-icon">inventory_2</span>
                        </div>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface" id="modal-title">Add Product</h3>
                    </div>
                    <button
                        class="flex items-center justify-center w-8 h-8 transition-colors rounded-full text-on-surface-variant hover:text-error hover:bg-error-container/50"
                        id="btn-close-modal">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <div class="p-6 overflow-y-auto max-h-[75vh] space-y-4">
                    <input type="hidden" id="product-id">
                    <div id="product-alert" class="hidden px-4 py-3 rounded-xl text-body-sm font-body-sm"></div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="flex flex-col gap-1.5">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                for="product_reference_id">Product Reference <span class="text-error">*</span></label>
                            <select id="product_reference_id"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all">
                                <option value="" disabled selected>Select Product Reference</option>
                                @foreach($product_references as $ref)
                                <option value="{{ $ref['id'] }}">{{ $ref['product_reference_name'] }}</option>
                                @endforeach
                            </select>
                            <p id="error-product_reference_id" class="hidden ml-1 text-xs text-error"></p>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                for="product_category_id">Product Category <span class="text-error">*</span></label>
                            <select id="product_category_id"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-3 font-body-md text-body-md text-on-surface transition-all">
                                <option value="" disabled selected>Select Product Category</option>
                                @foreach($product_categories as $cat)
                                <option value="{{ $cat['id'] }}">{{ $cat['product_category_name'] }}</option>
                                @endforeach
                            </select>
                            <p id="error-product_category_id" class="hidden ml-1 text-xs text-error"></p>
                        </div>

                        <div class="flex flex-col gap-1.5 sm:col-span-2">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                for="product_name">Product Name <span class="text-error">*</span></label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">package_2</span>
                                <input id="product_name" type="text"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                    placeholder="Masukkan nama produk">
                            </div>
                            <p id="error-product_name" class="hidden ml-1 text-xs text-error"></p>
                        </div>

                        <div class="flex flex-col gap-1.5 sm:col-span-2">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                                for="product_code">Product Code <span class="text-error">*</span></label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">qr_code</span>
                                <input id="product_code" type="text"
                                    class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                    placeholder="Masukkan kode unik produk">
                            </div>
                            <p id="error-product_code" class="hidden ml-1 text-xs text-error"></p>
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

    <div class="fixed inset-0 z-50 hidden" id="modal-delete-product">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-delete"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-[420px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.12)] border border-outline-variant overflow-hidden flex flex-col bg-white">
                <div class="p-6 text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-error-container">
                        <span class="material-symbols-outlined text-[32px] text-error">delete_forever</span>
                    </div>
                    <h3 class="mb-2 font-headline-lg text-headline-lg text-on-surface">Hapus Produk?</h3>
                    <p id="delete-confirm-text" class="font-body-md text-body-md text-on-surface-variant">Data produk
                        ini akan segera dihapus permanen.</p>
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

            // Passing data JSON references safely from blade context
            const baseCategories = @json($product_categories);
            const baseReferences = @json($product_references);

            // ========== State Scope Management ==========
            let allProducts = [];
            let currentPage = 1;
            const perPage = 10;
            let deleteTargetId = null;
            let isEditMode = false;

            // ========== Notification Toast System ==========
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
                btn.innerHTML = isLoading 
                    ? '<span class="material-symbols-outlined text-[18px] animate-spin">progress_activity</span> Memproses...' 
                    : defaultText;
            }

            function formatDate(dateStr) {
                if (!dateStr) return '<span class="italic text-on-surface-variant/50">—</span>';
                try {
                    return new Date(dateStr).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
                } catch(e) { return dateStr; }
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

            function clearFieldErrors() {
                ['product_reference_id', 'product_category_id', 'product_name', 'product_code'].forEach(field => {
                    const el = document.getElementById(`error-${field}`);
                    if (el) el.classList.add('hidden');
                });
                document.getElementById('product-alert').classList.add('hidden');
            }

            // ========== REST Engine Calls & Rendering Table ==========
            function fetchProducts() {
                document.getElementById('products-tbody').innerHTML = `
                    <tr id="loading-row">
                        <td colspan="8" class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>Memuat data produk...
                            </div>
                        </td>
                    </tr>`;

                fetch('{{ route('products.getAll') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                })
                .then(r => {
                    if (!r.ok) throw new Error();
                    return r.json();
                })
                .then(json => {
                    allProducts = json.data || [];
                    currentPage = 1;
                    renderTable();
                })
                .catch((error) => {
                    console.error('Error fetching products:', error);
                    document.getElementById('products-tbody').innerHTML = `
                        <tr><td colspan="8" class="px-6 py-10 text-center text-error font-body-sm">
                            <span class="material-symbols-outlined text-[32px] block mb-2">cloud_off</span>Gagal memuat katalog produk internal.
                        </td></tr>`;
                });
            }

            function renderTable() {
                const searchVal = document.getElementById('search-input').value.toLowerCase();
                const filtered = allProducts.filter(p => 
                    (p.product_name || '').toLowerCase().includes(searchVal) ||
                    (p.product_code || '').toLowerCase().includes(searchVal) ||
                    (p.product_category_name || '').toLowerCase().includes(searchVal)
                );

                const total = filtered.length;
                const totalPages = Math.max(1, Math.ceil(total / perPage));
                if (currentPage > totalPages) currentPage = totalPages;

                const start = (currentPage - 1) * perPage;
                const pageData = filtered.slice(start, start + perPage);
                const tbody = document.getElementById('products-tbody');

                if (pageData.length === 0) {
                    tbody.innerHTML = `
                        <tr><td colspan="8" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                            <span class="material-symbols-outlined text-[40px] block mb-2 opacity-40">search_off</span>Katalog produk kosong.
                        </td></tr>`;
                } else {
                    tbody.innerHTML = pageData.map((p, i) => {
                        const rowIdx = start + i + 1;
                        const bg = rowIdx % 2 === 0 ? 'bg-[#F8FAFC]/50' : '';
                        return `
                            <tr class="table-row-hover border-b border-surface-container group ${bg}">
                                <td class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant">${rowIdx}</td>
                                <td class="px-6 py-4 font-semibold font-data-tabular text-data-tabular text-on-surface">${p.product_name || '-'}</td>
                                <td class="px-6 py-4 font-medium font-data-tabular text-body-sm text-primary">${p.product_code || '-'}</td>
                                <td class="px-6 py-4 text-body-sm text-on-surface-variant"><span class="px-2.5 py-1 rounded-md bg-surface-container font-medium text-[13px]">${p.product_category_name || '-'}</span></td>
                                <td class="px-6 py-4 text-body-sm text-secondary">${p.product_reference_name || '-'}</td>
                                <td class="px-6 py-4 text-body-sm font-data-tabular text-secondary">${p.product_reference_code || '-'}</td>
                                <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">${formatDate(p.created_at)}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-2">
                                        <button onclick="openFormModal(${p.id})" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-primary hover:bg-primary/10 hover:scale-110" title="Edit">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button onclick="openDeleteModal(${p.id}, '${(p.product_name||'').replace(/'/g, "\\'")}')" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container hover:scale-110" title="Hapus">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>`;
                    }).join('');
                }

                document.getElementById('pagination-info').textContent = total === 0 ? 'Tidak ada data' : `Menampilkan ${start+1}–${Math.min(start + perPage, total)} dari ${total} entitas produk`;
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

            window.goPage = (p) => {
                currentPage = p;
                renderTable();
            };

            // ========== Form Management Workflow ==========
            document.getElementById('btn-add-product').addEventListener('click', () => {
                isEditMode = false;
                clearFieldErrors();
                document.getElementById('product-id').value = '';
                document.getElementById('product_reference_id').value = '';
                document.getElementById('product_category_id').value = '';
                document.getElementById('product_name').value = '';
                document.getElementById('product_code').value = '';
                
                document.getElementById('modal-title').textContent = 'Add Product';
                document.getElementById('modal-icon').textContent = 'inventory_2';
                document.getElementById('modal-icon-container').className = 'flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary';
                toggleModal('modal-product', true);
            });

            window.openFormModal = (id) => {
                const item = allProducts.find(p => p.id == id);
                if (!item) return;
                isEditMode = true;
                clearFieldErrors();

                document.getElementById('product-id').value = item.id;
                document.getElementById('product_reference_id').value = item.product_reference_id || '';
                document.getElementById('product_category_id').value = item.product_category_id || '';
                document.getElementById('product_name').value = item.product_name || '';
                document.getElementById('product_code').value = item.product_code || '';

                document.getElementById('modal-title').textContent = 'Edit Product';
                document.getElementById('modal-icon').textContent = 'edit';
                document.getElementById('modal-icon-container').className = 'flex items-center justify-center w-9 h-9 rounded-xl bg-amber-50 text-amber-700';
                toggleModal('modal-product', true);
            };

            ['btn-close-modal', 'btn-cancel-modal', 'backdrop-product'].forEach(id => {
                document.getElementById(id).addEventListener('click', () => toggleModal('modal-product', false));
            });

            document.getElementById('btn-submit-modal').addEventListener('click', () => {
                clearFieldErrors();

                const id = document.getElementById('product-id').value;
                const refId = document.getElementById('product_reference_id').value;
                const catId = document.getElementById('product_category_id').value;
                const name = document.getElementById('product_name').value.trim();
                const code = document.getElementById('product_code').value.trim();

                let isValid = true;
                if (!refId) { document.getElementById('error-product_reference_id').textContent = 'Pilih referensi produk.'; document.getElementById('error-product_reference_id').classList.remove('hidden'); isValid = false; }
                if (!catId) { document.getElementById('error-product_category_id').textContent = 'Pilih kategori produk.'; document.getElementById('error-product_category_id').classList.remove('hidden'); isValid = false; }
                if (!name) { document.getElementById('error-product_name').textContent = 'Nama produk wajib diisi.'; document.getElementById('error-product_name').classList.remove('hidden'); isValid = false; }
                if (!code) { document.getElementById('error-product_code').textContent = 'Kode produk wajib diisi.'; document.getElementById('error-product_code').classList.remove('hidden'); isValid = false; }
                if (!isValid) return;

                // Mapping relational properties from internal local JSON cache mapping structure (Vue replacement logic)
                const targetCat = baseCategories.find(c => c.id == catId) || {};
                const targetRef = baseReferences.find(r => r.id == refId) || {};

                const payload = {
                    id: id ? parseInt(id) : 0,
                    product_name: name,
                    product_code: code,
                    product_reference_id: parseInt(refId),
                    product_reference_name: targetRef.product_reference_name || '',
                    product_reference_code: targetRef.product_reference_code || '',
                    product_category_id: parseInt(catId),
                    product_category_name: targetCat.product_category_name || ''
                };

                const endpoint = isEditMode ? '{{ route('products.update') }}' : '{{ route('products.store') }}';
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
                        toggleModal('modal-product', false);
                        showToast(data.message || 'Katalog entitas produk berhasil disimpan!', 'success');
                        fetchProducts();
                    } else {
                        const alertEl = document.getElementById('product-alert');
                        alertEl.textContent = data.message || 'Gagal menyimpan data produk.';
                        alertEl.className = 'mb-5 px-4 py-3 rounded-xl text-body-sm font-body-sm bg-error-container text-on-error-container';
                        alertEl.classList.remove('hidden');
                    }
                })
                .catch(() => {
                    const alertEl = document.getElementById('product-alert');
                    alertEl.textContent = 'Terjadi kesalahan jaringan sistem.';
                    alertEl.classList.remove('hidden');
                })
                .finally(() => setLoading('btn-submit-modal', false, '<span class="material-symbols-outlined text-[18px]">save</span> Save Changes'));
            });

            // ========== Component Delete Sequence ==========
            window.openDeleteModal = (id, name) => {
                deleteTargetId = id;
                document.getElementById('delete-confirm-text').textContent = `Produk "${name}" beserta seluruh data kodenya akan dihapus secara permanen.`;
                toggleModal('modal-delete-product', true);
            };

            document.getElementById('btn-cancel-delete').addEventListener('click', () => {
                deleteTargetId = null;
                toggleModal('modal-delete-product', false);
            });

            document.getElementById('btn-confirm-delete').addEventListener('click', () => {
                if (!deleteTargetId) return;
                setLoading('btn-confirm-delete', true, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');

                fetch('{{ route('products.destroy') }}', {
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
                    toggleModal('modal-delete-product', false);
                    if (data.success !== false) {
                        showToast(data.message || 'Produk berhasil dihapus.', 'success');
                        fetchProducts();
                    } else {
                        showToast(data.message || 'Gagal mengeksekusi penghapusan item.', 'error');
                    }
                })
                .catch(() => {
                    toggleModal('modal-delete-product', false);
                    showToast('Gagal memproses transmisi interupsi jaringan.', 'error');
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
            document.getElementById('btn-refresh').addEventListener('click', fetchProducts);

            // ========== Initialization Trigger Entry Point ==========
            fetchProducts();
        });
    </script>
</x-app-layout>