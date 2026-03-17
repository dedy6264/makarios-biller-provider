
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
                  <h6 class="mb-0">Product Segments</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="mb-0 btn bg-gradient-dark" href="javascript:;" @click="openModal" style="margin-right: 1rem"><i class=" fas fa-plus"></i>&nbsp;&nbsp;Add New</a>
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
            <div class="pb-0 card-header">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Product Segments</h6>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Segment Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Reference Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Reference Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Provider Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Category Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Admin Fee</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Provider Merchant Fee</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Type Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Admin Fee</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Merchant Fee</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Availability</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated By</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>
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
    {{-- modal create update --}}
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@{{ isEditMode ? 'Edit Segment Product' : 'Add Segment Product' }}</h5>
        </div>
        <div class="modal-body">
          {{-- ......................... --}}
                  <div class="card-body">
                    <form role="form text-left">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3" >
                            <label for="segment_id" class="form-label">Segment Name</label>
                            <select name="segment_id" id="segment_id" v-model="form.segment_id" class="form-select">
                              <option value="" disabled>Select Segment</option>
                              <option v-for="segment in segments" :key="segment.id" :value="segment.id">
                                @{{ segment.segment_name }}
                              </option>
                            </select>
                          </div>
                          <div class="mb-3" >
                            <label for="provider_id" class="form-label">Provider</label>
                            <select name="provider_id" id="provider_id" v-model="form.provider_id" class="form-select">
                              <option value="" disabled>Select Provider</option>
                              <option v-for="provider in providers" :key="provider.id" :value="provider.id">
                                @{{ provider.provider_name }}
                              </option>
                            </select>
                          </div>
                          <div class="mb-3" v-if="form.provider_id != 0 ">
                            <label for="product_provider_id" class="form-label">Product Provider</label>
                            <select name="product_provider_id" id="product_provider_id" v-model="form.product_provider_id" class="form-select">
                              <option value="" disabled>Select Product Provider</option>
                              <option v-for="product_provider in product_providers" :key="product_provider.id" :value="product_provider.id">
                                @{{ product_provider.product_provider_name }}
                              </option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="product_provider_price" class="form-label">Product Provider Price</label>
                            <input type="currency" v-model="form.product_provider_price" class="form-control" id="product_provider_price" placeholder="Product Provider Price" aria-label="Product Provider Price" aria-describedby="email-addon" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="product_provider_admin_fee" class="form-label">Product Provider Admin Fee</label>
                            <input type="currency" v-model="form.product_provider_admin_fee" class="form-control" id="product_provider_admin_fee" placeholder="Product Provider Price" aria-label="Product Provider Price" aria-describedby="email-addon" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="product_provider_merchant_fee" class="form-label">Product Provider Merchant Fee</label>
                            <input type="currency" v-model="form.product_provider_merchant_fee" class="form-control" id="product_provider_merchant_fee" placeholder="Product Provider Price" aria-label="Product Provider Price" aria-describedby="email-addon" readonly>
                          </div>
                          {{-- <div class="mb-3">
                            <label for="role_code" class="form-label">Segment Code</label>
                            <input type="text" v-model="form.role_code" class="form-control" id="role_code" placeholder="Segment Code" aria-label="Segment Code" aria-describedby="email-addon">
                          </div> --}}
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3" >
                            <label for="product_type_id" class="form-label">Product Type</label>
                            <select name="product_type_id" id="product_type_id" v-model="form.product_type_id" class="form-select">
                              <option value="" disabled>Select Type</option>
                              <option v-for="product_type in product_types" :key="product_type.id" :value="product_type.id">
                                @{{ product_type.product_type_name }}
                              </option>
                            </select>
                          </div>
                          <div class="mb-3" >
                            <label for="product_id" class="form-label">Product</label>
                            <select name="product_id" id="product_id" v-model="form.product_id" class="form-select">
                              <option value="" disabled>Select Product</option>
                              <option v-for="product in products" :key="product.id" :value="product.id">
                                @{{ product.product_name }}
                              </option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="currency" v-model="form.product_price" class="form-control" id="product_price" placeholder="Product Price" aria-label="Product Price" aria-describedby="email-addon" >
                          </div>
                          <div class="mb-3">
                            <label for="product_admin_fee" class="form-label">Product Admin Fee</label>
                            <input type="currency" v-model="form.product_admin_fee" class="form-control" id="product_admin_fee" placeholder="Product Price" aria-label="Product Price" aria-describedby="email-addon" >
                          </div>
                          <div class="mb-3">
                            <label for="product_merchant_fee" class="form-label">Product Merchant Fee</label>
                            <input type="currency" v-model="form.product_merchant_fee" class="form-control" id="product_merchant_fee" placeholder="Product Price" aria-label="Product Price" aria-describedby="email-addon" >
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
          {{-- ......................... --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
          <button type="button" class="btn btn-primary" @click="isEditMode ? updateSegmentProduct() : storeSegmentProduct()">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    {{-- end modal create update --}}

    
  @push('scripts')
    <script src="{{url('/assets/js/core/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js"></script>
    <script src="{{url('/assets/js/core/datatable.js')}}"></script>
    <script src="https://cdn.datatables.net/2.3.6/js/dataTables.material.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
      const { createApp,onMounted, ref,nextTick ,watch} = Vue;
      createApp({
        setup() {
          const segments = ref(@json($segments));
          const product_providers = ref([]);
          const products = ref(@json($products));
          const providers = ref(@json($providers));
          const product_types = ref(@json($product_types));
          const isModalOpen = ref(true);
          const isEditMode = ref(false);
          const mainData=ref({});
          let myModal = null;
          const form = ref({
            id: 0,
            provider_id:0,
            provider_name:'',
            product_provider_name:'',
            product_provider_code:'',
            product_provider_price:0,
            product_provider_admin_fee:0,
            product_provider_merchant_fee:0,
            segment_id:0,
            segment_name:'',
            product_reference_id:0,
            product_reference_name:'',
            product_reference_code:'',
            product_category_id:0,
            product_category_name:'',
            product_provider_id:0,
            product_type_id:0,
            product_type_name:'',
            product_id:0,
            product_name:'',
            product_code:'',
            product_price:0,
            product_admin_fee:0,
            product_merchant_fee:0,
            product_availability:'',
          });
          const openModal = () => {
            myModal.show();
          };
          const closeModal = () => {
            form.value.id = 0;
            form.value.provider_id=0,
            form.value.provider_name='',
            form.value.product_provider_name='',
            form.value.product_provider_code='',
            form.value.product_provider_price=0,
            form.value.product_provider_admin_fee=0,
            form.value.product_provider_merchant_fee=0,
            form.value.segment_id=0,
            form.value.segment_name='',
            form.value.product_reference_id=0,
            form.value.product_reference_name='',
            form.value.product_reference_code='',
            form.value.product_category_id=0,
            form.value.product_category_name='',
            form.value.product_provider_id=0,
            form.value.product_type_id=0,
            form.value.product_type_name='',
            form.value.product_id=0,
            form.value.product_name='',
            form.value.product_code='',
            form.value.product_price=0,
            form.value.product_admin_fee=0,
            form.value.product_merchant_fee=0,
            form.value.product_availability='',
            myModal.hide();
            isEditMode.value = false;
          };
          const refreshData = () => {

            const table = $('#tabeldata').DataTable();
            table.destroy();
            nextTick(() => {
              // if ($.fn.DataTable) {
                $('#tabeldata').DataTable({
                    ajax: {
                      url: '{{ route('product_segments.getAll') }}',
                      method: 'POST',
                      headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                      },
                      dataSrc: function (json) {
                            mainData.value = json.data; // simpan ke Vue
                            return json.data;           // kembalikan ke DataTable
                        },
                    },
                    processing: true,
                    serverSide: false,
                    autoWidth: true,
                    columns: [
                        { data: 'id' },
                        { data: 'id',render:function(data,type){
                         return `
                            <button class="btn btn-sm btn-outline-success" onclick="updateModal(${data})">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-outline-primary" onclick="deleteSegmentProduct(${data})">
                                Delete
                            </button>`} },
                        { data: 'segment_name'},
                        { data: 'product_name'},
                        { data: 'product_code'},
                        { data: 'product_reference_name'},
                        { data: 'product_reference_code'},
                        { data: 'provider_name'},
                        { data: 'product_provider_name'},
                        { data: 'product_provider_code'},
                        { data: 'product_category_name'},
                        { data: 'product_provider_price'},
                        { data: 'product_provider_admin_fee'},
                        { data: 'product_provider_merchant_fee'},
                        { data: 'product_type_name'},
                        { data: 'product_price'},
                        { data: 'product_admin_fee'},
                        { data: 'product_merchant_fee'},
                        { data: 'product_availability'},
                        { data: 'created_by'},
                        { data: 'updated_by'},
                        { data: 'updated_at' },
                        { data: 'created_at' }
                    ]
                });
              // }
            });
          };
          window.updateModal = (idSegmentProduct) => {
              for(let a=0;a<mainData.value.length;a++){
                if (mainData.value[a].id==idSegmentProduct){
                  form.value.id = idSegmentProduct;
                  form.value.client_name = mainData.value[a].client_name;
                  form.value.provider_id=mainData.value[a].provider_id;
                  form.value.provider_name=mainData.value[a].provider_name;
                  form.value.product_provider_name=mainData.value[a].product_provider_name;
                  form.value.product_provider_code=mainData.value[a].product_provider_code;
                  form.value.product_provider_price=mainData.value[a].product_provider_price;
                  form.value.product_provider_admin_fee=mainData.value[a].product_provider_admin_fee;
                  form.value.product_provider_merchant_fee=mainData.value[a].product_provider_merchant_fee;
                  form.value.segment_id=mainData.value[a].segment_id;
                  form.value.segment_name=mainData.value[a].segment_name;
                  form.value.product_reference_id=mainData.value[a].product_reference_id;
                  form.value.product_reference_name=mainData.value[a].product_reference_name;
                  form.value.product_reference_code=mainData.value[a].product_reference_code;
                  form.value.product_category_id=mainData.value[a].product_category_id;
                  form.value.product_category_name=mainData.value[a].product_category_name;
                  form.value.product_provider_id=mainData.value[a].product_provider_id;
                  form.value.product_type_id=mainData.value[a].product_type_id;
                  form.value.product_type_name=mainData.value[a].product_type_name;
                  form.value.product_id=mainData.value[a].product_id;
                  form.value.product_name=mainData.value[a].product_name;
                  form.value.product_code=mainData.value[a].product_code;
                  form.value.product_price=mainData.value[a].product_price;
                  form.value.product_admin_fee=mainData.value[a].product_admin_fee;
                  form.value.product_merchant_fee=mainData.value[a].product_merchant_fee;
                  form.value.product_availability=mainData.value[a].product_availability;
                  isEditMode.value = true;
                  myModal.show();
                }
              };
          };
          window.deleteSegmentProduct = (idSegmentProduct) => {
            nextTick(()=>{
                // Create new role
               axios.post('{{ route('product_segments.destroy') }}', { id: idSegmentProduct })
                  .then(response => {
                    refreshData();
                  })
                  .catch(error => {
                    console.error("Error creating role:", error);
                  });
            })
          };
          
          watch(
            [() => form.value.provider_id, () => form.value.segment_id, () => form.value.product_reference_id, () => form.value.product_category_id, () => form.value.product_provider_id, () => form.value.product_type_id, () => form.value.product_id], 
            ([
              new_provider,
              new_segment,
              new_product_reference,
              new_product_category,
              new_product_provider,
              new_product_type,
              new_product,
            ], [
              old_provider,
              old_segment,
              old_product_reference,
              old_product_category,
              old_product_provider,
              old_product_type,
              old_product,
            ]
            ) => {
              // console.log("Client Baru:", new_segment, "Role Baru:", new_provider);
              // Jalankan fungsi jika keduanya sudah terisi
              if (new_provider) {
                  getProductProvider(new_provider);
              }
              if(new_product_provider){
                setProductProviderData();
              }
            }
          );
          const setProductProviderData=()=>{
             for(let a=0;a<product_providers.value.length;a++){
              if (product_providers.value[a].id==form.value.product_provider_id){
                form.value.product_provider_name= product_providers.value[a].product_provider_name;
                form.value.product_provider_code= product_providers.value[a].product_provider_code;
                form.value.product_provider_price= product_providers.value[a].product_provider_price;
                form.value.product_provider_admin_fee= product_providers.value[a].product_provider_admin_fee;
                form.value.product_provider_merchant_fee= product_providers.value[a].product_provider_merchant_fee;
                form.value.product_price= product_providers.value[a].product_provider_price;
              }
            };
          }
          const getProductProvider=(idProvider)=>{
            nextTick(()=>{
                // Create new role
               axios.post('{{ route('product_providers.getAll') }}',{
                'provider_id':idProvider,
               },{
                headers: {
                  'Content-Type': 'application/json',
                  'Authorization': 'Bearer token-123',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
               })
                  .then(response => {
                    product_providers.value=response.data.data;
                  })
                  .catch(error => {
                    console.error("Error creating role:", error);
                    product_providers.value=[];
                  });
            })
          };
          const storeSegmentProduct=()=>{
            for(let a=0;a<providers.value.length;a++){
              if (providers.value[a].id==form.value.provider_id){
                form.value.provider_name= providers.value[a].provider_name;
              }
            };
            for(let a=0;a<product_types.value.length;a++){
              if (product_types.value[a].id==form.value.product_type_id){
                form.value.product_type_name= product_types.value[a].product_type_name;
              }
            };
            for(let a=0;a<segments.value.length;a++){
              if (segments.value[a].id==form.value.segment_id){
                form.value.segment_name= segments.value[a].segment_name;
              }
            };
            for(let a=0;a<products.value.length;a++){
              if (products.value[a].id==form.value.product_id){
                form.value.product_name= products.value[a].product_name;
                form.value.product_code= products.value[a].product_code;
                form.value.product_reference_id= products.value[a].product_reference_id;
                form.value.product_reference_code= products.value[a].product_reference_code;
                form.value.product_reference_name= products.value[a].product_reference_name;
                form.value.product_category_id= products.value[a].product_category_id;
                form.value.product_category_name= products.value[a].product_category_name;
              }
            };
           
            nextTick(()=>{
                // Create new role
               axios.post('{{ route('product_segments.store') }}', form.value)
                  .then(response => {
                    isEditMode.value = false;
                    closeModal();
                    refreshData();
                  })
                  .catch(error => {
                    console.error("Error creating role:", error);
                  });
            })
          };
          const updateSegmentProduct=()=>{
            for(let a=0;a<providers.value.length;a++){
              if (providers.value[a].id==form.value.client_id){
                form.value.provider_name= providers.value[a].provider_name;
              }
            };
            for(let a=0;a<product_types.value.length;a++){
              if (product_types.value[a].id==form.value.client_id){
                form.value.product_type_name= product_types.value[a].product_type_name;
              }
            };
            for(let a=0;a<segments.value.length;a++){
              if (segments.value[a].id==form.value.client_id){
                form.value.segment_name= segments.value[a].segment_name;
              }
            };
            nextTick(()=>{
                axios.post('{{ route('product_segments.update') }}', form.value)
                  .then(response => {
                    isEditMode.value = false;
                    closeModal();
                    refreshData();
                  })
                  .catch(error => {
                    console.error("Error updating role:", error);
                  });
            });
          };
          onMounted(() => {
            myModal = new bootstrap.Modal(document.getElementById('exampleModal'), options);
            refreshData();
          });
          return { 
            refreshData,
            isModalOpen,
            openModal,
            closeModal,
            updateModal,
            form,
            updateSegmentProduct,
            storeSegmentProduct,
            isEditMode,
            getProductProvider,
            segments,
            product_providers,
            product_types,
            products,
            providers,
            setProductProviderData,
          };
        }
      }).mount('#app');
    </script>
  @endpush
</x-app-layout>

