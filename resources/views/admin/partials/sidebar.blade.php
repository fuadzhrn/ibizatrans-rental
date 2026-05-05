<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #0B0B0B;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="border-bottom: 1px solid rgba(217,154,0,0.06);">
        <span class="brand-text font-weight-light" style="color: #D99A00; font-weight:700; padding: 12px 16px; display:block;">IBIZA TRANS</span>
        <span class="brand-subtext" style="color: #AFAFAF; padding: 0 16px 12px 16px; display:block; font-size:12px;">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt text-gold"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/home') }}" class="nav-link {{ request()->is('dashboard/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/layanan') }}" class="nav-link {{ request()->is('dashboard/layanan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-car"></i>
                        <p>Layanan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/paket-tour') }}" class="nav-link {{ request()->is('dashboard/paket-tour') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map-location-dot"></i>
                        <p>Paket Tour</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/contact') }}" class="nav-link {{ request()->is('dashboard/contact') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Contact</p>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>View Website</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
