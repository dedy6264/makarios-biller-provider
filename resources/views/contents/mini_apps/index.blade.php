
<x-app-layout>
  @push('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.css" rel="stylesheet" />
  {{-- <link href="{{url('/assets/css/datatable.css')}}" rel="stylesheet" /> --}}
  <link href="https://cdn.datatables.net/2.3.6/css/dataTables.material.css" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @endpush
{{-- <div class="row"> --}}
    <div class="my-4 row">
        <div class="mb-4 col-lg-8 col-md-6 mb-md-0">
          <div class="mt-4 card">
            <div class="p-3 pb-0 card-header">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Clients</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="mb-0 btn bg-gradient-dark" href="javascript:;" v-if="balance!==0" style="margin-right: 1rem"><i class=" fas fa-plus"></i>&nbsp;&nbsp;Saldo : @{{$format.formatCurrency(balance)}} </a>
                </div>
              </div>
            </div>
            <div class="p-3 card-body">
              <div class="row">
                <div class="mb-4 col-md-6 mb-md-0">
                  <div class="flex-row border card card-body card-plain border-radius-lg d-flex align-items-center">
                    <img class="w-10 mb-0 me-3" src="../assets/img/logos/mastercard.png" alt="logo">
                    <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                    <i class="cursor-pointer fas fa-pencil-alt ms-auto text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="flex-row border card card-body card-plain border-radius-lg d-flex align-items-center">
                    <img class="w-10 mb-0 me-3" src="../assets/img/logos/visa.png" alt="logo">
                    <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                    <i class="cursor-pointer fas fa-pencil-alt ms-auto text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="mb-4 col-lg-8 col-md-6 mb-md-0">
          <div class="mt-4 card">
            <div class="p-3 card-body">
              <div class="row">
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md" @click="openModal('pulsa_prabayar')" style="cursor: pointer">
                      <i class="text-lg ni ni-mobile-button opacity-10" aria-hidden="true"></i>
                  </div>
                  <div class="pt-1 numbers"  >
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Pulsa Prabayar</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-mobile-button opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Pulsa Pascabayar</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-mobile-button opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Kuota Internet</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md" @click="openModal('pln_token')" style="cursor: pointer">
                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">PLN Token</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">PLN Tagihan</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">PLN Non Tagihan</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">PBB</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Samsat Online</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">PDAM</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">E-Wallet</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">E-Money</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4 col-lg-4 col-md-6 ">
          <div class="card h-100">
            <div class="pb-0 card-header">
              <h6>Orders overview</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>
            </div>
            <div class="p-3 card-body">
              <div class="timeline timeline-one-side" v-if="mainDataTransactions">
                <div class="mb-3 timeline-block" v-for=" item in mainDataTransactions">
                  <span class="timeline-step">
                    <i class="ni ni-bell-55 text-gradient" :class="statusTrx(item.status_code)"></i>
                  </span>
                  <div class="timeline-content" >
                    <div class="row">
                      <div class="col-6">
                        <h6 class="mb-0 text-sm text-dark font-weight-bold">@{{ item.product_name }}</h6>
                        <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">@{{$format.formatTanggal(item.updated_at)}}</p>
                      </div>
                      <div class="col-6" style="text-align: right">
                        <h6 class="mb-0 text-sm text-right text-dark font-weight-bold">@{{item.customer_id}}</h6>
                        <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">@{{ item.reference_number}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3 timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-html5 text-danger text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <div class="row" >
                      <div class="col-6">
                        <h6 class="mb-0 text-sm text-dark font-weight-bold">Pulsa Telkomsel 5K</h6>
                        <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">22 DEC 7:20 PM</p>
                      </div>
                      <div class="col-6" style="text-align: right">
                        <h6 class="mb-0 text-sm text-right text-dark font-weight-bold">082137789378</h6>
                        <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">DIV-260312-09823</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3 timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-cart text-info text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="mb-0 text-sm text-dark font-weight-bold">Server payments for April</h6>
                    <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">21 DEC 9:34 PM</p>
                  </div>
                </div>
                <div class="mb-3 timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-credit-card text-warning text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="mb-0 text-sm text-dark font-weight-bold">New card added for order #4395133</h6>
                    <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">20 DEC 2:20 AM</p>
                  </div>
                </div>
                <div class="mb-3 timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-key-25 text-primary text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="mb-0 text-sm text-dark font-weight-bold">Unlock packages for development</h6>
                    <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">18 DEC 4:54 AM</p>
                  </div>
                </div>
                <div class="timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-money-coins text-dark text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="mb-0 text-sm text-dark font-weight-bold">New order #9583120</h6>
                    <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">17 DEC</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  <!-- Modals -->
  @include('contents.mini_apps.modal_pulsa_prabayar')
  @include('contents.mini_apps.modal_pln_token')
  @include('contents.mini_apps.modal_inquiry')
  @include('contents.mini_apps.modalConfirm')
  <!-- End Modals -->

    
  @push('scripts')
    <script src="{{url('/assets/js/core/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js"></script>
    <script src="{{url('/assets/js/core/datatable.js')}}"></script>
    <script src="https://cdn.datatables.net/2.3.6/js/dataTables.material.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script>
      const { createApp,onMounted, ref,nextTick, watch } = Vue;
      const app = createApp({
        setup() {
          let modal_pulsa_prabayar = null;
          let modal_pln_token = null;
          let modal_inquiry = null;
          let modalConfirm = null;
          // const isModalOpen = ref(true);
          const isActiveButton = ref(false);
          const mainData=ref({});
          const mainDataTransactions=ref({});
          const balance=ref(0);
          const modalShowed = ref(null);
          const statusInquiry = ref();
          const statusPayment = ref();
          const icon=ref({
            png:'',
            desc:'',
          });
          const formInquiry = ref({
            product_code: '',
            reference_number: '',
            reference_number_merchant: '',
            customer_id: '',
            periode: '',
            product_price:0,
            admin_fee:0,
            total:0,
            pin:"",
            product_name:'',
            date_time:'',
            sn:'',
            status_code:'',
          });
          watch(
            () => formInquiry.value.customer_id,
            (value) => {
              if (value.length == 5) {
                 getProductFromIDCust();
              }
            }
          );
          const openModal = (data) => {
            isActiveButton.value=true;
            formInquiry.value.customer_id="";
            formInquiry.value.product_code='';
            formInquiry.value.reference_number='';
            formInquiry.value.reference_number_merchant='';
            switch (data) {
              case 'pulsa_prabayar':
                modalShowed.value = 'pulsa_prabayar';
                modal_pulsa_prabayar.show();
                break;
            case 'pln_token':
                modalShowed.value = 'pln_token';
                modal_pln_token.show();
                break;
              default:
                break;
            }
          };
          const closeModal = () => {
            isActiveButton.value=false;
            modal_pulsa_prabayar.hide();
            modal_pln_token.hide();
            modal_inquiry.hide();
            modalConfirm.hide();
            modalShowed.value=null;
            mainData.value=null;
          };
          const getProductFromIDCust=()=>{
            nextTick(()=>{
               axios.post('{{ route('mini_apps.get_product_by_cust_id') }}', formInquiry.value)
                  .then(response => {
                    mainData.value=response.data.data;
                  })
                  .catch(error => {
                    console.error("Error :", error);
                  });
            })
          };
          const getBalance=()=>{
            nextTick(()=>{
               axios.post('{{ route('mini_apps.get_balance') }}')
                  .then(response => {
                    balance.value=response.data.balance;
                  })
                  .catch(error => {
                    console.error("Error :", error);
                  });
            })
          };
          const statusTransaksi= () => {
            switch (mainData.value.responseCode) {
              case "00":
                icon.value.png='/assets/img/icons/success.gif';
                icon.value.desc='Transaksi Sukses';
                break;
            
              case "02":
                icon.value.png='/assets/img/icons/pending.gif';
                icon.value.desc='Transaksi Dalam Proses';
                break;
            
              case "04":
                icon.value.png='/assets/img/icons/success.gif';
                icon.value.desc='Konfirmasi Transaksi';
                break;
            
              default:
                icon.value.png='/assets/img/icons/failed.gif';
                icon.value.desc='Transaksi Gagal';
                break;
            }         
          }
          const funcInputFormInquiry=(idProduk)=>{
            mainData.value.forEach((item, index) => {
              if (item.id==idProduk){
                formInquiry.value.product_code=item.product_code;
                formInquiry.value.reference_number=item.reference_number;
                formInquiry.value.reference_number_merchant=item.reference_number_merchant;
              }
            })
            inquiry();
          };
          const inquiry=()=>{
            isActiveButton.value=false;
            nextTick(()=>{
               axios.post('{{ route('mini_apps.inquiry') }}', formInquiry.value)
                  .then(response => {
                    mainData.value=response.data;
                    olahDataInquiry();
                  })
                  .catch(error => {
                    console.error("Error creating client:", error);
                    
                  });
            })
          };
          const payment=()=>{
            isActiveButton.value=false;
            nextTick(()=>{
               axios.post('{{ route('mini_apps.payment') }}', formInquiry.value)
                  .then(response => {
                    mainData.value=response.data;
                    olahDataPayment();
                  })
                  .catch(error => {
                    console.error("Error creating client:", error);
                    
                  });
            })
          };
          const olahDataPayment=()=>{
            isActiveButton.value=true;
            statusTransaksi();
            switch (mainData.value.responseCode) {
              case '00','02','03':
                  formInquiry.value.product_code=mainData.value.result.product_code;
                  formInquiry.value.reference_number=mainData.value.result.reference_number;
                  formInquiry.value.reference_number_merchant=mainData.value.result.reference_number_merchant;
                  formInquiry.value.customer_id=mainData.value.result.customer_id;
                  formInquiry.value.periode=mainData.value.result.periode;
                  formInquiry.value.product_price=mainData.value.result.product_price;
                  formInquiry.value.admin_fee=mainData.value.result.product_admin_fee;
                  formInquiry.value.total=mainData.value.result.transaction_total_amount;
                  formInquiry.value.product_name=mainData.value.result.product_name;
                  formInquiry.value.date_time=mainData.value.result.updated_at;
                  formInquiry.value.sn=mainData.value.result.bill_info.sn;
                  formInquiry.value.status_code=mainData.value.result.status_code;
                break;
            
              default:
                break;
            }
            closeModal();
            //modal inquiry show
            modalShowed.value='modalConfirm';
            modalConfirm.show();
          };
          const olahDataInquiry=()=>{
            statusTransaksi();
            if(mainData.value.responseCode=='04'){
              //fill inquiry form
              formInquiry.value.reference_number=mainData.value.result.reference_number;
              formInquiry.value.reference_number_merchant=mainData.value.result.reference_number_merchant;
              formInquiry.value.product_price=mainData.value.result.product_price;
              formInquiry.value.admin_fee=mainData.value.result.product_admin_fee;
              formInquiry.value.total=mainData.value.result.transaction_total_amount;
              formInquiry.value.product_code=mainData.value.result.product_code;
              formInquiry.value.customer_id=mainData.value.result.customer_id;
              formInquiry.value.date_time=mainData.value.result.updated_at;
              //modal all off
              closeModal();
              //modal inquiry show
              isActiveButton.value=true;
              modalShowed.value='modal_inquiry';
              modal_inquiry.show();
            }
          };
          const refreshDataTransaction = () => {
           nextTick(()=>{
               axios.post('{{ route('mini_apps.get_transactions') }}', formInquiry.value)
                  .then(response => {
                    // console.log(response.data);
                    mainDataTransactions.value=response.data.data;
                  })
                  .catch(error => {
                    console.error("Error :", error);
                  });
            })
          };
          const statusTrx=(val)=>{
            switch (val) {
              case '00':
              return 'text-success';
                break;
              case '02':
                return 'text-warning';
                break
              default:
                return 'text-danger'
                break;
            }
          }
          onMounted(() => {
            modal_pulsa_prabayar = new bootstrap.Modal(document.getElementById('modalPulsaPrabayar'), options);
            modal_pln_token = new bootstrap.Modal(document.getElementById('modalPlnToken'), options);
            modal_inquiry = new bootstrap.Modal(document.getElementById('modalInquiry'), options);
            modalConfirm = new bootstrap.Modal(document.getElementById('modalConfirm'), options);
            getBalance();
            // modalConfirm.show();
            // refreshDataClient();
            refreshDataTransaction();
          });
          return { 
            statusTrx,
            refreshDataTransaction,
            balance,
            isActiveButton,
            mainData,
            modalShowed,
            formInquiry,
            openModal,
            closeModal,
            funcInputFormInquiry,
            olahDataInquiry,
            olahDataPayment,
            payment,
            icon,
            statusTransaksi,
            mainDataTransactions,
          };
        }
      })
      app.config.globalProperties.$format = window.format
      app.mount('#app')
    </script>
  @endpush
</x-app-layout>

