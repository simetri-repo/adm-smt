@include('admin.Header')
<!-- Sidebar-->
<div class="border-end bg-simetri bg-gradient" id="sidebar-wrapper">
   <div class="sidebar-heading border-bottom bg-simetri bg-gradient">
      <img src="{{ asset('assets/logo.png') }}" class="img-fluid rounded mx-auto d-block" style="height: 100px" alt="">
      {{-- <h5>{{ session('username') }}</h5> --}}
   </div>
   <div class="list-group list-group-flush">
      <a class=" @yield('dashboard') list-group-item list-group-item-action list-group-item-secondary p-3"
         href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
      @if (session('role') == 1)
      <a class=" @yield('datauser') list-group-item list-group-item-action list-group-item-secondary p-3"
         href="{{ url('datauser') }}"><i class="fa fa-users"></i> Data User</a>
      @endif
      <a class=" @yield('datanews') list-group-item list-group-item-action list-group-item-secondary p-3"
         href="{{ url('datanews') }}">
         <i class="fas fa-newspaper"></i> News</a>
      <a class=" @yield('dataproduct') list-group-item list-group-item-action list-group-item-secondary p-3"
         href="{{ url('dataproduct') }}"><i class="fas fa-luggage-cart"></i> Product</a>
      <a class=" @yield('datacertificate') list-group-item list-group-item-action list-group-item-secondary p-3"
         href="{{ url('datacertificate') }}"><i class="fas fa-tags"></i> Certificate</a>
      <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="{{ url('logout') }}"><i
            class="fas fa-power-off"></i> LogOut</a>
   </div>
</div>
<!-- Page content wrapper-->
<div id="page-content-wrapper">
   <!-- Top navigation-->
   <nav class="navbar navbar-expand-sm navbar-light bg-simetri bg-gradient sidebar-heading border-bottom">
      <div class="container-fluid sidebar-heading bg-transparent">
         <button class="btn btn-secondary" id="sidebarToggle"><span><i class="fas fa-bars  "></i></span></button>
      </div>
   </nav>
   @include('admin.Footer')