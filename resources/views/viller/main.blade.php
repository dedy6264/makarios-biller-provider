<main class="ml-0 lg:ml-[280px] pt-24 lg:pt-32 min-h-screen p-container-padding-mobile lg:p-container-padding-desktop transition-all duration-300 ease-in-out">
    <div class="max-w-[1400px] mx-auto space-y-card-gap">
        <!-- Page Header -->
        @hasSection('header')
            @yield('header')
        @else
            @include('viller.header')
        @endif
        <!-- Top Section: Metrics Cards -->
        {{-- @include('viller.content') --}}
        @yield('content')
    </div>
</main>