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
    <main class="px-6 pt-24 pb-32 mx-auto space-y-8 max-w-7xl">
      <!-- Welcome Section -->
      <section class="space-y-1">
        <h2 class="text-2xl font-bold tracking-tight font-headline text-on-surface">Welcome, Alex Rivera</h2>
        <p class="text-sm font-medium text-on-surface-variant">Your financial summary for today</p>
      </section>
      <!-- Balance Card - Liquid Architect Style -->
      <section
        class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-primary to-primary-container p-8 shadow-xl">
        <div class="relative z-10 flex flex-col gap-6">
          <div class="flex items-start justify-between">
            <div class="space-y-1">
              <p class="text-xs font-semibold tracking-widest uppercase text-on-primary-container/80 font-label">Saving
                Balance</p>
              <img src="{{ url('assets/img/icons/loading.gif') }}" alt="" style="width: 600px;max-height: 50px"
                v-if="isLoadingBalance">
              <h3 v-else class="text-4xl font-extrabold tracking-tight font-headline text-on-primary">
                @{{$format.formatCurrency(dataBalance)}}
              </h3>
            </div>
            <div class="p-3 bg-white/20 backdrop-blur-md rounded-2xl">
              <span class="text-3xl material-symbols-outlined text-on-primary"
                style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="bg-emerald-400/20 px-3 py-1.5 rounded-full flex items-center gap-1.5">
              <span class="text-sm material-symbols-outlined text-emerald-300">trending_up</span>
              <span class="text-xs font-bold text-emerald-50">+2.4%</span>
            </div>
            <p class="text-xs font-medium text-on-primary-container/60">Last updated: 2 mins ago</p>
          </div>
        </div>
        <!-- Decorative Liquid Elements -->
        <div class="absolute w-48 h-48 rounded-full -right-12 -top-12 bg-white/10 blur-3xl"></div>
        <div class="absolute w-64 h-64 rounded-full -left-12 -bottom-12 bg-blue-400/10 blur-3xl"></div>
      </section>
      <!-- Shortcut Icons Grid -->
      <section class="space-y-6">
        <div class="flex items-end justify-between">
          <h4 class="text-lg font-bold font-headline text-on-surface">Quick Actions</h4>
          <button class="text-sm font-bold text-primary" ">View All</button>


        </div>
        <div class=" grid grid-cols-3 gap-6 md:grid-cols-6">
            <!-- Top-Up -->
            <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
              <div
                class="flex items-center justify-center w-16 h-16 shadow-sm rounded-2xl bg-surface-container-lowest text-primary-container">
                <span class="text-3xl material-symbols-outlined">smartphone</span>
              </div>
              <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Mobile Top-Up</span>
            </div>
            <!-- Electricity -->
            <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
              <div
                class="flex items-center justify-center w-16 h-16 shadow-sm rounded-2xl bg-surface-container-lowest text-amber-500">
                <span class="text-3xl material-symbols-outlined">bolt</span>
              </div>
              <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Electricity
                Token</span>
            </div>
            <!-- Games -->
            <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
              <div
                class="flex items-center justify-center w-16 h-16 text-purple-500 shadow-sm rounded-2xl bg-surface-container-lowest">
                <span class="text-3xl material-symbols-outlined">sports_esports</span>
              </div>
              <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Game Voucher</span>
            </div>
            <!-- Water -->
            <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
              <div
                class="flex items-center justify-center w-16 h-16 text-blue-400 shadow-sm rounded-2xl bg-surface-container-lowest">
                <span class="text-3xl material-symbols-outlined">water_drop</span>
              </div>
              <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Water Bill</span>
            </div>
            <!-- Internet -->
            <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
              <div
                class="flex items-center justify-center w-16 h-16 shadow-sm rounded-2xl bg-surface-container-lowest text-emerald-500">
                <span class="text-3xl material-symbols-outlined">wifi</span>
              </div>
              <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Internet Bill</span>
            </div>
            <!-- Tax -->
            <div class="flex flex-col items-center gap-3 transition-all active:scale-95">
              <div
                class="flex items-center justify-center w-16 h-16 shadow-sm rounded-2xl bg-surface-container-lowest text-rose-500">
                <span class="text-3xl material-symbols-outlined">receipt_long</span>
              </div>
              <span class="text-xs font-semibold text-center font-label text-on-surface-variant">Tax Payment</span>
            </div>
        </div>
      </section>
      <!-- Carousel Banner -->
      <section class="space-y-4">
        <h4 class="text-lg font-bold font-headline text-on-surface">Exclusive Offers</h4>
        <div class="flex gap-4 px-6 pb-4 -mx-6 overflow-x-auto hide-scrollbar">
          <!-- Slide 1 -->
          <div class="min-w-[85%] md:min-w-[400px] h-48 rounded-3xl overflow-hidden relative shadow-lg">
            <img alt="Promo 1" class="object-cover w-full h-full"
              data-alt="abstract fluid gradient background with vibrant blue and purple swirls and soft grain texture"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoIf-3BTqa8BoLFbhlGQcxcz1W4myHY5WvndX3_s_Yx5fV1GjVdAdycBFTgnFJwYf0oJppPtCZrmxajlaH-gh26-U8DcIRYd4Yob9KBzed7BQXf82HHbztVdZDbBhE19payCHE_lusnAD7raicjXm3yywFPKhiPnmpoleg3x3jIzjZXbrOT82dkHORJju3cYAwzoYoQvn0_jvRZp5Reu0hVJLYeuq2cLDWTrWXmNAgRE4zscd9--6VjH6P0jM8w8II6VSvA6KWGIrH" />
            <div class="absolute inset-0 flex flex-col justify-end p-6 bg-black/30">
              <span
                class="bg-primary text-on-primary text-[10px] font-bold uppercase w-fit px-2 py-0.5 rounded-full mb-2 tracking-widest">Promotion</span>
              <h5 class="text-xl font-bold leading-tight text-white font-headline">Get 15% Cashback on Electricity Bill
              </h5>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="min-w-[85%] md:min-w-[400px] h-48 rounded-3xl overflow-hidden relative shadow-lg">
            <img alt="Promo 2" class="object-cover w-full h-full"
              data-alt="high-end electronic gadgets on a clean minimalist surface with soft teal and blue ambient lighting"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcmprmn7JqRKHNbuYcKF2BSrZvLVcEsI6Ou9hzrHwlPb5l4ubBCXHOLCgf3iUC-IGiMi7Ec9Tt-BCcCJW0bey5cgOPm9htNl5YqolkKwEOkBfPG-Vh5pZtLsitzGsKGpW2-yLEQSmowBWDaADZHOGn8pm7DGHMmdsVPeoreTtwX4ZomXjl4mrJTKWDxkRS9lYvBBBJ8q1dbJjsQPovLidRhA5DlRLmDXdXoutj_8xFdvse458lDF4RPVSbnfKUY11QxpAgSqb7Tyjv" />
            <div class="absolute inset-0 flex flex-col justify-end p-6 bg-black/30">
              <span
                class="bg-emerald-500 text-white text-[10px] font-bold uppercase w-fit px-2 py-0.5 rounded-full mb-2 tracking-widest">Limited</span>
              <h5 class="text-xl font-bold leading-tight text-white font-headline">New Game Vouchers: Up to 50% Off</h5>
            </div>
          </div>
        </div>
      </section>
      <!-- Transactions Hint - No Border List -->
      <section class="space-y-6">
        <div class="flex items-end justify-between">
          <h4 class="text-lg font-bold font-headline text-on-surface">Recent Transactions</h4>
          <button class="text-sm font-bold text-success">See History</button>
        </div>
        <div class="space-y-6" v-for=" item in dataTransactions">
          <!-- Item 1 -->
          <div
            class="flex items-center justify-between p-4 transition-colors bg-surface-container-lowest rounded-3xl hover:bg-surface-bright"
            @click="getDetailTransaction(item.reference_number)">
            <div class="flex items-center gap-4">
              <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-blue-50">
                <span class="material-symbols-outlined text-primary" v-if="item.status_code=='00'">check_circle</span>
                <span class="text-yellow-500 material-symbols-outlined"
                  v-else-if="item.status_code=='02'">autorenew</span>
                <span class="text-red-500 material-symbols-outlined" v-else>cancel</span>
              </div>
              <div>
                <p class="font-bold font-headline text-on-surface">@{{ item.product_name }} | @{{item.customer_id}}</p>
                <p class="text-xs text-on-surface-variant">@{{$format.formatTanggal(item.updated_at)}}</p>
              </div>
            </div>
            <p class="font-bold font-headline text-primary" v-if="item.status_code=='00'">-
              @{{$format.formatCurrency(item.product_price)}}</p>
            <p class="font-bold text-yellow-500 font-headline" v-else-if="item.status_code=='02'">-
              @{{$format.formatCurrency(item.product_price)}}</p>
            <p class="font-bold text-red-500 font-headline" v-else>- @{{$format.formatCurrency(item.product_price)}}</p>
          </div>
          <!-- Item 2 -->
          {{-- <div
            class="flex items-center justify-between p-4 transition-colors bg-surface-container-lowest rounded-3xl hover:bg-surface-bright">
            <div class="flex items-center gap-4">
              <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-50">
                <span class="material-symbols-outlined text-emerald-600">account_balance</span>
              </div>
              <div>
                <p class="font-bold font-headline text-on-surface">Salary Deposit</p>
                <p class="text-xs text-on-surface-variant">Yesterday, 04:00 PM</p>
              </div>
            </div>
            <p class="font-bold font-headline text-emerald-600">+$3,200.00</p>
          </div> --}}
        </div>
      </section>
    </main>
    {{-- end modal home --}}
    <!-- BottomNavBar -->
    <nav
      class="fixed bottom-0 left-0 w-full bg-white/70 backdrop-blur-xl z-50 rounded-t-3xl shadow-[0px_-8px_24px_rgba(0,62,199,0.04)]">
      <div class="flex items-center justify-around px-4 pt-3 pb-6">
        <!-- Home (Active) bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 rounded-2xl text-blue-700-->
        <a class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 text-slate-400 dark:text-slate-500 hover:text-blue-500 active:scale-90"
          href="#">
          <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
          <span class="font-inter text-[8px] font-semibold uppercase tracking-wider mt-1">Home</span>
        </a>
        <!-- Transaction -->
        <a class="flex flex-col items-center justify-center px-5 py-2 transition-transform duration-200 text-slate-400 dark:text-slate-500 hover:text-blue-500 active:scale-90"
          href="#">
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
        <a class="flex flex-col items-center justify-center px-5 py-2 text-blue-700 transition-transform duration-200 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-300 rounded-2xl active:scale-90"
          href="#">
          <span class="material-symbols-outlined">person</span>
          <span class="font-inter text-[8px] font-semibold uppercase tracking-wider mt-1">Profile</span>
        </a>
      </div>
    </nav>
    @include('contents.msa.modals.receipt')
    @include('contents.msa.modals.setPin')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    const { createApp,onMounted, ref,nextTick, watch } = Vue;
      const app = createApp({
        setup() {
          const isSharing = ref(false);
          const modalReceipt=ref(false);
          const isLoadingBalance=ref(true);
          const modalSetPin=ref(false);
          //end boolean variable
          const dataBalance=ref(0);
          //end int variable
          const dataTransactions=ref({});
          const dataTransaction=ref({});
          //end interface variable
          const token=localStorage.getItem('token');
          //end constant
          const getBalance=async()=>{
            try {
              const response = await axios.get('{{ route('msa.getBalance') }}', {
                  headers: {
                      Authorization: `Bearer ${token}`,
                  }
              });
              // console.log("BALANCE ", response.data);
              dataBalance.value=response.data.result.account_balance;
              if(response.data.result.is_set_pin=="N"){
                setTimeout(() => {
                  openModalSetPin();//open modal set pin, setelah data terupdate semua
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
          const getProfile=()=>{};
          const getTransactions=async()=>{
            try {
              const response = await axios.post('{{ route('msa.getTransactions') }}', {
                'lenght':5,
              },{
                  headers: {
                      Authorization: `Bearer ${token}`,
                  }
              });
              dataTransactions.value=response.data.result.data;
            } catch (error) {
                console.error("Gagal mengambil saldo:", error.response?.data || error.message);
                if (error.response?.status === 401) {
                    closeSession();
                }
            }
          };
          //end api
          const getDetailTransaction=(val)=>{
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
          const closeModals = () => {
              console.log("Fungsi close dipanggil!");
              modalReceipt.value = false;
              modalSetPin.value=false;
          };
          const closeSession=()=>{
            localStorage.removeItem('token');
            window.location.href = '/msa/sign-in';
          }
          const shareAsImage = () => {
            console.log("llll");
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
          const openModalSetPin=()=>{
            modalSetPin.value=true;
          };
          //end utils
          onMounted(() => {
            getBalance();
            getTransactions();
          });
          return { 
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
            openModalSetPin,
            token,
          };
        }
      })
      app.config.globalProperties.$format = window.format
      app.mount('#app')
  </script>
</body>

</html>