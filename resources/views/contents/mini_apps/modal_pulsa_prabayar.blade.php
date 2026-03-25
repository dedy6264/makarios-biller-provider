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
                <input type="text" v-model="formInquiry.customer_id" class="form-control"  placeholder="No HP 08xxxxxx......" aria-label="Client Name" aria-describedby="email-addon" autofocus>
              </div>
              <div class="row" v-if="mainData">
                <div class="pt-3 pb-4 text-center col-lg-2 col-4" v-for='item in mainData '>
                  <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md" @click="funcInputFormInquiry(item.id)" style="cursor: pointer">
                    <i class="text-lg ni ni-mobile-button opacity-10" aria-hidden="true"></i>
                  </div>
                   <div class="pt-1 numbers" @click="funcInputFormInquiry(item.id)" style="cursor: pointer">
                    <p class="mb-0 text-sm text-capitalize font-weight-bold">@{{ item.product_name}}</p>
                    {{-- <h5 class="mb-0 font-weight-bolder"> $53,000 <span class="text-sm text-success font-weight-bolder">+55%</span></h5> --}}
                  </div>
                </div>
              </div>
              <div v-else>
                <h5 class="modal-title" id="exampleModalLabel">silahkan masukkan nomer hpmu</h5>
              </div>
            </form>
          </div>
        </div>
        <p>@{{ isEditMode }}</p>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" :disabled=!isActiveButton @click="closeModal">anjing </button>
          {{-- <button type="button" class="btn btn-primary" @click="inquiry">Lanjutkan</button> --}}
        </div>
      </div>
    </div>
  </div>