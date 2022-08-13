<!-- Sidebar -->

<!-- Brand Logo -->
<a href="/" class="brand-link">
    {{-- <img src="{{asset('template')}}/dist/img/profil.png"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8"> --}}
    <span class="brand-text font-weight-light">
        <center>FastPrint</center>
    </span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('template') }}/dist/img/profil.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->username }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="/" class="nav-link {{ $title === 'Home' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Beranda
                    </p>
                </a>
            </li>
            @if (in_array(auth()->user()->role, [1]))
                <li class="nav-item has-treeview">

                    <a href="#" class="nav-link">
                        <i class="nav-icon "></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @if (in_array(auth()->user()->role, [1]))
                            <li class="nav-item">
                                <a href="/bahan" class="nav-link {{ Request::is('bahan') ? 'active' : '' }}">
                                    <i class="far nav-icon"></i>
                                    <p>Bahan</p>
                                </a>
                            </li>
                        @endif
                        @if (in_array(auth()->user()->role, [1]))
                            <li class="nav-item">
                                <a href="/tipe_order" class="nav-link {{ Request::is('tipe_order') ? 'active' : '' }}">
                                    <i class="far nav-icon"></i>
                                    <p>Jasa Servis</p>
                                </a>
                            </li>
                        @endif

                    </ul>

                </li>
            @endif

            @if (in_array(auth()->user()->role, [1, 2, 3, 4]))
                <li class="nav-item has-treeview">

                    <a href="/pemesanan" class="nav-link {{ Request::is('pemesanan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Pemesanan
                        </p>
                    </a>

                </li>
            @endif
            @if (in_array(auth()->user()->role, [1, 2, 3, 4]))
                <li class="nav-item">
                    <a href="/pembayaran" class="nav-link {{ Request::is('pembayaran') ? 'active' : '' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Nota Pembayaran
                        </p>
                    </a>
                </li>
            @endif
            @if (in_array(auth()->user()->role, [1, 2, 3, 4]))
                <li class="nav-item has-treeview">
                    <a href="/bahanbaku/pemenuhan"
                        class="nav-link {{ Request::is('bahanbaku/pemenuhan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pemenuhan Bahan Baku
                        </p>
                    </a>
                </li>
            @endif

            @if (in_array(auth()->user()->role, [1, 2, 3, 4]))
                <li class="nav-item has-treeview">
                    <a href="/produksi" class="nav-link {{ Request::is('produksi') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Produksi
                        </p>
                    </a>
                </li>
            @endif

            @if (in_array(auth()->user()->role, [1]))
                <li class="nav-item has-treeview">
                    <a href="/laporan" class="nav-link {{ Request::is('laporan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
            @endif

    </nav>
    <!-- /.sidebar-menu -->

    <!-- /.sidebar -->

</div>
<!-- /.sidebar -->
