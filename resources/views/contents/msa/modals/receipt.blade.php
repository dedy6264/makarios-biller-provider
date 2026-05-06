<Transition enter-active-class="duration-300 ease-out" enter-from-class="opacity-0" enter-to-class="opacity-100"
    leave-active-class="duration-200 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">

    <div v-if="modalShower.isReceipt" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="fixed inset-0 transition-opacity bg-gray-900/60 backdrop-blur-sm"
            @click="modalShower.isReceipt=false"></div>

        <div class="flex items-end justify-center min-h-full p-0 sm:items-center sm:p-6">
            <div
                class="relative w-full max-w-md bg-surface-container-low rounded-t-[2.5rem] sm:rounded-[2.5rem] shadow-[0px_24px_48px_rgba(0,0,0,0.1)] flex flex-col max-h-[90vh] overflow-hidden transition-all transform">

                <div class="w-12 h-1.5 bg-outline-variant/30 rounded-full mx-auto mt-4 shrink-0 sm:hidden"></div>

                <div class="flex-1 overflow-y-auto scrollbar-hide" v-if="dataTransaction">
                    <div class="flex flex-col items-center px-8 pt-8 pb-4">
                        <div
                            class="flex items-center justify-center w-20 h-20 mb-6 rounded-full bg-emerald-50 ring-8 ring-emerald-50/50">
                            <span class="text-5xl material-symbols-outlined text-emerald-500"
                                style=" font-variation-settings: 'FILL' 1;"
                                v-if="dataTransaction.status_code=='00'">check_circle</span>
                            <span class="text-5xl text-yellow-500 material-symbols-outlined"
                                style=" font-variation-settings: 'FILL' 1;"
                                v-else-if="dataTransaction.status_code=='02'">hourglass_bottom</span>
                            <span class="text-5xl text-red-500 material-symbols-outlined"
                                style=" font-variation-settings: 'FILL' 1;" v-else>cancel</span>
                        </div>
                        <div v-if="dataTransaction.status_code=='00'">
                            <h1 class="text-2xl font-extrabold tracking-tight font-headline text-on-surface">Transaction
                                Successful
                            </h1>
                            <p class="mt-1 text-sm text-center font-label text-on-surface-variant">Your payment has been
                                processed
                            </p>
                        </div>
                        <div v-else-if="dataTransaction.status_code=='02'">
                            <h1 class="text-2xl font-extrabold tracking-tight font-headline text-on-surface">Transaction
                                Process
                            </h1>
                            <p class="mt-1 text-sm text-center font-label text-on-surface-variant">Your payment has
                                processed
                            </p>
                        </div>
                        <div v-else>
                            <h1 class="text-2xl font-extrabold tracking-tight font-headline text-on-surface">Transaction
                                Failed
                            </h1>
                            <p class="mt-1 text-sm text-center font-label text-on-surface-variant">Your payment has been
                                Fail
                            </p>
                        </div>
                    </div>

                    <div class="px-6 pb-8">
                        <div class="p-6 shadow-sm bg-surface-container-lowest receipt-cut rounded-2xl">
                            <div
                                class="flex flex-col items-center pb-6 mb-6 border-b border-dashed border-outline-variant/30">
                                <div
                                    class="flex items-center justify-center w-12 h-12 mb-3 bg-primary-fixed rounded-xl">
                                    <span class="material-symbols-outlined text-primary"
                                        style="font-variation-settings: 'FILL' 1;">storefront</span>
                                </div>
                                <h2 class="text-lg font-bold font-headline text-on-surface">
                                    @{{dataTransaction.merchant_outlet_name}}</h2>
                                <span
                                    class="mt-1 text-xs font-semibold tracking-widest uppercase font-label text-primary">Payment
                                    Receipt</span>
                            </div>
                            {{-- data detail--}}
                            <div class="space-y-5">
                                {{-- <div class="flex items-center justify-between">
                                    <span class="text-sm font-label text-on-surface-variant">Merchant Name</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.merchant_outlet_name}}</span>
                                </div> --}}
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-label text-on-surface-variant">Date</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{$format.formatTanggal(dataTransaction.updated_at)}}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-label text-on-surface-variant">Transaction ID</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.reference_number}}</span>
                                </div>
                                <div class="w-full h-px bg-surface-container-high"></div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-label text-on-surface-variant">Product</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.product_name}}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-label text-on-surface-variant">Customer ID</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.customer_id}}</span>
                                </div>
                                <div class="flex items-center justify-between" v-if="dataTransaction.bill_info.sn">
                                    <span class="text-sm font-label text-on-surface-variant"
                                        v-if="dataTransaction.product_reference_code='PLNPRE'">Sn/Token</span>
                                    <span class="text-sm font-label text-on-surface-variant" v-else>Sn</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.bill_info.sn}}</span>
                                    <button @click="copyToClipboard(dataTransaction.bill_info.sn)"
                                        class="flex items-center gap-1 text-sm font-semibold transition-transform text-primary active:scale-95">
                                        <span class="text-lg material-symbols-outlined"
                                            data-icon="content_copy">content_copy</span>
                                    </button>
                                </div>
                                <div class="flex items-center justify-between"
                                    v-if="dataTransaction.bill_info.bill_desc.customer_name">
                                    <span class="text-sm font-label text-on-surface-variant">Customer Name</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.bill_info.bill_desc.customer_name}}</span>
                                </div>
                                <div class="flex items-center justify-between"
                                    v-if="dataTransaction.bill_info.bill_desc.daya">
                                    <span class="text-sm font-label text-on-surface-variant">Daya</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.bill_info.bill_desc.daya}}</span>
                                </div>
                                <div class="flex items-center justify-between"
                                    v-if="dataTransaction.bill_info.bill_desc.meter_no">
                                    <span class="text-sm font-label text-on-surface-variant">No Meter</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.bill_info.bill_desc.meter_no}}</span>
                                </div>
                                <div class="flex items-center justify-between"
                                    v-if="dataTransaction.bill_info.bill_desc.tarif">
                                    <span class="text-sm font-label text-on-surface-variant">Tarif</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{dataTransaction.bill_info.bill_desc.tarif}}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-label text-on-surface-variant">Nominal</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{$format.formatCurrency(dataTransaction.product_price)}}</span>
                                </div>
                                <div class="flex items-center justify-between"
                                    v-if="dataTransaction.product_admin_fee!==0">
                                    <span class="text-sm font-label text-on-surface-variant">Admin Fee</span>
                                    <span
                                        class="text-sm font-semibold font-body text-on-surface">@{{$format.formatCurrency(dataTransaction.product_admin_fee)}}</span>
                                </div>
                                <div class="w-full h-px bg-surface-container-high"></div>
                                <div class="flex items-center justify-between pt-2">
                                    <span class="font-bold font-headline text-on-surface">Total Payment</span>
                                    <span
                                        class="text-xl font-extrabold tracking-tight text-right font-headline text-primary">@{{$format.formatCurrency(dataTransaction.transaction_total_amount)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="flex gap-3 px-6 pt-4 pb-10 border-t bg-surface-container-low border-outline-variant/10 sm:pb-8 shrink-0">
                    <button v-if="dataTransaction.status_code=='00'"
                        class="flex items-center justify-center flex-1 gap-2 px-4 py-4 font-bold transition-all bg-surface-container-highest text-primary font-label rounded-2xl active:scale-95">
                        <span class="text-xl material-symbols-outlined">print</span>
                        Print
                    </button>
                    <button @click="shareAsImage" :disabled="modalShower.isSharing"
                        v-if="dataTransaction.status_code=='00'"
                        class="flex items-center justify-center flex-1 gap-2 px-4 py-4 font-bold transition-all shadow-lg bg-gradient-to-br from-primary to-primary-container text-on-primary rounded-2xl active:scale-95 disabled:opacity-70">

                        <template v-if="modalShower.isSharing">
                            <svg class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Processing...
                        </template>

                        <template v-else>
                            <span class="text-xl material-symbols-outlined">share</span>
                            Share
                        </template>
                    </button>
                    <button v-else-if="dataTransaction.status_code=='02'" @click="modalShower.isReceipt=false"
                        class="flex items-center justify-center flex-1 gap-2 px-4 py-4 font-bold transition-all bg-yellow-600 text-on-primary font-label rounded-2xl active:scale-95">
                        <span class="text-xl text-white material-symbols-outlined">cancel</span>
                        Close
                    </button>
                    <button v-else @click="modalShower.isReceipt=false"
                        class="flex items-center justify-center flex-1 gap-2 px-4 py-4 font-bold transition-all bg-red-600 text-on-primary font-label rounded-2xl active:scale-95">
                        <span class="text-xl text-white material-symbols-outlined">cancel</span>
                        Close
                    </button>
                </div>

                <button @click="modalShower.isReceipt=false"
                    class="absolute flex items-center justify-center w-10 h-10 rounded-full top-6 right-6 bg-surface-container-high text-on-surface-variant active:scale-90 hover:bg-surface-container-highest transition-colors z-[70]">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>
    </div>
</Transition>