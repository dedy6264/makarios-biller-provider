@extends('viller.app')
@section('content')
<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
    <!-- Success Card -->
    <div
        class="relative flex flex-col justify-between p-6 overflow-hidden transition-all duration-300 glass-panel rounded-2xl card-hover group">
        <div
            class="absolute w-24 h-24 transition-opacity rounded-full opacity-50 -right-4 -top-4 bg-emerald-100 blur-2xl group-hover:opacity-80">
        </div>
        <div class="relative z-10 flex items-start justify-between mb-4">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-emerald-50 text-emerald-600">
                <span class="material-symbols-outlined" data-icon="check_circle">check_circle</span>
            </div>
            <span
                class="inline-flex items-center gap-1 px-2 py-1 rounded-full font-label-caps text-label-caps text-emerald-600 bg-emerald-50">
                <span class="material-symbols-outlined text-[14px]">trending_up</span> 12%
            </span>
        </div>
        <div class="relative z-10">
            <p class="mb-1 font-body-sm text-body-sm text-secondary">Success Transactions</p>
            <h3 class="font-headline-xl text-headline-xl text-on-surface">14,239</h3>
        </div>
    </div>
    <!-- Pending Card -->
    <div
        class="relative flex flex-col justify-between p-6 overflow-hidden transition-all duration-300 glass-panel rounded-2xl card-hover group">
        <div
            class="absolute w-24 h-24 transition-opacity rounded-full opacity-50 -right-4 -top-4 bg-amber-100 blur-2xl group-hover:opacity-80">
        </div>
        <div class="relative z-10 flex items-start justify-between mb-4">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-amber-50 text-amber-600">
                <span class="material-symbols-outlined" data-icon="pending">pending</span>
            </div>
            <span
                class="inline-flex items-center gap-1 px-2 py-1 rounded-full font-label-caps text-label-caps text-secondary bg-surface-container">
                <span class="material-symbols-outlined text-[14px]">remove</span> 0%
            </span>
        </div>
        <div class="relative z-10">
            <p class="mb-1 font-body-sm text-body-sm text-secondary">Pending Processing</p>
            <h3 class="font-headline-xl text-headline-xl text-on-surface">842</h3>
        </div>
    </div>
    <!-- Failed Card -->
    <div
        class="relative flex flex-col justify-between p-6 overflow-hidden transition-all duration-300 glass-panel rounded-2xl card-hover group">
        <div
            class="absolute w-24 h-24 transition-opacity rounded-full opacity-50 -right-4 -top-4 bg-rose-100 blur-2xl group-hover:opacity-80">
        </div>
        <div class="relative z-10 flex items-start justify-between mb-4">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-rose-50 text-rose-600">
                <span class="material-symbols-outlined" data-icon="cancel">cancel</span>
            </div>
            <span
                class="inline-flex items-center gap-1 px-2 py-1 rounded-full font-label-caps text-label-caps text-rose-600 bg-rose-50">
                <span class="material-symbols-outlined text-[14px]">trending_down</span> 4%
            </span>
        </div>
        <div class="relative z-10">
            <p class="mb-1 font-body-sm text-body-sm text-secondary">Failed Transactions</p>
            <h3 class="font-headline-xl text-headline-xl text-on-surface">156</h3>
        </div>
    </div>
    <!-- Stopped Card -->
    <div
        class="relative flex flex-col justify-between p-6 overflow-hidden transition-all duration-300 glass-panel rounded-2xl card-hover group">
        <div
            class="absolute w-24 h-24 transition-opacity rounded-full opacity-50 -right-4 -top-4 bg-sky-100 blur-2xl group-hover:opacity-80">
        </div>
        <div class="relative z-10 flex items-start justify-between mb-4">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-sky-50 text-sky-600">
                <span class="material-symbols-outlined" data-icon="pan_tool">pan_tool</span>
            </div>
            <span
                class="inline-flex items-center gap-1 px-2 py-1 rounded-full font-label-caps text-label-caps text-sky-600 bg-sky-50">
                <span class="material-symbols-outlined text-[14px]">trending_up</span> 2%
            </span>
        </div>
        <div class="relative z-10">
            <p class="mb-1 font-body-sm text-body-sm text-secondary">Stopped at Inquiry</p>
            <h3 class="font-headline-xl text-headline-xl text-on-surface">43</h3>
        </div>
    </div>
