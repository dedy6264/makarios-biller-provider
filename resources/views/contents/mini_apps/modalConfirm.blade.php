 <div class="modal fade" id="modalConfirm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <div class="row">
                <div class="col-2" >
                <img v-if="icon.png" :src="icon.png" alt="" style="max-width: 100%;" >
                </div>
                <div class="col-10">
                    <h5 class="modal-title" id="exampleModalLabel" v-if="icon.desc">@{{ icon.desc}}</h5>
                </div>
            </div>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <form role="form text-left">
              <div class="row">
                <div class="pt-1 pb-2 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Date</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">@{{ formatTanggal(formInquiry.date_time) }}</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                 <div class="pt-1 pb-2 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Produk</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Pulsa Telkomsel 5k</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">ID Customer</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">@{{ formInquiry.customer_id}}</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Harga</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Rp @{{ formInquiry.product_price}}</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Biaya Admin</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Rp @{{ formInquiry.admin_fee}}</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-gradient text-primary text-capitalize font-weight-bold">Total</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-gradient text-primary text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-gradient text-primary text-capitalize font-weight-bold">Rp @{{ formInquiry.total}}</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-gradient text-primary text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
          {{-- <button type="button" class="btn btn-primary" @click="payment">Bayar</button> --}}
        </div>
      </div>
    </div>
  </div>