<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Viller Fintech | Secure Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
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
                        "surface-container": "#eceef3",
                        "primary-container": "#0052ff",
                        "primary": "#003ec7",
                        "on-surface-variant": "#434656",
                        "on-surface": "#181c20",
                        "on-secondary-container": "#253b89",
                        "surface-container-highest": "#e0e2e7",
                        "background": "#f7f9fe",
                        "on-primary": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "surface-tint": "#004ced",
                        "secondary": "#4459a8",
                        "outline": "#737688",
                        "on-tertiary-fixed-variant": "#891e00",
                        "on-tertiary-fixed": "#3c0800",
                        "tertiary-fixed": "#ffdbd2",
                        "outline-variant": "#c3c5d9",
                        "inverse-surface": "#2d3135",
                        "on-tertiary-container": "#ffddd5",
                        "tertiary-container": "#bf3003",
                        "on-error-container": "#93000a",
                        "secondary-fixed": "#dde1ff",
                        "tertiary-fixed-dim": "#ffb4a1",
                        "primary-fixed": "#dde1ff",
                        "on-secondary-fixed-variant": "#2b418f",
                        "on-error": "#ffffff",
                        "surface-variant": "#e0e2e7",
                        "surface": "#f7f9fe",
                        "primary-fixed-dim": "#b7c4ff",
                        "on-background": "#181c20",
                        "tertiary": "#952200",
                        "surface-container-low": "#f1f4f9",
                        "surface-dim": "#d8dadf",
                        "surface-bright": "#f7f9fe",
                        "secondary-container": "#95aafe",
                        "on-secondary-fixed": "#001452",
                        "inverse-primary": "#b7c4ff",
                        "error-container": "#ffdad6",
                        "on-tertiary": "#ffffff",
                        "on-primary-fixed": "#001452",
                        "on-primary-fixed-variant": "#0038b6",
                        "on-secondary": "#ffffff",
                        "on-primary-container": "#dfe3ff",
                        "error": "#ba1a1a",
                        "secondary-fixed-dim": "#b7c4ff",
                        "inverse-on-surface": "#eff1f6",
                        "surface-container-high": "#e6e8ed"
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

    <link rel="stylesheet" href="{{ url('assets/css/web-apps/web-apps.css') }}" type="text/css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

</head>

<body class="flex flex-col items-center min-h-screen bg-background font-body text-on-surface">
    <div class="v-watermark">V</div>
    {{-- <header
        class="fixed top-0 w-full z-50 flex justify-between items-center px-6 py-4 bg-[#f7f9fe]/70 backdrop-blur-xl">
        <div class="text-2xl font-extrabold tracking-tighter text-[#181c20] font-headline">Viller</div>
        <button
            class="material-symbols-outlined text-[#0052FF] p-2 hover:bg-[#f1f4f9] rounded-full transition-colors active:scale-95 duration-200">help_outline</button>
    </header> --}}
    <div id="app">
        @include('contents.msa.modals.setPin')
        @include('contents.msa.modals.toast')
        <main class="flex flex-col items-center justify-center flex-grow w-full max-w-md px-6 pt-24 pb-12">
            <div class="w-full mb-12 text-center">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight font-headline md:text-5xl text-on-surface">
                    Welcome back
                </h1>
                <p class="text-sm tracking-wide font-label text-on-surface-variant opacity-80">
                    Enter your credentials to access your secure wealth portal.
                </p>
            </div>
            <section class="w-full space-y-8">

                <div class="space-y-6">
                    <div class="group">
                        {{-- after login and failed, show alert or notif --}}
                        @if(session('error'))
                        <div
                            class="px-4 py-3 mb-4 text-sm rounded-xl bg-error-container text-on-error-container font-label">
                            {{ session('error') }}
                        </div>
                        @endif
                        <label
                            class="block font-label text-[10px] uppercase tracking-[0.1em] text-on-surface-variant mb-2 ml-1">Email
                            Address</label>
                        <div class="relative">
                            <span
                                class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary opacity-60">alternate_email</span>
                            <input
                                class="w-full py-4 pl-12 pr-4 transition-all border-none bg-surface-container-lowest rounded-xl focus:ring-2 focus:ring-primary/20 outline outline-1 outline-outline-variant/15 text-on-surface placeholder:text-outline/40"
                                placeholder="name@viller.com" type="text" name="username"
                                v-model="formSignIn.username" />
                            <input id="uidInput" class="w-full py-4 pl-12 pr-4 ..." placeholder="name@viller.com"
                                type="text" name="uid" hidden v-model="formSignIn.uid" />
                        </div>
                    </div>
                    <div class="group">
                        <div class="flex items-center justify-between mb-2 ml-1">
                            <label
                                class="block font-label text-[10px] uppercase tracking-[0.1em] text-on-surface-variant">Password</label>
                            <a class="text-[10px] uppercase tracking-[0.1em] text-primary font-bold hover:underline"
                                href="#">Forgot Password?</a>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -translate-y-1/2 material-symbols-outlined left-4 top-1/2 text-primary opacity-60">lock</span>
                            <input
                                class="w-full py-4 pl-12 pr-12 transition-all border-none bg-surface-container-lowest rounded-xl focus:ring-2 focus:ring-primary/20 outline outline-1 outline-outline-variant/15 text-on-surface placeholder:text-outline/40"
                                placeholder="••••••••" type="password" name="password" v-model="formSignIn.password" />
                            <button
                                class="absolute transition-opacity -translate-y-1/2 material-symbols-outlined right-4 top-1/2 text-on-surface-variant opacity-40 hover:opacity-100">visibility</button>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" @click="signIn"
                        class="w-full py-4 bg-gradient-to-br from-primary to-primary-container text-on-primary font-headline font-bold rounded-xl shadow-[0px_12px_32px_rgba(0,62,199,0.15)] hover:shadow-[0px_12px_48px_rgba(0,62,199,0.25)] active:scale-[0.98] transition-all duration-200">
                        Sign In
                    </button>
                </div>

                <div class="flex items-center gap-4 py-2">
                    <div class="h-[1px] flex-grow bg-outline-variant/20"></div>
                    <span class="text-[10px] uppercase tracking-widest text-outline">or secure entry via</span>
                    <div class="h-[1px] flex-grow bg-outline-variant/20"></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="flex items-center justify-center gap-2 py-3 text-xs font-semibold transition-colors duration-200 bg-surface-container-low rounded-xl font-label text-on-surface hover:bg-surface-container-high active:scale-95">
                        <img alt="" class="w-4 h-4"
                            data-alt="Official Google G logo in bright primary colors for authentication brand identity"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-_dsUzA5wAMyhh6w3Y8RlzhzttACQz4AlQJGgh7Hlmz2p4UAZaE7DChBJSzQmGQPZZGfWJz5QBnVVCJ4LQQWZH5QtA79zNm6BGmUl7ikXPChjNdELXKfetJxARFwo_ARjB4OuO1b-pgzLWp0bdxlerwyBzt-VtZcI0J6cvg_YHTUGixcg-IrHZcu7tYUdqOgRUDnrtEqvhU5W68h3e-dKgsU_L0alFZtY8_pjDjeTdQezVs7JriuBM9T9XScfEJKdO2_G2OwuZDA1" />
                        Google
                    </button>
                    <button
                        class="flex items-center justify-center gap-2 py-3 text-xs font-semibold transition-colors duration-200 bg-surface-container-low rounded-xl font-label text-on-surface hover:bg-surface-container-high active:scale-95">
                        <img alt="" class="w-4 h-4"
                            data-alt="Sleek black Apple logo representing secure biometric face id or touch id sign in option"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA_NsSpc4tuVpjgZEbwlyjQFVY_xucHhmF6pC_3v-xZzFTyAcaKlztfhQazfFkOvx1Oa-jqRtH9M-LclRma7myN7Gcx2GmSUX8pxcIpk1lWm88cfJdk5U6ZHU0Og3gfzEo5JRieMzDxv8C2En6YMmsnRr1-Qv0ioU4lA8BH_r4eldKJjDnqDKx39FIy7jloXA39-0Kbm2LOgeWdRg7QD767deWisA7yl4MolnNNY5f7cPcg871SN0cPp8y4EDM81fqPr9aKM5lSiXo" />
                        Apple ID
                    </button>
                </div>
            </section>
            <footer class="mt-16 text-center">
                <p class="text-sm font-label text-on-surface-variant">
                    Don't have an account? <a
                        class="font-bold text-primary hover:underline decoration-2 underline-offset-4"
                        href="{{ route('msa.signUp') }}">Sign Up</a>
                </p>
            </footer>
        </main>
    </div>
    <footer
        class="flex flex-col items-center justify-between w-full px-12 py-8 mx-auto mt-auto bg-transparent md:flex-row max-w-7xl">
        <div class="font-['Inter'] text-xs uppercase tracking-widest text-[#181c20]/50">
            © 2024 Viller Fintech. All rights reserved.
        </div>
        <div class="flex gap-8 mt-4 md:mt-0">
            <a class="font-['Inter'] text-xs uppercase tracking-widest text-[#181c20]/50 hover:text-[#0052FF] transition-all"
                href="#">Privacy Policy</a>
            <a class="font-['Inter'] text-xs uppercase tracking-widest text-[#181c20]/50 hover:text-[#0052FF] transition-all"
                href="#">Terms of Service</a>
            <a class="font-['Inter'] text-xs uppercase tracking-widest text-[#181c20]/50 hover:text-[#0052FF] transition-all"
                href="#">Security</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="module">
        const { createApp,onMounted, ref,nextTick, watch } = Vue;
      const app = createApp({
        setup() {
          const formSignIn = ref({
            username: '',
            password: '',
            uid:localStorage.getItem('uid') || '',
          });
          const toast=ref({
            show: false,
            type: 'success',
            title: '',
            message: '',
            progress: 100
          });
          const signIn = async () => {
             try {
              const response = await axios.post('{{ route('msa.signIn') }}', formSignIn.value,{
                  headers: {
                    'Content-Type': 'application/json',
                    'csrf-token': '{{ csrf_token() }}',
                  }
              });
              if (response.data.responseCode=="00") {
                  if(response.data.result.is_otp=="Y"){
                    localStorage.setItem('uid', response.data.result.device_uid);
                    modalShower.value.isSetPin=true;
                }else{
                    localStorage.setItem('token', response.data.result.access_token);
                    toast.value.show=true;
                    toast.value.type='success';
                    toast.value.message='Login Success, Redirecting...';
                    setTimeout(() => {
                        toast.value.show=false;
                        window.location.href = "/msa/home";
                    }, 2000);
                }
              } else {
                console.log("Response:", response.data);
                toast.value.show=true;
                toast.value.message=response.data.responseMessage || 'Sign Up Gagal';
                toast.value.type='error';
                setTimeout(() => {
                  toast.value.show=false;
                }, 1000);
              }

            } catch (error) {
                console.error("Gagal inquiry:", error.response?.data || error.message);
                toast.value.show=true;
                toast.value.message=error.response?.data?.message || 'Sign Up Gagal';
                toast.value.type='error';
                setTimeout(() => {
                  toast.value.show=false;
                }, 1000);
            }
          };
          const confirm=async()=>{
            try {
              const response = await axios.post('{{ route('msa.validateOtp') }}', {
                otp:otp.value,
                uid:localStorage.getItem('uid'),
                identifier:'signIn',
              },{
                  headers: {
                    'Content-Type': 'application/json',
                    'csrf-token': '{{ csrf_token() }}',
                  }
              });
              otp.value='';
              if (response.data.responseCode=="00") {
                toast.value.show=true;
                toast.value.type='success';
                toast.value.message='Verification Success, Please Login...';
                setTimeout(() => {
                    toast.value.show=false;
                    window.location.href = "/msa/sign-in";
                }, 2000);
              } else {
                toast.value.show=true;
                toast.value.message=response.data.responseMessage || 'Sign In Gagal';
                toast.value.type='error';
                setTimeout(() => {
                  toast.value.show=false;
                }, 1000);
              }

            } catch (error) {
                console.error("Gagal inquiry:", error.response?.data || error.message);
                toast.value.show=true;
                toast.value.message=error.response?.data?.message || 'Sign In Gagal';
                toast.value.type='error';
                setTimeout(() => {
                  toast.value.show=false;
                }, 1000);
            }
          }
          const otp=ref("");
          const modalShower=ref({
              isSetPin:false,
              
          })
          onMounted(() => {
          });
          return {
            formSignIn,
            toast,
            signIn,
            confirm,
            otp,
            modalShower,
          };
        }
      })
      app.config.globalProperties.$format = window.format
      app.mount('#app')
    </script>
</body>

</html>