</div>
<!-- Middle Section: Sales Trend Chart Area -->
<div class="p-6 glass-panel rounded-2xl">
    <div class="flex items-center justify-between pb-4 mb-6 border-b border-outline-variant/30">
        <div>
            <h3 class="font-headline-lg text-headline-lg text-on-surface">Sales Trend</h3>
            <p class="mt-1 font-body-sm text-body-sm text-secondary">Revenue over the last 30 days</p>
        </div>
        <div class="flex gap-2">
            <button
                class="px-4 py-2 font-medium rounded-lg font-body-sm text-body-sm text-primary bg-primary-fixed">30D</button>
            <button
                class="px-4 py-2 transition-colors rounded-lg font-body-sm text-body-sm text-secondary hover:bg-surface-container">90D</button>
            <button
                class="px-4 py-2 transition-colors rounded-lg font-body-sm text-body-sm text-secondary hover:bg-surface-container">1Y</button>
        </div>
    </div>
    <!-- Chart Placeholder with soft gradients -->
    <div
        class="relative flex items-end justify-between w-full px-4 pt-8 pb-8 mt-4 border-b border-l h-80 border-outline-variant/50">
        <!-- Y Axis Labels -->
        <div
            class="absolute left-[-40px] top-0 bottom-8 flex flex-col justify-between text-secondary font-label-caps text-[10px]">
            <span>100k</span>
            <span>75k</span>
            <span>50k</span>
            <span>25k</span>
            <span>0</span>
        </div>
        <!-- X Axis Labels -->
        <div
            class="absolute bottom-[-24px] left-0 right-0 flex justify-between px-4 text-secondary font-label-caps text-[10px]">
            <span>Week 1</span>
            <span>Week 2</span>
            <span>Week 3</span>
            <span>Week 4</span>
        </div>
        <!-- Faux Area Chart SVG -->
        <svg class="absolute inset-0 w-full h-full" preserveaspectratio="none" viewbox="0 0 1000 300">
            <defs>
                <lineargradient id="areaGradient" x1="0%" x2="0%" y1="0%" y2="100%">
                    <stop offset="0%" stop-color="#4f46e5" stop-opacity="0.2"></stop>
                    <stop offset="100%" stop-color="#4f46e5" stop-opacity="0.0"></stop>
                </lineargradient>
                <filter height="140%" id="glow" width="140%" x="-20%" y="-20%">
                    <fegaussianblur result="blur" stddeviation="4"></fegaussianblur>
                    <fecomposite in="SourceGraphic" in2="blur" operator="over"></fecomposite>
                </filter>
            </defs>
            <!-- Grid Lines -->
            <path d="M0,75 L1000,75 M0,150 L1000,150 M0,225 L1000,225" fill="none" opacity="0.5" stroke="#e0e3e5"
                stroke-dasharray="4 4" stroke-width="1"></path>
            <!-- Area -->
            <path d="M0,300 L0,200 C150,180 250,220 350,150 C450,80 550,120 700,50 C800,0 900,100 1000,80 L1000,300 Z"
                fill="url(#areaGradient)"></path>
            <!-- Line -->
            <path d="M0,200 C150,180 250,220 350,150 C450,80 550,120 700,50 C800,0 900,100 1000,80" fill="none"
                filter="url(#glow)" stroke="#4f46e5" stroke-width="3"></path>
            <!-- Data Points -->
            <circle cx="350" cy="150" fill="#ffffff" r="4" stroke="#4f46e5" stroke-width="2"></circle>
            <circle cx="700" cy="50" fill="#ffffff" r="4" stroke="#4f46e5" stroke-width="2"></circle>
        </svg>
    </div>
