<div v-if="modalShower.isInquiry">
    <main class="max-w-md px-6 pt-24 pb-32 mx-auto">
        <!-- Summary Header Card -->
        <div
            class="bg-surface-container-lowest rounded-3xl p-8 mb-8 text-center shadow-[0px_12px_32px_rgba(0,62,199,0.04)]">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-blue-50 rounded-2xl">
                <span class="text-3xl text-blue-600 material-symbols-outlined"
                    data-icon="receipt_long">receipt_long</span>
            </div>
            <p class="mb-1 text-sm font-medium tracking-widest uppercase text-on-surface-variant">Total Payment</p>
            <h2 class="text-3xl font-extrabold tracking-tight font-headline text-on-surface">
                @{{$format.formatCurrency(dataInquiry.transaction_total_amount)}}</h2>
        </div>
        <!-- Details Section: Product Information -->
        <section class="mb-8">
            <div class="flex items-center justify-between px-2 mb-4">
                <h3 class="font-bold font-headline text-on-surface">Product Information</h3>
                <span class="text-blue-600 text-[11px] font-bold tracking-widest uppercase">Verified</span>
            </div>
            <div class="p-6 space-y-6 bg-surface-container-low rounded-3xl">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Product
                            Name</p>
                        <p class="font-semibold text-on-surface">@{{dataInquiry.product_name}}</p>
                    </div>
                    <div
                        class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white shadow-sm rounded-xl">
                        <img class="object-contain w-8 h-8"
                            data-alt="Official logo of a telecommunications provider with vibrant red and white branding colors"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7_0rIWyZMq7dd7ME7X8YdBpjQHcsYyIg9tqkdorQHV4DZmOipZTwIha9pwJbiasvgrChCeuiuCiEyTqEhER8x_17-d2nUzdjgy_72WeI8e7vRtRQM5lMNCxlnPnalPEpxmx14aE0NAk7lO2X2fnIhaOyHU_YW78JK-D6dr9qo5_lEc66VEXBc_Q8plzJ1_rkseLhsmHkOEtoUxCN1bGWEmAfH6gBThjTcyTS6jvNmm71aQD8levL5J7a_xQ_eXfyboUZbSQUJGoVI" />
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Price</p>
                        <p class="font-semibold text-on-surface"> @{{$format.formatCurrency(dataInquiry.product_price)}}
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Admin Fee
                        </p>
                        <p class="font-semibold text-on-surface">
                            @{{$format.formatCurrency(dataInquiry.product_admin_fee)}}</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Details Section: Customer Details -->
        <section class="mb-8">
            <div class="flex items-center justify-between px-2 mb-4">
                <h3 class="font-bold font-headline text-on-surface">Customer Details</h3>
            </div>
            <div class="p-6 space-y-6 bg-surface-container-low rounded-3xl">
                <div>
                    <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Customer ID /
                        Number</p>
                    <div class="flex items-center gap-3">
                        <p class="text-lg font-semibold tracking-wide text-on-surface">@{{dataInquiry.customer_id}}</p>
                        <span class="text-lg text-blue-600 material-symbols-outlined"
                            data-icon="content_copy">content_copy</span>
                    </div>
                </div>
                <div v-if="dataInquiry.bill_info.bill_desc.customer_name">
                    <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Nama</p>
                    <p class="font-semibold text-on-surface">@{{ dataInquiry.bill_info.bill_desc.customer_name }}</p>
                </div>
                <div v-if="dataInquiry.bill_info.bill_desc.daya">
                    <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Daya</p>
                    <p class="font-semibold text-on-surface">@{{ dataInquiry.bill_info.bill_desc.daya }}</p>
                </div>
                <div v-if="dataInquiry.bill_info.bill_desc.meter_no">
                    <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">No Meter</p>
                    <p class="font-semibold text-on-surface">@{{ dataInquiry.bill_info.bill_desc.meter_no }}</p>
                </div>
                <div v-if="dataInquiry.bill_info.bill_desc.tarif">
                    <p class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Tarif</p>
                    <p class="font-semibold text-on-surface">@{{ dataInquiry.bill_info.bill_desc.tarif }}</p>
                </div>
            </div>
        </section>
        <!-- Payment Notice -->
        <div class="flex items-start gap-3 px-4 py-4 bg-blue-50/50 rounded-2xl">
            <span class="material-symbols-outlined text-blue-600 text-sm mt-0.5" data-icon="info">info</span>
            <p class="text-xs leading-relaxed text-on-secondary-container">
                Please ensure all details are correct. Transactions cannot be cancelled after confirmation.
            </p>
        </div>
    </main>
    <!-- Bottom Action Bar -->
    <div
        class="fixed bottom-0 left-0 z-50 grid w-full grid-cols-10 gap-2 px-6 py-3 pt-4 pb-10 bg-white/70 backdrop-blur-xl">

        <button @click="fMsaHome"
            class="flex items-center justify-center col-span-3 gap-2 py-3 text-xs font-semibold transition-colors duration-200 bg-surface-container-low rounded-xl font-label text-on-surface hover:bg-surface-container-high active:scale-95">
            <span class="material-symbols-outlined">
                arrow_circle_left
            </span>Back
        </button>
        <button @click="fConfirm"
            class="col-span-7 w-full bg-gradient-to-br from-primary to-primary-container text-on-primary font-headline font-bold py-4 rounded-2xl shadow-[0px_8px_24px_rgba(0,62,199,0.2)] transition-all duration-300 hover:bg-surface-container-high active:scale-95">
            Confirm &amp; Pay
        </button>
    </div>
</div>