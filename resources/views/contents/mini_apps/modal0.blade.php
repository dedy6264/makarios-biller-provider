 <div class="modal fade" id="modalPulsaPrabayar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pulsa Prabayar</h5>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <form role="form text-left">
              <div class="mb-3">
                {{-- <label for="client_name" class="form-label">Client Name</label> --}}
                <input type="text" v-model="formInquiry.product_code" class="form-control" id="product_code" placeholder="No HP 08xxxxxx......" aria-label="Client Name" aria-describedby="email-addon" autofocus>
              </div>
              <div class="row">
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-mobile-button opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">5000</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-center col-lg-2 col-4">
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                    <i class="text-lg ni ni-mobile-button opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">10.000</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
          <button type="button" class="btn btn-primary" @click="storeClient">Save changes</button>
        </div>
      </div>
    </div>
  </div>