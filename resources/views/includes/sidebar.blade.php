<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Indonusa</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ (request()->segment(1) == 'home') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Menu Utama</a>
            <a href="{{ route('report') }}" class="nav-item nav-link {{ (request()->segment(1) == 'report') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Laporan</a>
            <a href="{{ route('barang') }}" class="nav-item nav-link {{ (request()->segment(1) == 'barang') ? 'active' : '' }}"><i class="fa fa-archive me-2"></i>Tipe Barang</a>
            <a href="{{ route('client') }}" class="nav-item nav-link {{ (request()->segment(1) == 'client') ? 'active' : '' }}"><i class="fa fa-users me-2"></i>Client</a>
            <a href="{{ route('driver') }}" class="nav-item nav-link {{ (request()->segment(1) == 'driver') ? 'active' : '' }}"><i class="fa fa-car me-2"></i>Driver</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->