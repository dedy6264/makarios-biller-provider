@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center mb-card-gap">
    <div>
        <h2 class="font-headline-xl text-headline-xl text-on-surface">Product References</h2>
        <p class="mt-1 font-body-md text-body-md text-on-surface-variant">Kelola master data referensi produk, pemetaan
            kode eksternal, dan sinkronisasi sistem.</p>
    </div>
    <button
        class="bg-primary text-on-primary font-data-tabular text-data-tabular px-6 h-[44px] rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-sm"
        id="btn-add-reference">
        <span class="text-sm material-symbols-outlined">add</span>
        Add New Reference
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

        #references-table tbody tr td {
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
                <input id="search-input" name="reference-table-search" autocomplete="off"
                    class="w-full pl-10 pr-4 h-11 bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg text-body-sm font-body-sm text-on-surface transition-all"
                    placeholder="Cari referensi atau kode..." type="text">
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
            <table id="references-table" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-bright/50">
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            No</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Reference Name</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Reference Code</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Created At</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Updated At</th>
                        <th
                            class="px-6 py-4 tracking-wider text-center uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="references-tbody" class="bg-white">
                    <tr id="loading-row">
                        <td colspan="6"
                            class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span
                                    class="material-symbols-outlined animate-spin text-primary">progress_activity</span>Memuat
                                data reference...
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

    <div class="fixed inset-0 z-50 hidden" id="modal-reference">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-reference"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="glass-panel w-full max-w-[520px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.10)] border border-white/40 overflow-hidden flex flex-col"
                style="background: rgba(255,255,255,0.92); backdrop-filter: blur(16px);">
                <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/50 bg-white/60">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary"
                            id="modal-icon-container">
                            <span class="material-symbols-outlined text-[20px]" id="modal-icon">bookmarks</span>
                        </div>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface" id="modal-title">Add Product
                            Reference</h3>
                    </div>
                    <button
                        class="flex items-center justify-center w-8 h-8 transition-colors rounded-full text-on-surface-variant hover:text-error hover:bg-error-container/50"
                        id="btn-close-modal">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <div class="p-6 space-y-4">
                    <input type="hidden" id="reference-id">
                    <div id="reference-alert" class="hidden px-4 py-3 rounded-xl text-body-sm font-body-sm"></div>

                    <div class="flex flex-col gap-1.5">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                            for="product_reference_name">
                            Product Reference Name <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">assignment</span>
                            <input id="product_reference_name" type="text"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Masukkan nama referensi produk" autofocus>
                        </div>
                        <p id="error-product_reference_name" class="hidden ml-1 text-xs text-error"></p>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant"
                            for="product_reference_code">
                            Product Reference Code <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-on-surface-variant">code</span>
                            <input id="product_reference_code" type="text"
                                class="w-full h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Masukkan kode referensi unik">
                        </div>
                        <p id="error-product_reference_code" class="hidden ml-1 text-xs text-error"></p>
                    </div>
                </div>
                <div class="flex justify-end gap-3 px-6 py-4 border-t bg-surface-bright/80 border-outline-variant/50">
                    <button id="btn-cancel-modal"
                        class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors">
                        Batal
                    </button>
                    <button id="btn-submit-modal"
                        class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular bg-primary text-white shadow-sm hover:opacity-90 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden" id="modal-delete-reference">
        <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-sm" id="backdrop-delete"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-[420px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.12)] border border-outline-variant overflow-hidden flex flex-col bg-white">
                <div class="p-6 text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-error-container">
                        <span class="material-symbols-outlined text-[32px] text-error">delete_forever</span>
                    </div>
                    <h3 class="mb-2 font-headline-lg text-headline-lg text-on-surface">Hapus Referensi?</h3>
                    <p id="delete-confirm-text" class="font-body-md text-body-md text-on-surface-variant">Tindakan ini
                        tidak dapat dibatalkan.</p>
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

            // ========== State Scope Components ==========
            let allReferences = [];
            let currentPage = 1;
            const perPage = 10;
            let deleteTargetId = null;
            let isEditMode = false;

            // ========== Notification Toast Logic ==========
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

            function clearFormErrors() {
                document.getElementById('error-product_reference_name').classList.add('hidden');
                document.getElementById('error-product_reference_code').classList.add('hidden');
                document.getElementById('reference-alert').classList.add('hidden');
            }

            // ========== Async API Operations & Render Components ==========
            function fetchProductReferences() {
                document.getElementById('references-tbody').innerHTML = `
                    <tr id="loading-row">
                        <td colspan="6" class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>Memuat data reference...
                            </div>
                        </td>
                    </tr>`;

                fetch('{{ route('product_references.getAll') }}', {
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
                    allReferences = json.data || [];
                    currentPage = 1;
                    renderTable();
                })
                .catch(() => {
                    document.getElementById('references-tbody').innerHTML = `
                        <tr><td colspan="6" class="px-6 py-10 text-center text-error font-body-sm">
                            <span class="material-symbols-outlined text-[32px] block mb-2">cloud_off</span>Gagal memuat repositori data referensi produk.
                        </td></tr>`;
                });
            }

            function renderTable() {
                const searchVal = document.getElementById('search-input').value.toLowerCase();
                const filtered = allReferences.filter(r => 
                    (r.product_reference_name || '').toLowerCase().includes(searchVal) ||
                    (r.product_reference_code || '').toLowerCase().includes(searchVal)
                );

                const total = filtered.length;
                const totalPages = Math.max(1, Math.ceil(total / perPage));
                if (currentPage > totalPages) currentPage = totalPages;

                const start = (currentPage - 1) * perPage;
                const pageData = filtered.slice(start, start + perPage);
                const tbody = document.getElementById('references-tbody');

                if (pageData.length === 0) {
                    tbody.innerHTML = `
                        <tr><td colspan="6" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                            <span class="material-symbols-outlined text-[40px] block mb-2 opacity-40">search_off</span>Tidak ada data ditemukan.
                        </td></tr>`;
                } else {
                    tbody.innerHTML = pageData.map((r, i) => {
                        const rowIdx = start + i + 1;
                        const bg = rowIdx % 2 === 0 ? 'bg-[#F8FAFC]/50' : '';
                        return `
                            <tr class="table-row-hover border-b border-surface-container group ${bg}">
                                <td class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant">${rowIdx}</td>
                                <td class="px-6 py-4 font-semibold font-data-tabular text-data-tabular text-on-surface">${r.product_reference_name || '-'}</td>
                                <td class="px-6 py-4 font-medium font-data-tabular text-body-sm text-primary">${r.product_reference_code || '-'}</td>
                                <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">${formatDate(r.created_at)}</td>
                                <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">${formatDate(r.updated_at)}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-2">
                                        <button onclick="openFormModal(${r.id})" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-primary hover:bg-primary/10 hover:scale-110" title="Edit">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button onclick="openDeleteModal(${r.id}, '${(r.product_reference_name||'').replace(/'/g, "\\'")}')" class="p-2 transition-all rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container hover:scale-110" title="Hapus">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>`;
                    }).join('');
                }

                document.getElementById('pagination-info').textContent = total === 0 ? 'Tidak ada data' : `Menampilkan ${start+1}–${Math.min(start + perPage, total)} dari ${total} referensi`;
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

            // ========== Form Context Workflow (Store / Update) ==========
            document.getElementById('btn-add-reference').addEventListener('click', () => {
                isEditMode = false;
                clearFormErrors();
                document.getElementById('reference-id').value = '';
                document.getElementById('product_reference_name').value = '';
                document.getElementById('product_reference_code').value = '';
                
                document.getElementById('modal-title').textContent = 'Add Product Reference';
                document.getElementById('modal-icon').textContent = 'bookmarks';
                document.getElementById('modal-icon-container').className = 'flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary';
                toggleModal('modal-reference', true);
            });

            window.openFormModal = (id) => {
                const target = allReferences.find(r => r.id == id);
                if (!target) return;
                isEditMode = true;
                clearFormErrors();
                
                document.getElementById('reference-id').value = target.id;
                document.getElementById('product_reference_name').value = target.product_reference_name || '';
                document.getElementById('product_reference_code').value = target.product_reference_code || '';

                document.getElementById('modal-title').textContent = 'Edit Product Reference';
                document.getElementById('modal-icon').textContent = 'edit';
                document.getElementById('modal-icon-container').className = 'flex items-center justify-center w-9 h-9 rounded-xl bg-amber-50 text-amber-700';
                toggleModal('modal-reference', true);
            };

            ['btn-close-modal', 'btn-cancel-modal', 'backdrop-reference'].forEach(id => {
                document.getElementById(id).addEventListener('click', () => toggleModal('modal-reference', false));
            });

            document.getElementById('btn-submit-modal').addEventListener('click', () => {
                clearFormErrors();

                const id = document.getElementById('reference-id').value;
                const nameInput = document.getElementById('product_reference_name').value.trim();
                const codeInput = document.getElementById('product_reference_code').value.trim();
                
                let isValid = true;
                if (!nameInput) {
                    const errName = document.getElementById('error-product_reference_name');
                    errName.textContent = 'Nama referensi produk wajib diisi.';
                    errName.classList.remove('hidden');
                    isValid = false;
                }
                if (!codeInput) {
                    const errCode = document.getElementById('error-product_reference_code');
                    errCode.textContent = 'Kode referensi produk wajib diisi.';
                    errCode.classList.remove('hidden');
                    isValid = false;
                }
                if (!isValid) return;

                const endpoint = isEditMode ? '{{ route('product_references.update') }}' : '{{ route('product_references.store') }}';
                const payload = { 
                    id: id ? parseInt(id) : null, 
                    product_reference_name: nameInput,
                    product_reference_code: codeInput 
                };

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
                        toggleModal('modal-reference', false);
                        showToast(data.message || 'Data referensi produk berhasil disimpan!', 'success');
                        fetchProductReferences();
                    } else {
                        const alertEl = document.getElementById('reference-alert');
                        alertEl.textContent = data.message || 'Gagal menyimpan entitas referensi data.';
                        alertEl.className = 'mb-5 px-4 py-3 rounded-xl text-body-sm font-body-sm bg-error-container text-on-error-container';
                        alertEl.classList.remove('hidden');
                    }
                })
                .catch(() => {
                    const alertEl = document.getElementById('reference-alert');
                    alertEl.textContent = 'Gagal terhubung dengan endpoint cluster API server.';
                    alertEl.classList.remove('hidden');
                })
                .finally(() => setLoading('btn-submit-modal', false, '<span class="material-symbols-outlined text-[18px]">save</span> Save Changes'));
            });

            // ========== Delete System Handling Sequence ==========
            window.openDeleteModal = (id, name) => {
                deleteTargetId = id;
                document.getElementById('delete-confirm-text').textContent = `Referensi "${name}" akan dihapus secara permanen dari basis data induk.`;
                toggleModal('modal-delete-reference', true);
            };

            document.getElementById('btn-cancel-delete').addEventListener('click', () => {
                deleteTargetId = null;
                toggleModal('modal-delete-reference', false);
            });

            document.getElementById('btn-confirm-delete').addEventListener('click', () => {
                if (!deleteTargetId) return;
                setLoading('btn-confirm-delete', true, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');

                fetch('{{ route('product_references.destroy') }}', {
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
                    toggleModal('modal-delete-reference', false);
                    if (data.success !== false) {
                        showToast(data.message || 'Referensi produk berhasil dihapus.', 'success');
                        fetchProductReferences();
                    } else {
                        showToast(data.message || 'Gagal menghapus kluster data referensi.', 'error');
                    }
                })
                .catch(() => {
                    toggleModal('modal-delete-reference', false);
                    showToast('Terjadi kegagalan interupsi jaringan internal.', 'error');
                })
                .finally(() => {
                    deleteTargetId = null;
                    setLoading('btn-confirm-delete', false, '<span class="material-symbols-outlined text-[18px]">delete</span> Ya, Hapus');
                });
            });

            // ========== Bind Layout Context View Events ==========
            document.getElementById('search-input').addEventListener('input', () => {
                currentPage = 1;
                renderTable();
            });
            document.getElementById('btn-refresh').addEventListener('click', fetchProductReferences);

            // ========== Main Boot Trigger ==========
            fetchProductReferences();
        });
    </script>
</x-app-layout>