
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
                  <h6 class="mb-0">Merchants</h6>
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
            <div class="pb-0 card-header">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Merchants</h6>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merchant Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Group Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Segment Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">M Key</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">First Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Name</th>
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
          <h5 class="modal-title" id="exampleModalLabel">@{{ isEditMode ? 'Edit Merchant' : 'Add Merchant' }}</h5>
        </div>
        <div class="modal-body">
          {{-- ......................... --}}
                  <div class="card-body">
                    <form role="form text-left">
                      {{-- <div class="row"> --}}
                        {{-- <div class="col-lg-6"> --}}
                          <div class="mb-3" >
                            <label for="client_id" class="form-label">Client</label>
                            <select name="client_id" id="client_id" v-model="form.client_id" class="form-select">
                              <option value="" disabled>Select Client</option>
                              <option v-for="client in clients" :key="client.id" :value="client.id">
                                @{{ client.client_name }}
                              </option>
                            </select>
                          </div>
                          <div class="mb-3" >
                            <label for="group_id" class="form-label">Group</label>
                            <select name="group_id" id="group_id" v-model="form.group_id" class="form-select">
                              <option value="" disabled>Select Group</option>
                              <option v-for="group in groups" :key="group.id" :value="group.id">
                                @{{ group.group_name }}
                              </option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="merchant_name" class="form-label">Merchant Name</label>
                            <input type="text" v-model="form.merchant_name" class="form-control" id="merchant_name" placeholder="Merchant Name" aria-label="Merchant Name" aria-describedby="email-addon">
                          </div>
                          <div class="mb-3" >
                            <label for="segment_id" class="form-label">Segment</label>
                            <select name="segment_id" id="segment_id" v-model="form.segment_id" class="form-select">
                              <option value="" disabled>Select Segment</option>
                              <option v-for="segment in segments" :key="segment.id" :value="segment.id">
                                @{{ segment.segment_name }}
                              </option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="first_name" class="form-label">Firs Name</label>
                            <input type="text" v-model="form.first_name" class="form-control" id="first_name" placeholder="Firs Name" aria-label="Firs Name" aria-describedby="email-addon">
                          </div>
                          <div class="mb-3">
                            <label for="last_name" class="form-label">Firs Name</label>
                            <input type="text" v-model="form.last_name" class="form-control" id="last_name" placeholder="Firs Name" aria-label="Firs Name" aria-describedby="email-addon">
                          </div>
                        {{-- </div> --}}
                      {{-- </div> --}}
                    </form>
                  </div>
          {{-- ......................... --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
          <button type="button" class="btn btn-primary" @click="isEditMode ? updateMerchant() : storeMerchant()">Save changes</button>
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
          const clients = ref(@json($clients));
          const segments = ref(@json($segments));
          const groups = ref([]);
          const isModalOpen = ref(true);
          const isEditMode = ref(false);
          const mainData=ref({});
          let myModal = null;
          const form = ref({
            id: 0,
            merchant_name: '',
            client_id: 0,
            group_id: 0,
            client_name: '',
            group_name: '',
            first_name: '',
            last_name: '',
            segment_name: '',
            segment_id: 0,
          });
          const openModal = () => {
            myModal.show();
            console.log(isEditMode.value)
          };
          const closeModal = () => {
            form.value.id = 0;
            form.value.client_id= 0;
            form.value.group_id= 0;
            form.value.client_name= '';
            form.value.group_name= '';
            form.value.first_name= '';
            form.value.last_name= '';
            form.value.segment_name= '';
            form.value.merchant_name= '';
            form.value.segment_id= 0;
            myModal.hide();
            isEditMode.value = false;
          };
          watch(() => form.value.client_id, (newCode) => { 
              console.log("User sedang mengetik kode role baru:", newCode);
              getGroup(newCode);
          });
          const getGroup=(idClient)=>{
            nextTick(()=>{
                // Create new role
               axios.post('{{ route('groups.getAll') }}',{
                'client_id':idClient,
               },{
                headers: {
                  'Content-Type': 'application/json',
                  'Authorization': 'Bearer token-123',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
               })
                  .then(response => {
                    groups.value=response.data.data;
                  })
                  .catch(error => {
                    console.error("Error creating role:", error);
                    groups.value=[];
                  });
            })
          }
          const refreshData = () => {
            const table = $('#tabeldata').DataTable();
            table.destroy();
            nextTick(() => {
              // if ($.fn.DataTable) {
                $('#tabeldata').DataTable({
                    ajax: {
                      url: '{{ route('merchants.getAll') }}',
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
                        { data: 'id',render:function(data,type){
                         return `
                            <button class="btn btn-sm btn-outline-success" onclick="updateModal(${data})">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-outline-primary" onclick="deleteMerchant(${data})">
                                Delete
                            </button>`} },
                        { data: 'merchant_name' },
                        { data: 'group_name' },
                        { data: 'client_name' },
                        { data: 'segment_name' },
                        { data: 'm_key' },
                        { data: 'first_name' },
                        { data: 'last_name' },
                        { data: 'updated_at' },
                        { data: 'created_at' }
                    ]
                });
              // }
            });
          };
          window.updateModal = (idMerchant) => {
              for(let a=0;a<mainData.value.length;a++){
                if (mainData.value[a].id==idMerchant){
                  form.value.id = idMerchant;
                  form.value.client_name = mainData.value[a].client_name;
                  form.value.group_name = mainData.value[a].group_name;
                  form.value.client_id= mainData.value[a].client_id;
                  form.value.group_id= mainData.value[a].group_id;
                  form.value.merchant_name= mainData.value[a].merchant_name;
                  form.value.segment_name= mainData.value[a].segment_name;
                  form.value.segment_id= mainData.value[a].segment_id;
                  form.value.first_name= mainData.value[a].first_name;
                  form.value.last_name= mainData.value[a].last_name;
                  isEditMode.value = true;
                  myModal.show();
                }
              };
          };
          window.deleteMerchant = (idMerchant) => {
            console.log("Delete role with ID:", idMerchant);
            nextTick(()=>{
                // Create new role
               axios.post('{{ route('merchants.destroy') }}', { id: idMerchant })
                  .then(response => {
                    refreshData();
                  })
                  .catch(error => {
                    console.error("Error creating role:", error);
                  });
            })
          };
          const storeMerchant=()=>{
            for(let a=0;a<clients.value.length;a++){
              if (clients.value[a].id==form.value.client_id){
                form.value.client_name= clients.value[a].client_name;
              }
            };
            for(let a=0;a<groups.value.length;a++){
              if (groups.value[a].id==form.value.group_id){
                form.value.group_name= groups.value[a].group_name;
              }
            };
            for(let a=0;a<segments.value.length;a++){
              if (segments.value[a].id==form.value.segment_id){
                form.value.segment_name= segments.value[a].segment_name;
              }
            };
            nextTick(()=>{
                // Create new role
               axios.post('{{ route('merchants.store') }}', form.value)
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
          const updateMerchant=()=>{
             for(let a=0;a<clients.value.length;a++){
              if (clients.value[a].id==form.value.client_id){
                form.value.client_name= clients.value[a].client_name;
              }
            };
            for(let a=0;a<groups.value.length;a++){
              if (groups.value[a].id==form.value.group_id){
                form.value.group_name= groups.value[a].group_name;
              }
            };
             for(let a=0;a<segments.value.length;a++){
              if (segments.value[a].id==form.value.segment_id){
                form.value.segment_name= segments.value[a].segment_name;
              }
            };
            nextTick(()=>{
                axios.post('{{ route('merchants.update') }}', form.value)
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
            refreshData,isModalOpen,getGroup,
            openModal,groups,watch,
            closeModal,updateModal,form,updateMerchant,storeMerchant,isEditMode,clients,segments,
          };
        }
      }).mount('#app');
    </script>
  @endpush
</x-app-layout>

