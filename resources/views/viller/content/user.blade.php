@extends('viller.app')

@section('header')
<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center mb-card-gap">
    <div>
        <h2 class="font-headline-xl text-headline-xl text-on-surface">Manajemen Pengguna</h2>
        <p class="mt-1 font-body-md text-body-md text-on-surface-variant">Kelola akses, peran, dan detail
            profil untuk seluruh pengguna sistem.</p>
    </div>
    <button
        class="bg-primary text-on-primary font-data-tabular text-data-tabular px-6 h-[44px] rounded-lg flex items-center gap-2 hover:bg-primary-fixed-variant transition-colors shadow-sm"
        id="btn-add-user">
        <span class="text-sm material-symbols-outlined">add</span>
        Tambah Pengguna
    </button>
</div>
@endsection

@section('content')
<!-- Main Content Card -->
<div
    class="bg-surface-container-lowest rounded-[24px] shadow-[0px_4px_20px_rgba(0,0,0,0.03)] border border-outline-variant overflow-hidden flex flex-col">
    <!-- Toolbar/Filters -->
    <div
        class="flex flex-col items-center justify-between gap-4 p-6 border-b border-outline-variant md:flex-row bg-white/50">
        <div class="relative w-full md:w-80">
            <span
                class="absolute text-sm -translate-y-1/2 material-symbols-outlined left-3 top-1/2 text-on-surface-variant">search</span>
            <input
                class="w-full pl-10 pr-4 h-11 bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg text-body-sm font-body-sm text-on-surface transition-all"
                placeholder="Cari nama, email, atau username..." type="text">
        </div>
        <div class="flex items-center w-full gap-3 md:w-auto">
            <span class="font-label-caps text-label-caps text-on-surface-variant whitespace-nowrap">Filter
                Peran:</span>
            <select
                class="h-11 bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary rounded-lg text-body-sm font-body-sm text-on-surface min-w-[160px] cursor-pointer">
                <option value="all">Semua Peran</option>
                <option value="admin">Administrator</option>
                <option value="manager">Manajer</option>
                <option value="user">Pengguna Standar</option>
            </select>
            <button
                class="flex items-center justify-center px-4 ml-2 transition-colors border rounded-lg h-11 border-outline-variant text-on-surface-variant hover:bg-surface-container">
                <span class="material-symbols-outlined">filter_list</span>
            </button>
        </div>
    </div>
    <!-- Data Table Container -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-bright/50">
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Pengguna</th>
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Username</th>
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Kontak</th>
                    <th
                        class="px-6 py-4 tracking-wider uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Peran</th>
                    <th
                        class="px-6 py-4 tracking-wider text-right uppercase border-b font-label-caps text-label-caps text-on-surface-variant border-outline-variant whitespace-nowrap">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <!-- Row 1 -->
                <tr class="border-b table-row-hover border-surface-container group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img class="object-cover w-10 h-10 rounded-full"
                                data-alt="A highly detailed, professional headshot of a female executive in a modern light-mode office setting. Bright, diffuse lighting, calming atmosphere."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5ZGAZUsKwRnhnUe6v0iJPk2KzEBgI_-xTnBjW-UEkcyMvGbPgAYqS_n-XKVfg4eDkCvt0fIOwFoRxdUV7IbnZOBdKWKoP1K2-GNvfecUbeVX_yL8qKjzBfSMtwvxkbHvQZ43LFV8PPMe7yQfem2IvjcHwnmRbzQ12SN5g02uKH-b6Wp6wj_0kL2VPTZ1-Y5b8MuF7QSL_XQ-tTd3hCMx6g6fZLhVWGqtqnda0vT3rVF8RkCbwB-16LAu0Xa6YeiVdbHNgkDq09Lo">
                            <div>
                                <p
                                    class="font-semibold font-data-tabular text-data-tabular text-on-surface">
                                    Sarah Jenkins</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">@sjenkins</td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span
                                class="font-body-sm text-body-sm text-on-surface">sarah.j@config.center</span>
                            <span class="mt-1 font-label-caps text-label-caps text-on-surface-variant">+62
                                812-3456-7890</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-primary-container text-on-primary-container font-label-caps text-label-caps">
                            Administrator
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex justify-end gap-2 transition-opacity opacity-0 group-hover:opacity-100">
                            <button
                                class="p-2 transition-colors rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container"
                                title="Edit">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </button>
                            <button
                                class="p-2 transition-colors rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container"
                                title="Hapus">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr class="table-row-hover border-b border-surface-container bg-[#F8FAFC]/50 group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 font-bold rounded-full bg-surface-container-highest text-primary font-data-tabular">
                                MK
                            </div>
                            <div>
                                <p
                                    class="font-semibold font-data-tabular text-data-tabular text-on-surface">
                                    Michael Kusuma</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">@mkusuma</td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span
                                class="font-body-sm text-body-sm text-on-surface">michael@config.center</span>
                            <span class="mt-1 font-label-caps text-label-caps text-on-surface-variant">+62
                                811-9876-5432</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-caps text-label-caps">
                            Manajer
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex justify-end gap-2 transition-opacity opacity-0 group-hover:opacity-100">
                            <button
                                class="p-2 transition-colors rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </button>
                            <button
                                class="p-2 transition-colors rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Row 3 -->
                <tr class="border-b table-row-hover border-surface-container group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img class="object-cover w-10 h-10 rounded-full"
                                data-alt="A highly detailed, professional headshot of a young male developer in a modern light-mode office setting. Bright, diffuse lighting, calming atmosphere."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBe8Nj2r1f2qic3ypoXnHYTYMhM1ph0zJEXnoCd8d5QZF6CIavwW154CwO82BvhqmC5VfCE2-mbanyN2SFAK0kNReIW3D74fjLotoM42Nf8rLQabvx2iq05H8BBlTDajoVtxdYq7a_c2UP9BUsuF1K2eYUdMJ6Y3Hp7tsSjuRmuvvym13ROaQHzohs63TRzQrJJVOwuUaoGvRvpazce0Y4qjmloevaFlt6ec0gT39mUrI3MHNj3tzjkE95cIcw6R4HWtrztLJIK2X0">
                            <div>
                                <p
                                    class="font-semibold font-data-tabular text-data-tabular text-on-surface">
                                    Budi Santoso</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">@budis</td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span
                                class="font-body-sm text-body-sm text-on-surface">budi.s@config.center</span>
                            <span class="mt-1 font-label-caps text-label-caps text-on-surface-variant">+62
                                856-1122-3344</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-3 py-1 border rounded-full bg-surface-variant text-on-surface-variant font-label-caps text-label-caps border-outline-variant/30">
                            Pengguna Standar
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex justify-end gap-2 transition-opacity opacity-0 group-hover:opacity-100">
                            <button
                                class="p-2 transition-colors rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </button>
                            <button
                                class="p-2 transition-colors rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Row 4 -->
                <tr class="table-row-hover bg-[#F8FAFC]/50 group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 font-bold rounded-full bg-surface-container-highest text-primary font-data-tabular">
                                AL
                            </div>
                            <div>
                                <p
                                    class="font-semibold font-data-tabular text-data-tabular text-on-surface">
                                    Anita Larasati</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">@anital</td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span
                                class="font-body-sm text-body-sm text-on-surface">anita.l@config.center</span>
                            <span class="mt-1 font-label-caps text-label-caps text-on-surface-variant">+62
                                821-5566-7788</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-3 py-1 border rounded-full bg-surface-variant text-on-surface-variant font-label-caps text-label-caps border-outline-variant/30">
                            Pengguna Standar
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex justify-end gap-2 transition-opacity opacity-0 group-hover:opacity-100">
                            <button
                                class="p-2 transition-colors rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </button>
                            <button
                                class="p-2 transition-colors rounded-lg text-on-surface-variant hover:text-error hover:bg-error-container">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Pagination Footer -->
    <div class="flex items-center justify-between p-4 bg-white border-t border-outline-variant">
        <span class="font-body-sm text-body-sm text-on-surface-variant">Menampilkan 1-4 dari 42
            pengguna</span>
        <div class="flex gap-1">
            <button
                class="flex items-center justify-center w-8 h-8 border rounded-md opacity-50 cursor-not-allowed border-outline-variant text-on-surface-variant">
                <span class="text-sm material-symbols-outlined">chevron_left</span>
            </button>
            <button
                class="flex items-center justify-center w-8 h-8 text-white rounded-md bg-primary font-data-tabular">1</button>
            <button
                class="flex items-center justify-center w-8 h-8 transition-colors rounded-md hover:bg-surface-container text-on-surface font-data-tabular">2</button>
            <button
                class="flex items-center justify-center w-8 h-8 transition-colors rounded-md hover:bg-surface-container text-on-surface font-data-tabular">3</button>
            <span class="flex items-center justify-center w-8 h-8 text-on-surface-variant">...</span>
            <button
                class="flex items-center justify-center w-8 h-8 transition-colors border rounded-md border-outline-variant text-on-surface-variant hover:bg-surface-container">
                <span class="text-sm material-symbols-outlined">chevron_right</span>
            </button>
        </div>
    </div>
