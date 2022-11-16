<!-- ======= Sidebar ======= -->
<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'home') ? '' : 'collapsed'}}" href="{{ route('home') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'driver') ? '' : 'collapsed'}}" href="{{ route('driver') }}">
            <i class="bi bi-car-front-fill"></i>
            <span>Driver</span>
        </a>
    </li><!-- End Driver Nav -->
    
    <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'barang') ? '' : 'collapsed'}}" href="{{ route('barang') }}">
            <i class="bi bi-box-seam-fill"></i>
            <span>Barang</span>
        </a>
    </li><!-- End Barang Nav -->

    <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'users') ? '' : 'collapsed'}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people-fill"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('users') }}">
                    <i class="bi bi-circle"></i><span>Atur Pengguna</span>
                </a>
            </li>
            <li>
                <a href="{{ route('clients') }}">
                    <i class="bi bi-circle"></i><span>Atur Client</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->
</ul>