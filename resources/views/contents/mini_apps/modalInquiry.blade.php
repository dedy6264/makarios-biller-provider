 <div class="modal fade" id="modalInquiry" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pulsa Telkomsel 5.000</h5>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <form role="form text-left">
              <div class="row">
                <div class="pt-3 pb-4 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">ID Customer</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">089678971119</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Harga</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Rp 15.500,00</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Biaya Admin</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Rp 2.500,00</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-gradient text-primary text-capitalize font-weight-bold">Total</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-gradient text-primary text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-right col-lg-6 col-12">
                  <div class="pt-1 numbers">
                    <p class="mb-0 text-gradient text-primary text-capitalize font-weight-bold">Rp 18.000,00</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-gradient text-primary text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-3 pb-4 text-right col-lg-6 col-12">
                  <div class="mb-3">
                    {{-- <label for="client_name" class="form-label">Client Name</label> --}}
                    <input type="password"  class="form-control" id="pin" placeholder="PIN 12xx.." aria-label="Client Name" aria-describedby="email-addon" autofocus>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="backModal">Cancel</button>
          <button type="button" class="btn btn-primary" @click="payment">Bayar</button>
        </div>
      </div>
    </div>
  </div>