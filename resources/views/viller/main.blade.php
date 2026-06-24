<main class="ml-[280px] pt-32 min-h-screen p-container-padding-desktop">
    <div class="max-w-[1400px] mx-auto space-y-card-gap">
        <!-- Page Header -->
        @include('viller.header')
        <!-- Top Section: Metrics Cards -->
        {{-- @include('viller.content') --}}
        {{ $slot }}
    </div>
</main>