<!DOCTYPE html>

<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Viller - Modern FinTech Dashboard</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                "on-background": "#181c20",
                "on-surface": "#181c20",
                "on-error-container": "#93000a",
                "on-tertiary-fixed": "#3c0800",
                "tertiary-fixed": "#ffdbd2",
                "primary-fixed": "#dde1ff",
                "surface-tint": "#004ced",
                "tertiary-container": "#bf3003",
                "error-container": "#ffdad6",
                "on-tertiary-container": "#ffddd5",
                "surface-container-highest": "#e0e2e7",
                "tertiary": "#952200",
                "background": "#f7f9fe",
                "surface-container": "#eceef3",
                "primary-container": "#0052ff",
                "surface-container-low": "#f1f4f9",
                "on-secondary": "#ffffff",
                "primary-fixed-dim": "#b7c4ff",
                "on-surface-variant": "#434656",
                "outline": "#737688",
                "on-primary-fixed-variant": "#0038b6",
                "inverse-on-surface": "#eff1f6",
                "secondary-container": "#95aafe",
                "on-primary-container": "#dfe3ff",
                "on-primary-fixed": "#001452",
                "on-secondary-fixed": "#001452",
                "inverse-primary": "#b7c4ff",
                "secondary": "#4459a8",
                "on-secondary-fixed-variant": "#2b418f",
                "on-tertiary-fixed-variant": "#891e00",
                "surface-container-lowest": "#ffffff",
                "surface-container-high": "#e6e8ed",
                "surface-variant": "#e0e2e7",
                "on-error": "#ffffff",
                "secondary-fixed-dim": "#b7c4ff",
                "on-primary": "#ffffff",
                "inverse-surface": "#2d3135",
                "surface-bright": "#f7f9fe",
                "surface": "#f7f9fe",
                "surface-dim": "#d8dadf",
                "primary": "#003ec7",
                "secondary-fixed": "#dde1ff",
                "error": "#ba1a1a",
                "on-secondary-container": "#253b89",
                "outline-variant": "#c3c5d9",
                "on-tertiary": "#ffffff",
                "tertiary-fixed-dim": "#ffb4a1"
            },
            "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            "fontFamily": {
                "headline": ["Manrope"],
                "body": ["Inter"],
                "label": ["Inter"]
            }
            
          },
        },
      }
  </script>
  <style>
    .receipt-cut {
      clip-path: polygon(0% 0%, 100% 0%, 100% 98%, 95% 100%, 90% 98%, 85% 100%, 80% 98%, 75% 100%, 70% 98%, 65% 100%, 60% 98%, 55% 100%, 50% 98%, 45% 100%, 40% 98%, 35% 100%, 30% 98%, 25% 100%, 20% 98%, 15% 100%, 10% 98%, 5% 100%, 0% 98%);
    }
  </style>
  <script src="{{ url('assets/css/web-apps/web-apps.css') }}" type="text/css"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> --}}
  <script src="/assets/js/utils.js"></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</head>

