
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
                  <h6 class="mb-0">Transactions</h6>
                </div>
                {{-- <div class="col-6 text-end"> --}}
                  {{-- <a class="mb-0 btn bg-gradient-dark" href="javascript:;" @click="openModal" style="margin-right: 1rem"><i class=" fas fa-plus"></i>&nbsp;&nbsp;Add New Segment</a> --}}
                  {{-- <a class="mb-0 btn bg-gradient-success" href="javascript:;" @click="openModal" style="margin-right: 1rem"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Segment</a> --}}
                {{-- </div> --}}
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
            <div class="pb-0 card-header">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Transactions</h6>
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
                </div>
              </div>
            </div>
            <div class="px-0 pb-2 card-body">
              {{-- datatable --}}
              <div class="table-responsive">
                <table id="tabeldata" class="mdl-data-table">
                  <thead>
                    <tr >
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reference Number</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reference Number Provider</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reference Number Merchant</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Provider Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Message</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Desc</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Code Detail</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Message Detail</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transaction Total Amount</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Admin Fee</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Merchant Fee</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Admin Fee</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Merchant Fee</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Other Customer Info</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Other Reff</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Segment Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Reference Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Reference Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Category Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Type Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Group Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merchant Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merchant Outlet Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Saving Account ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Saving Account Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
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


    
  @push('scripts')
    <script src="{{url('/assets/js/core/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js"></script>
    <script src="{{url('/assets/js/core/datatable.js')}}"></script>
    <script src="https://cdn.datatables.net/2.3.6/js/dataTables.material.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
      const { createApp,onMounted, ref,nextTick } = Vue;
      createApp({
        setup() {
          const mainData=ref({});
          const form = ref({
            id: null,
            segment_name: '',
          });
          const refreshDataSegment = () => {
            const table = $('#tabeldata').DataTable();
            table.destroy();
            nextTick(() => {
              // if ($.fn.DataTable) {
                $('#tabeldata').DataTable({
                    ajax: {
                      url: '{{ route('transactions.getAll') }}',
                      method: 'POST',
                      headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                      },
                      dataSrc: function (json) {
                            mainData.value = json.data; // simpan ke Vue
                            // console.log(json.data);
                            return json.data;           // kembalikan ke DataTable
                        },
                    },
                    processing: true,
                    serverSide: false,
                    autoWidth: true,
                    columns: [
                      { data: 'id' },
                      { data: 'updated_at' },
                      { data: 'created_at' },
                      {data: 'reference_number'},
                      {data: 'reference_number_provider'},
                      {data: 'reference_number_merchant'},
                      {data: 'product_name'},
                      {data: 'product_code'},
                      {data: 'provider_name'},
                      {data: 'product_provider_name'},
                      {data: 'product_provider_code'},
                      {data: 'customer_id'},
                      {data: 'status_code',render:function(data,type){
                        switch (data) {
                          case '04':
                            return `<span class="badge bg-danger">${data}</span>`;
                            break;
                          case '36':
                            return `<span class="badge bg-primary">${data}</span>`;
                            break;
                          case '11':
                            return `<span class="badge bg-warning">${data}</span>`;
                            break;
                          default:
                            return `<span class="badge bg-success">${data}</span>`;
                            break;
                        }
                      }},
                      {data: 'status_message'},
                      {data: 'status_desc'},
                      {data: 'status_code_detail'},
                      {data: 'status_message_detail'},
                      {data: 'transaction_total_amount'},
                      {data: 'product_price'},
                      {data: 'product_admin_fee'},
                      {data: 'product_merchant_fee'},
                      {data: 'product_provider_price'},
                      {data: 'product_provider_admin_fee'},
                      {data: 'product_provider_merchant_fee'},
                      {data: 'other_customer_info'},
                      {data: 'other_reff'},
                      {data: 'segment_name'},
                      {data: 'product_reference_name'},
                      {data: 'product_reference_code'},
                      {data: 'product_category_name'},
                      {data: 'product_type_name'},
                      {data: 'client_name'},
                      {data: 'group_name'},
                      {data: 'merchant_name'},
                      {data: 'merchant_outlet_name'},
                      {data: 'username'},
                      {data: 'saving_account_id'},
                      {data: 'saving_account_name'},
                    ]
                });
              // }
            });
          };
          onMounted(() => {
            refreshDataSegment();
          });
          return { 
            mainData,
            refreshDataSegment,
            form,
          };
        }
      }).mount('#app');
    </script>
  @endpush
</x-app-layout>

