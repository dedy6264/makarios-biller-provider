
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
                  <h6 class="mb-0">Providers</h6>
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
                  <h6>Providers</h6>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Providers Name</th>
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
          <h5 class="modal-title" id="exampleModalLabel">@{{ isEditMode ? 'Edit Provider' : 'Add Provider' }}</h5>
        </div>
        <div class="modal-body">
          {{-- ......................... --}}
                  <div class="card-body">
                    <form role="form text-left">
                      {{-- <div class="row"> --}}
                        {{-- <div class="col-lg-6"> --}}
                          <div class="mb-3">
                            <label for="provider_name" class="form-label">Provider Name</label>
                            <input type="text" v-model="form.provider_name" class="form-control" id="provider_name" placeholder="Provider Name" aria-label="Provider Name" aria-describedby="email-addon" autofocus>
                          </div>
                        {{-- </div> --}}
                      {{-- </div> --}}
                    </form>
                  </div>
          {{-- ......................... --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
          <button type="button" class="btn btn-primary" @click="isEditMode ? updateProvider() : storeProvider()">Save changes</button>
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
      const { createApp,onMounted, ref,nextTick } = Vue;
      createApp({
        setup() {
          const isModalOpen = ref(true);
          const isEditMode = ref(false);
          const mainData=ref({});
          let myModal = null;
          const form = ref({
            id: null,
            provider_name: '',
          });
          const openModal = () => {
            myModal.show();
            console.log(isEditMode.value)
          };
          const closeModal = () => {
            form.value.id = 0;
            form.value.provider_name = "";
            myModal.hide();
            isEditMode.value = false;
          };
          const refreshDataProvider = () => {
            const table = $('#tabeldata').DataTable();
            table.destroy();
            nextTick(() => {
              // if ($.fn.DataTable) {
                $('#tabeldata').DataTable({
                    ajax: {
                      url: '{{ route('providers.getAll') }}',
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
                            <button class="btn btn-sm btn-outline-primary" onclick="deleteProductType(${data})">
                                Delete
                            </button>`} },
                        { data: 'provider_name' },
                        { data: 'updated_at' },
                        { data: 'created_at' }
                    ]
                });
              // }
            });
          };
          window.updateModal = (idProvider) => {
              for(let a=0;a<mainData.value.length;a++){
                if (mainData.value[a].id==idProvider){
                  form.value.id = idProvider;
                  form.value.provider_name = mainData.value[a].provider_name;
                  isEditMode.value = true;
                  myModal.show();
                }
              };
          };
          window.deleteProductType = (idProvider) => {
            console.log("Delete Category with ID:", idProvider);
            nextTick(()=>{
                // Create new Category
               axios.post('{{ route('providers.destroy') }}', { id: idProvider })
                  .then(response => {
                    refreshDataProvider();
                  })
                  .catch(error => {
                    console.error("Error creating Category:", error);
                  });
            })
          };
          const storeProvider=()=>{
            nextTick(()=>{
                // Create new Category
               axios.post('{{ route('providers.store') }}', form.value)
                  .then(response => {
                    // console.log("ProductType created:", response.data);
                    isEditMode.value = false;
                    closeModal();
                    refreshDataProvider();
                  })
                  .catch(error => {
                    console.error("Error creating Category:", error);
                    alert("Maaf, Anda tidak memiliki izin untuk melihat data ini.");

                  });
            })
          };
          const updateProvider=()=>{
            nextTick(()=>{
                // Update existing Category
                axios.post('{{ route('providers.update') }}', form.value)
                  .then(response => {
                    isEditMode.value = false;
                    closeModal();
                    refreshDataProvider();
                  })
                  .catch(error => {
                    console.error("Error updating Category:", error);
                    alert("Maaf, Anda tidak memiliki izin untuk melihat data ini.");

                  });
            });
          };
          onMounted(() => {
            myModal = new bootstrap.Modal(document.getElementById('exampleModal'), options);
            refreshDataProvider();
          });
          return { 
            mainData,
            refreshDataProvider,
            isModalOpen,
            openModal,
            closeModal,
            updateModal,
            form,
            updateProvider,
            storeProvider,
            isEditMode,
          };
        }
      }).mount('#app');
    </script>
  @endpush
</x-app-layout>

