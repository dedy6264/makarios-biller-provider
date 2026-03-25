
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
                  <a class="mb-0 btn bg-gradient-dark" href="javascript:;" @click="openModal" style="margin-right: 1rem"><i class=" fas fa-plus"></i>&nbsp;&nbsp;Add New </a>
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
               
                {{-- <div class="col-lg-6 col-7">
                  <h6>Clients</h6>
                </div>
                <div class="my-auto col-lg-6 col-5 text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="px-2 py-3 dropdown-menu ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div> --}}
              </div>
            </div>
            {{-- <div class="px-0 pb-2 card-body">
              <div class="table-responsive">
                <table id="tabeldata" class="mdl-data-table">
                  <thead>
                    <tr >
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Client Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div> --}}
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="pb-0 card-header">
              <h6>Orders overview</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>
            </div>
            <div class="p-3 card-body">
              <div class="timeline timeline-one-side">
                <div class="mb-3 timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="mb-0 text-sm text-dark font-weight-bold">$2400, Design changes</h6>
                    <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">22 DEC 7:20 PM</p>
                  </div>
                </div>
                <div class="mb-3 timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-html5 text-danger text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="mb-0 text-sm text-dark font-weight-bold">New order #1832412</h6>
                    <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">21 DEC 11 PM</p>
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
      createApp({
        setup() {
          let modal_pulsa_prabayar = null;
          let modal_pln_token = null;
          let modal_inquiry = null;
          let modalConfirm = null;
          const isModalOpen = ref(true);
          const isEditMode = ref(false);
          const mainData=ref({});
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
              console.log("hit");
                 getProductFromIDCust();
              }
            }
          );
          const statusTransaksi= () => {
            console.log("masuk su::", key);
            switch (mainData.value.responseCode) {
              case "00":
                icon.value.png='/assets/img/icons/success.gif';
                icon.value.desc='Transaksi Sukses';
                break;
            
              case "02":
                icon.value.png='/assets/img/icons/pending.gif';
                icon.value.desc='Transaksi Dalam Proses';
                break;
            
              default:
                icon.value.png='/assets/img/icons/failed.gif';
                icon.value.desc='Transaksi Gagal';
                break;
            }    
            console.log("::::",icon.value);        
          }
          const formPayment = ref({
            reference_number:'',
          });
          const openModal = (value) => {
            formInquiry.value.customer_id="";
            formInquiry.value.product_code='';
            formInquiry.value.reference_number='';
            formInquiry.value.reference_number_merchant='';
            switch (value) {
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
            modal_pulsa_prabayar.hide();
            modal_pln_token.hide();
            modal_inquiry.hide();
            modalConfirm.hide();
            modalShowed.value=null;
            mainData.value=null;
          };
          
          const funcInputFormInquiry=(idProduk)=>{
          mainData.value.forEach((item, index) => {
            console.log(item, index)
            if (item.id==idProduk){
              formInquiry.value.product_code=item.product_code;
              formInquiry.value.reference_number=item.reference_number;
              formInquiry.value.reference_number_merchant=item.reference_number_merchant;
            }
          })
          inquiry();
          };
          const inquiry=()=>{
            console.log("PAYLOAD:m ", formInquiry.value);
            nextTick(()=>{
               axios.post('{{ route('mini_apps.inquiry') }}', formInquiry.value)
                  .then(response => {
                    mainData.value=response.data;
                    // console.log("Client created:", mainData.value.result.reference_number);
                    olahDataInquiry();
                  })
                  .catch(error => {
                    console.error("Error creating client:", error);
                    
                  });
            })
          };
          const payment=()=>{
            console.log("PAYLOAD:m ", formInquiry.value);
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
            console.log("belum");
            statusTransaksi();
            console.log("sudah");
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
            isEditMode.value = false;
            closeModal();
            //modal inquiry show
            modalShowed.value='modalConfirm';
            modalConfirm.show();
          }
          const olahDataInquiry=()=>{
          if(mainData.value.responseCode=='04'){
            //fill inquiry form
            formInquiry.value.reference_number=mainData.value.result.reference_number;
            formInquiry.value.reference_number_merchant=mainData.value.result.reference_number_merchant;
            formInquiry.value.product_price=mainData.value.result.product_price;
            formInquiry.value.admin_fee=mainData.value.result.product_admin_fee;
            formInquiry.value.total=mainData.value.result.transaction_total_amount;
            formInquiry.value.product_code=mainData.value.result.product_code;
            formInquiry.value.customer_id=mainData.value.result.customer_id;
            // console.log("Maindata:m ", formInquiry.value);
            //modal all off
            isEditMode.value = false;
            closeModal();
            //modal inquiry show
            modalShowed.value='modal_inquiry';
            modal_inquiry.show();
          }
          }
          const getProductFromIDCust=()=>{
            nextTick(()=>{
               axios.post('{{ route('mini_apps.getProductByCustID') }}', formInquiry.value)
                  .then(response => {
                    console.log("Client created:", response.data);
                    mainData.value=response.data.data;
                  })
                  .catch(error => {
                    console.error("Error :", error);
                  });
            })
          };
          onMounted(() => {
            modal_pulsa_prabayar = new bootstrap.Modal(document.getElementById('modalPulsaPrabayar'), options);
            modal_pln_token = new bootstrap.Modal(document.getElementById('modalPlnToken'), options);
            modal_inquiry = new bootstrap.Modal(document.getElementById('modalInquiry'), options);
            modalConfirm = new bootstrap.Modal(document.getElementById('modalConfirm'), options);
            // modalConfirm.show();
            // refreshDataClient();
          });
          return { 
            isModalOpen,
            isEditMode,
            mainData,
            modalShowed,
            formInquiry,
            formPayment,
            openModal,
            closeModal,
            funcInputFormInquiry,
            olahDataInquiry,
            olahDataPayment,
            payment,
            icon,
            statusTransaksi,
          };
        }
      }).mount('#app');
    </script>
  @endpush
</x-app-layout>