</div>
<!-- Bottom Section: Two Columns -->
<div class="grid grid-cols-1 gap-6 pb-12 lg:grid-cols-2">
    <!-- Best Selling Products -->
    <div class="flex flex-col h-full p-6 glass-panel rounded-2xl">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-outline-variant/30">
            <h3 class="font-headline-lg text-headline-lg text-on-surface">Top 5 Best Selling Products</h3>
            <button
                class="p-2 transition-colors rounded-full text-secondary hover:text-primary hover:bg-surface-container">
                <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
            </button>
        </div>
        <div class="flex-1 space-y-2">
            <!-- List Item 1 -->
            <div
                class="flex items-center justify-between p-3 transition-colors rounded-xl hover:bg-surface-container-low group">
                <div class="flex items-center gap-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 font-bold rounded-lg shadow-sm bg-surface-variant text-primary">
                        01</div>
                    <div>
                        <p
                            class="transition-colors font-data-tabular text-data-tabular text-on-surface group-hover:text-primary">
                            Enterprise Cloud Storage 1TB</p>
                        <p class="font-body-sm text-body-sm text-secondary">SaaS Subscription</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-data-tabular text-data-tabular text-on-surface">3,240</p>
                    <p class="font-body-sm text-[12px] text-emerald-600">+12%</p>
                </div>
            </div>
            <!-- List Item 2 -->
            <div
                class="flex items-center justify-between p-3 transition-colors rounded-xl hover:bg-surface-container-low group">
                <div class="flex items-center gap-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 font-medium border rounded-lg bg-surface text-secondary border-outline-variant/50">
                        02</div>
                    <div>
                        <p
                            class="transition-colors font-data-tabular text-data-tabular text-on-surface group-hover:text-primary">
                            Managed Database Node</p>
                        <p class="font-body-sm text-body-sm text-secondary">Infrastructure</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-data-tabular text-data-tabular text-on-surface">2,890</p>
                    <p class="font-body-sm text-[12px] text-emerald-600">+8%</p>
                </div>
            </div>
            <!-- List Item 3 -->
            <div
                class="flex items-center justify-between p-3 transition-colors rounded-xl hover:bg-surface-container-low group">
                <div class="flex items-center gap-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 font-medium border rounded-lg bg-surface text-secondary border-outline-variant/50">
                        03</div>
                    <div>
                        <p
                            class="transition-colors font-data-tabular text-data-tabular text-on-surface group-hover:text-primary">
                            Premium API Access</p>
                        <p class="font-body-sm text-body-sm text-secondary">Developer Tools</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-data-tabular text-data-tabular text-on-surface">1,543</p>
                    <p class="font-body-sm text-[12px] text-secondary">-2%</p>
                </div>
            </div>
            <!-- List Item 4 -->
            <div
                class="flex items-center justify-between p-3 transition-colors rounded-xl hover:bg-surface-container-low group">
                <div class="flex items-center gap-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 font-medium border rounded-lg bg-surface text-secondary border-outline-variant/50">
                        04</div>
                    <div>
                        <p
                            class="transition-colors font-data-tabular text-data-tabular text-on-surface group-hover:text-primary">
                            Load Balancer Basic</p>
                        <p class="font-body-sm text-body-sm text-secondary">Networking</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-data-tabular text-data-tabular text-on-surface">942</p>
                    <p class="font-body-sm text-[12px] text-emerald-600">+1%</p>
                </div>
            </div>
            <!-- List Item 5 -->
            <div
                class="flex items-center justify-between p-3 transition-colors rounded-xl hover:bg-surface-container-low group">
                <div class="flex items-center gap-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 font-medium border rounded-lg bg-surface text-secondary border-outline-variant/50">
                        05</div>
                    <div>
                        <p
                            class="transition-colors font-data-tabular text-data-tabular text-on-surface group-hover:text-primary">
                            SSL Certificate Pro</p>
                        <p class="font-body-sm text-body-sm text-secondary">Security</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-data-tabular text-data-tabular text-on-surface">812</p>
                    <p class="font-body-sm text-[12px] text-secondary">0%</p>
                </div>
            </div>
        </div>
        <button
            class="w-full py-3 mt-4 text-center transition-colors border border-transparent font-body-sm text-body-sm text-primary hover:bg-surface-container-low rounded-xl hover:border-outline-variant/30">View
            Full List</button>
    </div>
    <!-- Top Product Providers -->
    <div class="flex flex-col h-full p-6 glass-panel rounded-2xl">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-outline-variant/30">
            <h3 class="font-headline-lg text-headline-lg text-on-surface">Top 5 Product Providers</h3>
            <button
                class="p-2 transition-colors rounded-full text-secondary hover:text-primary hover:bg-surface-container">
                <span class="material-symbols-outlined" data-icon="filter_list">filter_list</span>
            </button>
        </div>
        <div class="flex-1 space-y-3">
            <!-- Provider 1 -->
            <div
                class="flex flex-col gap-2 p-3 transition-colors border border-transparent group rounded-xl hover:bg-surface-container-low hover:border-outline-variant/30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 text-xs font-bold text-blue-700 bg-blue-100 rounded">
                            AW</div>
                        <span class="font-data-tabular text-data-tabular text-on-surface">Amazon Web
                            Services</span>
                    </div>
                    <span class="px-2 py-1 rounded font-label-caps text-label-caps text-secondary bg-surface">42%
                        Share</span>
                </div>
                <!-- Progress bar -->
                <div class="w-full bg-surface-container rounded-full h-1.5 overflow-hidden">
                    <div class="bg-primary h-1.5 rounded-full" style="width: 42%"></div>
                </div>
            </div>
            <!-- Provider 2 -->
            <div
                class="flex flex-col gap-2 p-3 transition-colors border border-transparent group rounded-xl hover:bg-surface-container-low hover:border-outline-variant/30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 text-xs font-bold rounded bg-sky-100 text-sky-700">
                            GO</div>
                        <span class="font-data-tabular text-data-tabular text-on-surface">Google
                            Cloud</span>
                    </div>
                    <span class="px-2 py-1 rounded font-label-caps text-label-caps text-secondary bg-surface">28%
                        Share</span>
                </div>
                <!-- Progress bar -->
                <div class="w-full bg-surface-container rounded-full h-1.5 overflow-hidden">
                    <div class="bg-sky-500 h-1.5 rounded-full" style="width: 28%"></div>
                </div>
            </div>
            <!-- Provider 3 -->
            <div
                class="flex flex-col gap-2 p-3 transition-colors border border-transparent group rounded-xl hover:bg-surface-container-low hover:border-outline-variant/30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 text-xs font-bold text-indigo-700 bg-indigo-100 rounded">
                            MS</div>
                        <span class="font-data-tabular text-data-tabular text-on-surface">Microsoft
                            Azure</span>
                    </div>
                    <span class="px-2 py-1 rounded font-label-caps text-label-caps text-secondary bg-surface">18%
                        Share</span>
                </div>
                <!-- Progress bar -->
                <div class="w-full bg-surface-container rounded-full h-1.5 overflow-hidden">
                    <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 18%"></div>
                </div>
            </div>
            <!-- Provider 4 -->
            <div
                class="flex flex-col gap-2 p-3 transition-colors border border-transparent group rounded-xl hover:bg-surface-container-low hover:border-outline-variant/30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 text-xs font-bold text-teal-700 bg-teal-100 rounded">
                            DO</div>
                        <span class="font-data-tabular text-data-tabular text-on-surface">Digital
                            Ocean</span>
                    </div>
                    <span class="px-2 py-1 rounded font-label-caps text-label-caps text-secondary bg-surface">8%
                        Share</span>
                </div>
                <!-- Progress bar -->
                <div class="w-full bg-surface-container rounded-full h-1.5 overflow-hidden">
                    <div class="bg-teal-500 h-1.5 rounded-full" style="width: 8%"></div>
                </div>
            </div>
            <!-- Provider 5 -->
            <div
                class="flex flex-col gap-2 p-3 transition-colors border border-transparent group rounded-xl hover:bg-surface-container-low hover:border-outline-variant/30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 text-xs font-bold rounded bg-slate-100 text-slate-700">
                            LI</div>
                        <span class="font-data-tabular text-data-tabular text-on-surface">Linode</span>
                    </div>
                    <span class="px-2 py-1 rounded font-label-caps text-label-caps text-secondary bg-surface">4%
                        Share</span>
                </div>
                <!-- Progress bar -->
                <div class="w-full bg-surface-container rounded-full h-1.5 overflow-hidden">
                    <div class="bg-slate-500 h-1.5 rounded-full" style="width: 4%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection