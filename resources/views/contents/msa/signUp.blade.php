<!DOCTYPE html>

<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
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
                    "lg": "1rem",
                    "xl": "1.5rem",
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
    input:focus+span.material-symbols-outlined {
      color: #0052ff;
    }

    /* Custom hide scrollbar */
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>
  <script src="{{ url('assets/css/web-apps/web-apps.css') }}" type="text/css"></script>

</head>

<body class="flex flex-col items-center min-h-screen antialiased bg-surface font-body text-on-surface">
  <!-- Suppress TopAppBar and BottomNavBar as per Transactional/Onboarding mandate -->
  <!-- Header / Branding Anchor -->
  <header class="w-full max-w-md px-8 pt-12 pb-8 text-center">
    <div class="inline-flex items-center justify-center p-3 mb-4 bg-primary-container/10 rounded-2xl">
      <span class="text-4xl material-symbols-outlined text-primary"
        style="font-variation-settings: 'wght' 700;">shield_person</span>
    </div>
    <h1 class="text-3xl font-black tracking-tight font-headline text-primary">Viller</h1>
    <p class="mt-2 font-medium text-on-surface-variant">Start your premium financial journey</p>
  </header>
  <!-- Main Form Canvas -->
  <form action="{{ route('msa.signUp') }}" method="post">
    @csrf
    <main class="flex-grow w-full max-w-md px-6 pb-32">
      <!-- Step Indicator -->
      <div class="flex items-center justify-between px-2 mb-8">
        <div class="flex items-center gap-2">
          <div class="w-8 h-2 rounded-full bg-primary"></div>
          <div class="w-2 h-2 rounded-full bg-surface-container-highest"></div>
          <div class="w-2 h-2 rounded-full bg-surface-container-highest"></div>
        </div>
        <span class="text-xs font-semibold tracking-widest uppercase font-label text-primary">Step 01 of 03</span>
      </div>
      <section class="space-y-6">
        <div class="space-y-1">
          <h2 class="px-2 text-xl font-bold font-headline">Personal Identity</h2>
          <p class="px-2 text-sm text-on-surface-variant">Fill in your legal details as per your identity card.</p>
        </div>
        <div class="space-y-4">
          <!-- Full Name Field -->
          <div class="relative group">
            <label class="block text-xs font-semibold text-on-surface-variant mb-1.5 ml-1 uppercase tracking-wider">Full
              Name</label>
            <div class="relative flex items-center">
              <span
                class="material-symbols-outlined absolute left-4 text-outline group-focus-within:text-primary transition-colors text-[20px]">person</span>
              <input
                class="w-full py-4 pl-12 pr-4 font-medium transition-all border-none outline-none bg-surface-container-lowest ring-1 ring-outline-variant/15 focus:ring-2 focus:ring-primary/40 rounded-xl placeholder:text-outline/50"
                placeholder="e.g. Julian Alexander" type="text" name="fullname" />
            </div>
          </div>
          <!-- Username & ID (KTP) Row -->
          <div class="grid grid-cols-1 gap-4">
            <div class="relative group">
              <label class="block text-xs font-semibold text-on-surface-variant mb-1.5 ml-1 uppercase tracking-wider">ID
                Number (KTP)</label>
              <div class="relative flex items-center">
                <span
                  class="material-symbols-outlined absolute left-4 text-outline group-focus-within:text-primary transition-colors text-[20px]">badge</span>
                <input
                  class="w-full py-4 pl-12 pr-4 font-medium transition-all border-none outline-none bg-surface-container-lowest ring-1 ring-outline-variant/15 focus:ring-2 focus:ring-primary/40 rounded-xl placeholder:text-outline/50"
                  placeholder="16-digit ID number" type="text" name="numberid" />
              </div>
            </div>
          </div>
          <!-- Contact Info Group -->
          <div class="grid grid-cols-1 gap-4">
            <div class="relative group">
              <label
                class="block text-xs font-semibold text-on-surface-variant mb-1.5 ml-1 uppercase tracking-wider">Email
                Address</label>
              <div class="relative flex items-center">
                <span
                  class="material-symbols-outlined absolute left-4 text-outline group-focus-within:text-primary transition-colors text-[20px]">alternate_email</span>
                <input
                  class="w-full py-4 pl-12 pr-4 font-medium transition-all border-none outline-none bg-surface-container-lowest ring-1 ring-outline-variant/15 focus:ring-2 focus:ring-primary/40 rounded-xl placeholder:text-outline/50"
                  placeholder="name@viller.com" type="email" name="email/>
              </div>
            </div>
            <div class=" relative group">
                <label
                  class="block text-xs font-semibold text-on-surface-variant mb-1.5 ml-1 uppercase tracking-wider">Phone
                  Number</label>
                <div class="relative flex items-center">
                  <span
                    class="material-symbols-outlined absolute left-4 text-outline group-focus-within:text-primary transition-colors text-[20px]">phone_iphone</span>
                  <input
                    class="w-full py-4 pl-12 pr-4 font-medium transition-all border-none outline-none bg-surface-container-lowest ring-1 ring-outline-variant/15 focus:ring-2 focus:ring-primary/40 rounded-xl placeholder:text-outline/50"
                    placeholder="+1 (555) 000-0000" type="phone" />
                </div>
              </div>
            </div>
            <!-- Birth Date & Username -->
            <div class="grid grid-cols-2 gap-4">
              <div class="relative group">
                <label
                  class="block text-xs font-semibold text-on-surface-variant mb-1.5 ml-1 uppercase tracking-wider">Birth
                  Date</label>
                <div class="relative flex items-center">
                  <input
                    class="w-full px-4 py-4 font-medium transition-all border-none outline-none appearance-none bg-surface-container-lowest ring-1 ring-outline-variant/15 focus:ring-2 focus:ring-primary/40 rounded-xl"
                    type="date" name="birthdate" />
                </div>
              </div>
              <div class="relative group">
                <label
                  class="block text-xs font-semibold text-on-surface-variant mb-1.5 ml-1 uppercase tracking-wider">Username</label>
                <div class="relative flex items-center">
                  <input
                    class="w-full px-4 py-4 font-medium transition-all border-none outline-none bg-surface-container-lowest ring-1 ring-outline-variant/15 focus:ring-2 focus:ring-primary/40 rounded-xl placeholder:text-outline/50"
                    placeholder="@julian" type="text" name="username" />
                </div>
              </div>
            </div>
            <!-- Password Field -->
            <div class="relative group">
              <label
                class="block text-xs font-semibold text-on-surface-variant mb-1.5 ml-1 uppercase tracking-wider">Security
                Password</label>
              <div class="relative flex items-center">
                <span
                  class="material-symbols-outlined absolute left-4 text-outline group-focus-within:text-primary transition-colors text-[20px]">lock</span>
                <input
                  class="w-full py-4 pl-12 pr-12 font-medium transition-all border-none outline-none bg-surface-container-lowest ring-1 ring-outline-variant/15 focus:ring-2 focus:ring-primary/40 rounded-xl placeholder:text-outline/50"
                  placeholder="Min. 8 characters" type="password" name="password" />
                <span
                  class="material-symbols-outlined absolute right-4 text-outline cursor-pointer hover:text-primary transition-colors text-[20px]">visibility</span>
              </div>
            </div>
            <!-- Address Field -->
            <div class="relative group">
              <label
                class="block text-xs font-semibold text-on-surface-variant mb-1.5 ml-1 uppercase tracking-wider">Home
                Address</label>
              <div class="relative flex items-center">
                <span
                  class="material-symbols-outlined absolute left-4 top-4 text-outline group-focus-within:text-primary transition-colors text-[20px]">location_on</span>
                <textarea
                  class="w-full py-4 pl-12 pr-4 font-medium transition-all border-none outline-none resize-none bg-surface-container-lowest ring-1 ring-outline-variant/15 focus:ring-2 focus:ring-primary/40 rounded-xl placeholder:text-outline/50"
                  placeholder="Street name, building, apartment..." rows="3" name="address"></textarea>
              </div>
            </div>
          </div>
      </section>
      <!-- Aesthetic FinTech Visual Cue (Sparkline mimic) -->
      <div class="flex items-center gap-4 p-4 mt-8 border-none bg-primary-fixed/30 rounded-xl">
        <div class="p-2 rounded-lg bg-primary">
          <span class="material-symbols-outlined text-white text-[20px]">info</span>
        </div>
        <p class="text-[12px] font-medium leading-relaxed text-on-primary-fixed-variant">
          Your data is encrypted using 256-bit SSL protocols. Viller never shares your personal information.
        </p>
      </div>
    </main>
    <!-- Bottom Action Bar (Fixed) -->
    <div
      class="fixed bottom-0 left-0 z-40 flex flex-col w-full max-w-md gap-4 px-6 pt-4 pb-8 -translate-x-1/2 bg-white/70 backdrop-blur-2xl left-1/2">
      <button
        class="w-full py-4 bg-gradient-to-br from-primary to-primary-container text-on-primary font-headline font-bold rounded-xl shadow-[0px_12px_32px_rgba(0,62,199,0.15)] active:scale-95 transition-all duration-200 uppercase tracking-widest text-sm flex items-center justify-center gap-2">
        Continue
        <span class="material-symbols-outlined text-[18px]"
          style="font-variation-settings: 'wght' 700;">arrow_forward</span>
      </button>
      <p class="text-xs font-medium text-center text-on-surface-variant">
        Already have an account? <a class="font-bold text-primary" href="#">Log In</a>
      </p>
    </div>
  </form>
  <!-- Decorative Liquid Background Element -->
  <div
    class="fixed top-[-10%] right-[-10%] w-[80%] h-[50%] bg-primary-fixed/10 blur-[120px] rounded-full -z-10 pointer-events-none">
  </div>
  <div
    class="fixed bottom-[-10%] left-[-10%] w-[60%] h-[40%] bg-secondary-container/10 blur-[100px] rounded-full -z-10 pointer-events-none">
  </div>
</body>

</html>