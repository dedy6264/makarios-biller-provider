 <div class="modal fade" id="modalConfirm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <div class="row">
                <div class="col-2" >
                <img src="{{ asset('assets/img/icons/success.gif') }}" alt="" style="max-width: 100%;" v-if="formInquiry.status_code == '00'">
                <img src="{{ asset('assets/img/icons/pending.gif') }}" alt="" style="max-width: 100%;" v-if="formInquiry.status_code == '02'">
                <img src="{{ asset('assets/img/icons/failed.gif') }}" alt="" style="max-width: 100%;" v-else>
                </div>
                <div class="col-10">
                    <h5 class="modal-title" id="exampleModalLabel" v-if="formInquiry.status_code == '00'">Transaksi Sukses</h5>
                    <h5 class="modal-title" id="exampleModalLabel" v-if="formInquiry.status_code == '02'">Transaksi Sedang Diproses</h5>
                    <h5 class="modal-title" id="exampleModalLabel" v-else>Transaksi Gagal</h5>
                </div>
            </div>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <form role="form text-left">
              <div class="row">
                <div class="pt-1 pb-2 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Date Time</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">02 Feb 2025 | 09:08:00 WIB</p>
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
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Nominal</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">100.000</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-left col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Nominal</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
                <div class="pt-1 pb-2 text-right col-lg-6 col-12">
                   <div class="pt-1 numbers">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">100.000</p>
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
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Rp 15.500,00</p>
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
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">Rp 2.500,00</p>
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
                    <p class="mb-0 text-gradient text-primary text-capitalize font-weight-bold">Rp 18.000,00</p>
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