<body
  class=" bg-background text-on-background font-body selection:bg-primary-container selection:text-on-primary-container">
  <!-- TopAppBar -->
  <div id="app">
    <header class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-xl shadow-[0px_12px_32px_rgba(0,62,199,0.06)]">
      <div class="flex items-center justify-between px-6 py-4 mx-auto max-w-7xl">
        <div class="flex items-center gap-4">
          <div class="p-2 transition-colors duration-200 active:scale-95 rounded-xl hover:bg-slate-50">
            <span class="text-2xl material-symbols-outlined text-primary">menu</span>
          </div>
          <h1
            class="text-2xl font-black text-transparent font-headline bg-gradient-to-br from-blue-700 to-blue-500 bg-clip-text">
            Viller</h1>
        </div>
        <div class="flex items-center gap-3">
          <span class="material-symbols-outlined text-slate-500">notifications</span>
          <div class="w-10 h-10 overflow-hidden border-2 rounded-full bg-slate-100 border-primary-container">
            <img alt="User Profile" class="object-cover w-full h-full"
              data-alt="portrait of a professional young man with a friendly expression in a clean studio setting with soft lighting"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuCR_ApCHKM4UIVV-R5NqCnqcn0-0nh7EzfrTMCX-8s9quc08uAsV3p4De8RoBDS8bz7lSb9ZhXJspwIgTmesGhkIeuja-IGUolL47TvSrSb8eVPr77HiDw6qaSSQgjEgbavC4BZgwTXXKfJG6ZvJ9AE6KUwfPXukaLKEJvCme-ugvhUKXZVrIl0pW71ybceBOYUHIhxr7_CkI5Fbvg5bArHYYQf3M7mCKgO1aMV5jAc733mV5lflfVuOepHoKwImo3Gou89wHYOuJwz" />
          </div>
        </div>
      </div>
    </header>
    {{-- modal home --}}
    @include('contents.msa.navModals.msaHome')
    @include('contents.msa.navModals.msaTransactions')
    @include('contents.msa.navModals.msaProfile')
    @include('contents.msa.modals.product')
    {{-- end modal home --}}
    <!-- BottomNavBar -->
    <nav
      class="fixed bottom-0 left-0 w-full bg-white/70 backdrop-blur-xl z-50 rounded-t-3xl shadow-[0px_-8px_24px_rgba(0,62,199,0.04)]">
      <div class="flex items-center justify-around px-4 pt-3 pb-6">
        <!-- Home (Active) bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 rounded-2xl text-blue-700-->
        <a @click="msaHome"
          class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 active:scale-90"
          :class="{
     'text-blue-700 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 rounded-2xl': modalMsaHome,
     'text-slate-400 dark:text-slate-500 hover:text-blue-500': !modalMsaHome
   }" href="#">
          <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
          <span class="font-inter text-[8px] font-semibold uppercase tracking-wider mt-1">Home</span>
        </a>
        <!-- Transaction -->
        <a @click="msaTransactions"
          class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 active:scale-90"
          :class="{
     'text-blue-700 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 rounded-2xl': modalMsaTransactions,
     'text-slate-400 dark:text-slate-500 hover:text-blue-500': !modalMsaTransactions
   }" href="#">
          <span class="material-symbols-outlined">history_edu</span>
          <span class="font-inter text-[8px] font-semibold uppercase tracking-wider mt-1">Transaction</span>
        </a>
        <!-- Product -->
        <a class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 text-slate-400 dark:text-slate-500 hover:text-blue-500 active:scale-90"
          href="#">
          <span class="material-symbols-outlined">grid_view</span>
          <span class="font-inter text-[8px] font-semibold uppercase tracking-wider mt-1">Product</span>
        </a>
        <!-- Profile -->
        {{-- <a
          class="flex flex-col items-center justify-center px-5 py-2 text-blue-700 transition-transform duration-200 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 rounded-2xl active:scale-90"
          --}} <a @click="msaProfile"
          class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 active:scale-90"
          :class="{
     'text-blue-700 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 rounded-2xl': modalMsaProfile,
     'text-slate-400 dark:text-slate-500 hover:text-blue-500': !modalMsaProfile
   }" href="#">
          <span class="material-symbols-outlined">person</span>
          <span class="font-inter text-[8px] font-semibold uppercase tracking-wider mt-1">Profile</span>
        </a>
      </div>
    </nav>
    @include('contents.msa.modals.receipt')
    @include('contents.msa.modals.setPin')
    @include('contents.msa.modals.inquiry')
    @include('contents.msa.modals.pinpad')

  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    const { createApp,onMounted, ref,nextTick, watch } = Vue;
      const app = createApp({
        setup() {
          const isModalInquiry = ref(false);//modal page inquiry
          const isSharing = ref(false);//disable button share saat proses sharing atau download struk
          const modalProductDetail = ref(false);//modal page input cust id produk pulsa
          //global constant
          const customerId=ref('');//variable penampung input cust id
          const modalMsaHome = ref(false);//modal navigasi Home
          const modalMsaProfile = ref(false);//modal navigasi profil
          const modalMsaTransactions = ref(false);//modal navigasi transaksi
          const modalReceipt=ref(false);//modal page transaksi
          const isLoadingBalance=ref(true);//gif loading balance
          const isLoadingTransactions=ref(true);//gif loading get transaksi
          const modalSetPin=ref(false);//modal page set pin
          //end boolean variable
          const dataBalance=ref(0);//variable penampung balance
          //end int variable
          const dataProducts=ref({});//variable penampung data produk detil
          const dataTransactions=ref({});//variable penampung data lis transaksi
          const dataProfile=ref({});//variable penampung data lis transaksi
          const dataTransaction=ref({});//variable penampung data detil transaksi untuk tampil di receipt
          //end interface variable
          const token=localStorage.getItem('token');
          const navigate=localStorage.getItem('navigate');
          //end constant
          const getBalance=async()=>{//proses get balance
            isLoadingBalance.value=true;
            try {
              const response = await axios.get('{{ route('msa.getBalance') }}', {
                  headers: {
                      Authorization: `Bearer ${token}`,
                  }
              });
              dataBalance.value=response.data.result.account_balance;
              if(response.data.result.is_set_pin=="N"){
              localStorage.setItem('isSetPin', 'N');
                setTimeout(() => {
                  modalSetPin.value=true;
                }, 2000);
              }
              setTimeout(() => {
                isLoadingBalance.value=false;
              }, 1000);
            } catch (error) {
                console.error("Gagal mengambil saldo:", error.response?.data || error.message);
                // Handle error (misal: redirect ke login jika token expired)
                if (error.response?.status === 401) {
                    closeSession();
                }
            }
          };
          const isLoadingProfile=ref(false);
          const getProfile=async()=>{//proses get detil profile
            try {
              const response = await axios.get('{{ route('msa.getProfile') }}',{
                headers: {
                  Authorization: `Bearer ${token}`,
                }
              });
              if(response.data.result.data.length>0){
                dataProfile.value=response.data.result.data[0];
                setTimeout(() => {
                  isLoadingProfile.value=false;
                }, 1000);
              }
               if(dataBalance.value==0){
                getBalance();
              }
            } catch (error) {
                console.error("Gagal mengambil saldo:", error.response?.data || error.message);
                if (error.response?.status === 401) {
                    closeSession();
                }
            }
          };
          const getTransactions=async(val)=>{//proses get list transaction
            try {
              const response = await axios.post('{{ route('msa.getTransactions') }}', {
                'length':parseInt(val, 10),
              },{
                  headers: {
                      Authorization: `Bearer ${token}`,
                  }
              });
              dataTransactions.value=response.data.result.data;
              setTimeout(() => {
                isLoadingTransactions.value=false;
              }, 1000);
            } catch (error) {
                console.error("Gagal mengambil saldo:", error.response?.data || error.message);
                if (error.response?.status === 401) {
                    closeSession();
                }
            }
          };
          //end api
          const getDetailTransaction=(val)=>{//proses get detail transaksi dari list transaksi
            const foundData = dataTransactions.value.find(item => item.reference_number == val);
            if (foundData) {
                dataTransaction.value = foundData;
            } else {
                console.log("Data tidak ditemukan");
            }
            if(dataTransaction.value.status_code!='02'){      
              modalReceipt.value=true;
            }
          };
          const closeModals = () => {//menutup modal receipt n set pin
              modalReceipt.value = false;
              modalSetPin.value=false;
          };
          const closeSession=()=>{//proses logout
            localStorage.removeItem('token');
            if(localStorage.getItem('isSetPin')){
              localStorage.removeItem('isSetPin');
            }
            window.location.href = '/msa/sign-in';
          }
          const shareAsImage = () => {//proses share atau download receipt
            isSharing.value=true;
            const element = document.querySelector(".receipt-cut"); // Target elemen struk
            // Gunakan html2canvas global
            html2canvas(element, {
                backgroundColor: null, // Agar background transparan jika perlu
                scale: 2, // Meningkatkan resolusi gambar agar tidak pecah
                useCORS: true // Penting jika ada gambar dari domain luar
            }).then(canvas => {
                canvas.toBlob(blob => {
                    const file = new File([blob], "struk-pembayaran.png", { type: "image/png" });

                    // Cek apakah browser mendukung fitur Share File (biasanya di HP)
                    if (navigator.canShare && navigator.canShare({ files: [file] })) {
                        navigator.share({
                            files: [file],
                            title: 'Struk Pembayaran',
                            text: 'Bukti transaksi Viller Digital',
                        }).catch(err => console.error("Share gagal", err));
                    } else {
                        // Fallback: Jika di desktop, otomatis download gambar
                        const link = document.createElement("a");
                        link.href = canvas.toDataURL("image/png");
                        link.download = "struk-viller.png";
                        link.click();
                    }
                });
            });
            setTimeout(() => {
                  isSharing.value=false;
                }, 1000);
          };
          const msaHome=()=>{//proses navigasi ke home
            localStorage.setItem('navigate', 'msaHome');
            modalMsaHome.value = true;
            isModalInquiry.value=false;
            isSharing.value=false;
            modalProductDetail.value=false;
            modalMsaProfile.value=false;
            modalMsaTransactions.value=false;
            modalReceipt.value=false;
            isLoadingBalance.value=false;
            isLoadingTransactions.value=false;
            modalSetPin.value=false;
            getBalance();
            getTransactions(5);
          }
          const msaTransactions=()=>{//proses navigasi ke transaksi
            localStorage.setItem('navigate', 'msaTransactions');
            modalMsaTransactions.value = true;
            isModalInquiry.value=false;
            isSharing.value=false;
            modalProductDetail.value=false;
            modalMsaHome.value=false;
            modalMsaProfile.value=false;
            modalReceipt.value=false;
            isLoadingBalance.value=false;
            isLoadingTransactions.value=false;
            modalSetPin.value=false;
            getTransactions(10);
          }
          const msaProfile=()=>{//proses navigasi ke profil
            localStorage.setItem('navigate', 'msaProfile');
            modalMsaProfile.value = true;
            isModalInquiry.value=false;
            isSharing.value=false;
            modalProductDetail.value=false;
            modalMsaHome.value=false;
            modalMsaTransactions.value=false;
            modalReceipt.value=false;
            isLoadingBalance.value=false;
            isLoadingTransactions.value=false;
            modalSetPin.value=false;
            getProfile();
          } 
          const productDetail=(val)=>{//proses membuka list detil produk
            switch (val) {
              case "pulsa":
                closeMsaModals();
                modalProductDetail.value="true";
                break;
            
              default:
                break;
            }
          };
          const closeMsaModals=()=>{//proses menutup page home saat membuka list produk detil
            modalProductDetail.value=false;
            modalMsaHome.value=false;
            modalMsaProfile.value=false;
            modalMsaTransactions.value=false;
            modalReceipt.value=false;
            modalSetPin.value=false;
          };
          const getProductPrefix=async(val)=>{//get produk sesuai dengan operator by input cust id
            try {
              const response = await axios.post('{{ route('msa.getProductPrefix') }}', {
                'customerId':val,
              },{
                  headers: {
                      Authorization: `Bearer ${token}`,
                  }
              });
              dataProducts.value=response.data.result.data;
            } catch (error) {
                console.error("Gagal mengambil product:", error.response?.data || error.message);
                if (error.response?.status === 401) {
                    closeSession();
                }
            }
          };
          const dataInquiry=ref({});//menampung data response inquiry
          const isConfirm=()=>{//menampilkan modal page input pin sebelum proses payment
            isModalInquiry.value=false;
            isModalPin.value=true;
          }
          const isWrongPin=ref(false);//status salah pin
          const payment=async(val)=>{//proses payment, masih ada pr jika pin salah
            try {
              const response = await axios.post('{{ route('msa.payment') }}', {
                'reference_number':dataInquiry.value.reference_number,
                'pin':val,
              },{
                  headers: {
                      Authorization: `Bearer ${token}`,
                  }
              });
              if(response.data.responseCode=='44'){
                isWrongPin.value=true;
              }else{
                dataTransaction.value=response.data.result;
                isModalPin.value=false;
                msaTransactions();
                dataProducts.value=({}) ;
                setTimeout(() => {
                  modalReceipt.value=true;
                  customerId.value='';
                  pin.value='';
                }, 500);
              }
              isWrongPin.value=false;
            } catch (error) {
                console.error("Gagal inquiry:", error.response?.data || error.message);
                if (error.response?.status === 401) {
                    closeSession();
                }
            }
          };
          const inquiry=async(val)=>{//proses inquiry
            if(localStorage.getItem('isSetPin')){
              console.log("BLM SI DER", localStorage.getItem('isSetPin'));
              modalSetPin.value=true;
            }else{
              try {
                const response = await axios.post('{{ route('msa.inquiry') }}', {
                  'product_code':val,
                  'customer_id':customerId.value,
                },{
                    headers: {
                        Authorization: `Bearer ${token}`,
                    }
                });
                dataInquiry.value=response.data.result;
                setTimeout(() => {
                  modalProductDetail.value=false;
                  isModalInquiry.value=true;
                }, 500);
                // formPayment.value.reference_number=dataInquiry.value.reference_number;
              } catch (error) {
                  console.error("Gagal inquiry:", error.response?.data || error.message);
                  if (error.response?.status === 401) {
                      closeSession();
                  }
              }
            }
          };
          const isModalPin=ref(false);//modal page input pin
          const pin = ref(""); // menampung PIN yang diinput
          const pinLimit = 6;//var validasi max 6 karakter

          // Fungsi untuk menambah angka
          const addNumber = (num) => {
              if (pin.value.length < pinLimit) {
                  pin.value += num.toString();
              }
          };
          // Fungsi hapus (backspace)
          const deleteNumber = () => {
              pin.value = pin.value.slice(0, -1);
          };
          // Fungsi Konfirmasi
          const confirmPin = () => {
              if (pin.value.length === pinLimit) {
                  console.log("PIN yang dimasukkan:", pin.value);
                  payment(pin.value);
              } else {
                  alert("PIN harus 6 digit");
              }
          };
          const isSetPinAllert=ref(false);
          const setPin=async()=>{
             try {
              const response = await axios.post('{{ route('msa.setPin') }}', {
                'pin':pin.value,
              },{
                  headers: {
                      Authorization: `Bearer ${token}`,
                  }
              });
              isSetPinAllert.value=true;
              setTimeout(() => {
                modalSetPin.value=false;
                pin.value='';
                isSetPinAllert.value=false;
                msaHome();
              }, 1000);
            } catch (error) {
                console.error("Gagal inquiry:", error.response?.data || error.message);
                if (error.response?.status === 401) {
                    closeSession();
                }
            }
          };
          const resetModal=(isActive)=>{
          }
          const navigateTo=()=>{//cek session to redirect navigate
            switch (navigate) {
              case 'msaProfile':
                msaProfile();
                break;
              case 'msaTransactions':
                msaTransactions();
                break;
              // case 'msaProduct':
                // msaTransactions();
                // break;
              default:
                msaHome();
                break;
            }
          };
          watch(  
            () => customerId.value,
            (value) => {
              if (value.length >= 5) {
                 getProductPrefix(value);
              }
            }
          );
          onMounted(() => {
            navigateTo();
          });
          return { 
            resetModal,
            dataProfile,
            isLoadingProfile,
            isSetPinAllert,
            setPin,
            isWrongPin,
            isConfirm,
            isModalPin,
            pin,
            pinLimit,
            addNumber,
            deleteNumber,
            confirmPin,
            payment,
            isModalInquiry,
            inquiry,
            dataInquiry,
            dataProducts,
            getProductPrefix,
            customerId,
            closeMsaModals,
            productDetail,
            modalProductDetail,
            navigateTo,
            navigate,
            msaProfile,
            modalMsaProfile,
            isLoadingTransactions,
            msaTransactions,
            modalMsaTransactions,
            msaHome,
            modalMsaHome,
            dataTransaction,
            getDetailTransaction,
            closeSession,
            isSharing,
            shareAsImage,
            closeModals,
            modalReceipt,
            getBalance,
            getProfile,
            getTransactions,
            dataTransactions,
            isLoadingBalance,
            dataBalance,
            modalSetPin,
            token,
          };
        }
      })
      app.config.globalProperties.$format = window.format
      app.mount('#app')
  </script>
</body>

</html>