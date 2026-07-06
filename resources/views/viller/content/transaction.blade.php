@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center mb-card-gap">
    <div>
        <h2 class="font-headline-xl text-headline-xl text-on-surface">Transactions Log</h2>
        <p class="mt-1 font-body-md text-body-md text-on-surface-variant">Pantau seluruh mutasi log transaksi, status
            rekonsiliasi, referensi nomor core gateway, dan detail margin pembukuan.</p>
    </div>
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

        #transactions-table tbody tr td {
            vertical-align: middle;
            white-space: nowrap;
        }

        #transactions-table th {
            white-space: nowrap;
        }
    </style>

    <div
        class="bg-surface-container-lowest rounded-[24px] shadow-[0px_4px_20px_rgba(0,0,0,0.03)] border border-outline-variant overflow-hidden flex flex-col">
        <div
            class="flex flex-col items-center justify-between gap-4 p-6 border-b border-outline-variant md:flex-row bg-white/50">
            <div class="relative w-full md:w-96">
                <span
                    class="absolute text-sm -translate-y-1/2 material-symbols-outlined left-3 top-1/2 text-on-surface-variant">search</span>
                <input id="search-input" name="transaction-search" autocomplete="off"
                    class="w-full pl-10 pr-4 h-11 bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg text-body-sm font-body-sm text-on-surface transition-all"
                    placeholder="Cari No. Referensi, ID Pelanggan, atau Produk..." type="text">
            </div>
            <div class="flex items-center w-full gap-3 md:w-auto">
                <button id="btn-refresh"
                    class="flex items-center justify-center gap-2 px-4 transition-colors border rounded-lg h-11 border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-sm text-body-sm">
                    <span class="material-symbols-outlined text-[20px]">refresh</span>
                    <span>Refresh Log</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="transactions-table" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-bright/50">
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            No</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Status</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Ref Number</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Customer ID</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Total Amount</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Product Name</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Product Code</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Provider</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Ref Provider</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Ref Merchant</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Status Msg</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Cust Price</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Cust Admin</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Cust Merchant Fee</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Prov Price</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Prov Admin</th>
                        <th
                            class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Prov Merchant Fee</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Segment</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Category</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Type</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Client</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Merchant</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Username</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Created At</th>
                        <th
                            class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant">
                            Updated At</th>
                    </tr>
                </thead>
                <tbody id="transactions-tbody" class="bg-white">
                    <tr id="loading-row">
                        <td colspan="25"
                            class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span
                                    class="material-symbols-outlined animate-spin text-primary">progress_activity</span>Memuat
                                seluruh log audit transaksi...
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // ========== Component Scope States ==========
            let allTransactions = [];
            let currentPage = 1;
            const perPage = 10;

            // ========== Currency & Utility Helpers ==========
            function formatIDR(amount) {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount || 0);
            }

            function formatDate(dateStr) {
                if (!dateStr) return '<span class="italic text-on-surface-variant/50">—</span>';
                try {
                    return new Date(dateStr).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
                } catch(e) { return dateStr; }
            }

            // ========== Status Badge Render Framework ==
            function renderStatusBadge(statusCode, statusMessage) {
                let badgeClass = "";
                switch (statusCode) {
                    case '00':
                    case '200':
                        badgeClass = "bg-emerald-50 text-emerald-700 border-emerald-200/50";
                        break;
                    case '04':
                        badgeClass = "bg-error-container text-on-error-container border-error/20";
                        break;
                    case '36':
                        badgeClass = "bg-blue-50 text-blue-700 border-blue-200/50";
                        break;
                    case '11':
                        badgeClass = "bg-amber-50 text-amber-700 border-amber-200/50";
                        break;
                    default:
                        badgeClass = "bg-surface-container text-on-surface-variant border-outline-variant/50";
                        break;
                }
                return `<span class="inline-flex items-center px-2.5 py-0.5 rounded-full border text-[12px] font-semibold font-data-tabular ${badgeClass}" title="${statusMessage || ''}">${statusCode}</span>`;
            }

            // ========== API Async Integration Channel ==========
            function fetchTransactions() {
                document.getElementById('transactions-tbody').innerHTML = `
                    <tr id="loading-row">
                        <td colspan="25" class="px-6 py-12 text-center text-on-surface-variant font-body-sm text-body-sm">
                            <div class="flex items-center justify-center gap-3">
                                <span class="material-symbols-outlined animate-spin text-primary">progress_activity</span>Memuat seluruh log audit transaksi...
                            </div>
                        </td>
                    </tr>`;

                fetch('{{ route('transactions.getAll') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                })
                .then(r => { if (!r.ok) throw new Error(); return r.json(); })
                .then(json => {
                    allTransactions = json.data || [];
                    currentPage = 1;
                    renderTable();
                })
                .catch(() => {
                    document.getElementById('transactions-tbody').innerHTML = `
                        <tr><td colspan="25" class="px-6 py-10 text-center text-error font-body-sm">
                            <span class="material-symbols-outlined text-[32px] block mb-2">cloud_off</span>Gagal sinkronisasi data ledger transaksi.
                        </td></tr>`;
                });
            }

            function renderTable() {
                const searchVal = document.getElementById('search-input').value.toLowerCase();
                const filtered = allTransactions.filter(t => 
                    (t.reference_number || '').toLowerCase().includes(searchVal) ||
                    (t.customer_id || '').toLowerCase().includes(searchVal) ||
                    (t.product_name || '').toLowerCase().includes(searchVal) ||
                    (t.product_code || '').toLowerCase().includes(searchVal)
                );

                const total = filtered.length;
                const totalPages = Math.max(1, Math.ceil(total / perPage));
                if (currentPage > totalPages) currentPage = totalPages;

                const start = (currentPage - 1) * perPage;
                const pageData = filtered.slice(start, start + perPage);
                const tbody = document.getElementById('transactions-tbody');

                if (pageData.length === 0) {
                    tbody.innerHTML = `
                        <tr><td colspan="25" class="px-6 py-12 text-center text-on-surface-variant font-body-sm">
                            <span class="material-symbols-outlined text-[40px] block mb-2 opacity-40">inventory</span>Log audit transaksi tidak ditemukan.
                        </td></tr>`;
                } else {
                    tbody.innerHTML = pageData.map((t, i) => {
                        const rowIdx = start + i + 1;
                        const bg = rowIdx % 2 === 0 ? 'bg-[#F8FAFC]/50' : '';
                        
                        return `
                            <tr class="table-row-hover border-b border-surface-container group ${bg}">
                                <td class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant">${rowIdx}</td>
                                <td class="px-6 py-4">${renderStatusBadge(t.status_code, t.status_message)}</td>
                                <td class="px-6 py-4 font-semibold font-data-tabular text-primary text-[13px]">${t.reference_number || '-'}</td>
                                <td class="px-6 py-4 font-semibold font-data-tabular text-body-sm text-on-surface">${t.customer_id || '-'}</td>
                                <td class="px-6 py-4 font-bold text-right font-data-tabular text-body-sm text-on-surface">${formatIDR(t.transaction_total_amount)}</td>
                                <td class="px-6 py-4 font-semibold text-on-surface-variant">${t.product_name || '-'}</td>
                                <td class="px-6 py-4 font-medium font-data-tabular text-body-sm text-secondary">${t.product_code || '-'}</td>
                                <td class="px-6 py-4 text-body-sm text-on-surface-variant"><span class="px-2.5 py-1 rounded-md bg-surface-container text-[12px] font-medium">${t.provider_name || '-'}</span></td>
                                <td class="px-6 py-4 font-data-tabular text-body-sm text-secondary">${t.reference_number_provider || '-'}</td>
                                <td class="px-6 py-4 font-data-tabular text-body-sm text-secondary">${t.reference_number_merchant || '-'}</td>
                                <td class="max-w-xs px-6 py-4 truncate text-body-sm text-secondary" title="${t.status_message || ''}">${t.status_message || '-'}</td>
                                <td class="px-6 py-4 text-right font-data-tabular text-body-sm text-on-surface-variant">${formatIDR(t.product_price)}</td>
                                <td class="px-6 py-4 text-right font-data-tabular text-body-sm text-secondary">${formatIDR(t.product_admin_fee)}</td>
                                <td class="px-6 py-4 text-right font-data-tabular text-body-sm text-secondary">${formatIDR(t.product_merchant_fee)}</td>
                                <td class="px-6 py-4 text-right font-data-tabular text-body-sm text-on-surface-variant">${formatIDR(t.product_provider_price)}</td>
                                <td class="px-6 py-4 text-right font-data-tabular text-body-sm text-secondary">${formatIDR(t.product_provider_admin_fee)}</td>
                                <td class="px-6 py-4 text-right font-data-tabular text-body-sm text-secondary">${formatIDR(t.product_provider_merchant_fee)}</td>
                                <td class="px-6 py-4 text-body-sm text-secondary">${t.segment_name || '-'}</td>
                                <td class="px-6 py-4 text-body-sm text-secondary">${t.product_category_name || '-'}</td>
                                <td class="px-6 py-4 text-body-sm text-secondary">${t.product_type_name || '-'}</td>
                                <td class="px-6 py-4 text-body-sm text-secondary">${t.client_name || '-'}</td>
                                <td class="px-6 py-4 text-body-sm text-secondary">${t.merchant_name || '-'}</td>
                                <td class="px-6 py-4 font-medium text-body-sm text-on-surface-variant">${t.username || '-'}</td>
                                <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">${formatDate(t.created_at)}</td>
                                <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">${formatDate(t.updated_at)}</td>
                            </tr>`;
                    }).join('');
                }

                document.getElementById('pagination-info').textContent = total === 0 ? 'Tidak ada data' : `Menampilkan ${start+1}–${Math.min(start + perPage, total)} dari ${total} entitas transaksi`;
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

            // ========== Search and Live Interactivity Bindings ==========
            document.getElementById('search-input').addEventListener('input', () => {
                currentPage = 1;
                renderTable();
            });
            document.getElementById('btn-refresh').addEventListener('click', fetchTransactions);

            // ========== Core Component Initialization Trigger ==========
            fetchTransactions();
        });
    </script>
</x-app-layout>