 <main class="mt-1 main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layoutsviller.navbar')
    <!-- End Navbar -->
   <div id="app">
      <div class="py-4 container-fluid">
        <!-- Content -->
        {{-- @yield('content') --}}
        {{ $slot }}
        <!-- End Content -->
       @include('layoutsviller.footer')
      </div>
   </div>
  </main>