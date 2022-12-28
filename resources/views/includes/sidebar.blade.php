<!-- ======= Sidebar ======= -->
<ul class="sidebar-nav" id="sidebar-nav">
    @if (Auth::user()->roles == "Admin")
    <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'home') ? '' : 'collapsed'}}" href="{{ route('home') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'report') ? '' : 'collapsed'}}" href="{{ route('report') }}" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
            <i class="ri-booklet-fill"></i>
            <span>Report</span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="report-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a href="{{ route('manifest') }}">
                    <i class="bi bi-circle"></i>
                    <span>Manifest</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('invoice') }}">
                    <i class="bi bi-circle"></i>
                    <span>Invoice</span>
                </a>
            </li>
        </ul>
    </li><!-- End Report Nav -->

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
        <a class="nav-link {{ (request()->segment(1) == 'users') ? '' : 'collapsed'}}" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people-fill"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
            <li>
                <a href="{{ route('roles') }}">
                    <i class="bi bi-circle"></i>
                    <span>Role</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->
    @elseif (Auth::user()->roles == "Operator")
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
                <a href="{{ route('clients') }}">
                    <i class="bi bi-circle"></i><span>Atur Client</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->
    @elseif(Auth::user()->roles == "Finance")
    <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'report') ? '' : 'collapsed'}}" href="{{ route('report') }}" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
            <i class="ri-booklet-fill"></i>
            <span>Report</span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="report-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a href="{{ route('manifest') }}">
                    <i class="bi bi-circle"></i>
                    <span>Manifest</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('invoice') }}">
                    <i class="bi bi-circle"></i>
                    <span>Invoice</span>
                </a>
            </li>
        </ul>
    </li><!-- End Report Nav -->
    @endif
</ul>