</div>

<!-- Modal overlay (Hidden by default) -->
<div class="fixed inset-0 z-50 hidden" id="modal-add-user">
    <!-- Backdrop -->
    <div class="absolute inset-0 transition-opacity bg-inverse-surface/40 backdrop-blur-sm"></div>
    <!-- Modal Container -->
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <!-- Modal Box -->
        <div
            class="glass-panel w-full max-w-[560px] rounded-[24px] shadow-[0px_10px_40px_rgba(0,0,0,0.08)] border border-white/40 overflow-hidden flex flex-col transform transition-transform scale-100">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/50 bg-white/50">
                <h3 class="font-headline-lg text-headline-lg text-on-surface">Tambah Pengguna Baru</h3>
                <button
                    class="flex items-center justify-center w-8 h-8 transition-colors rounded-full text-on-surface-variant hover:text-error hover:bg-error-container/50"
                    id="btn-close-modal">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto max-h-[614px]">
                <form class="space-y-5">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- Input Field structure -->
                        <div class="flex flex-col gap-1">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant">Nama
                                Lengkap</label>
                            <input
                                class="h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="Masukkan nama" type="text">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant">Nama
                                Pengguna (Username)</label>
                            <input
                                class="h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="mis. jdoe" type="text">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant">Alamat
                                Email</label>
                            <input
                                class="h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="email@contoh.com" type="email">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant">Nomor
                                Telepon</label>
                            <input
                                class="h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 font-body-md text-body-md text-on-surface transition-all"
                                placeholder="+62..." type="tel">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 pt-2">
                        <label class="ml-1 font-label-caps text-label-caps text-on-surface-variant">Peran
                            Akses</label>
                        <select
                            class="h-[44px] bg-[#F1F5F9] border-transparent focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 font-body-md text-body-md text-on-surface transition-all">
                            <option disabled="" selected="">Pilih peran...</option>
                            <option>Administrator</option>
                            <option>Manajer</option>
                            <option>Pengguna Standar</option>
                        </select>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="flex justify-end gap-3 px-6 py-4 border-t bg-surface-bright/80 border-outline-variant/50">
                <button
                    class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular border border-outline text-secondary hover:bg-surface-container transition-colors"
                    id="btn-cancel-modal">
                    Batal
                </button>
                <button
                    class="h-[44px] px-6 rounded-lg font-data-tabular text-data-tabular bg-primary text-white shadow-sm hover:bg-primary-fixed-variant transition-colors">
                    Simpan Pengguna
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Simple Script for Modal Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('modal-add-user');
        const btnAdd = document.getElementById('btn-add-user');
        const btnClose = document.getElementById('btn-close-modal');
        const btnCancel = document.getElementById('btn-cancel-modal');

        const toggleModal = () => {
            modal.classList.toggle('hidden');
        };

        if (btnAdd) btnAdd.addEventListener('click', toggleModal);
        if (btnClose) btnClose.addEventListener('click', toggleModal);
        if (btnCancel) btnCancel.addEventListener('click', toggleModal);
    });
</script>
@endsection
