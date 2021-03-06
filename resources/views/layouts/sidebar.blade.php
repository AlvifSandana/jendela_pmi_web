<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            {{-- <a class="navbar-brand" href="./"><img src="{{ asset('images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logo2.png')}}" alt="Logo"></a> --}}
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('admin/stokdarah*') ? 'active':'' }}">
                    <a href="{{ route('admin.stokdarah.index') }}"><i class="menu-icon fa fa-tint fa-lg"></i>Stok Darah </a>
                </li>
                <li class="{{ Request::is('admin/jadwaldonor*') ? 'active':'' }}">
                    <a href="{{ route('admin.jadwaldonor.index') }}"> <i class="menu-icon fa fa-calendar"></i>Jadwal Donor </a>
                </li>
                <li class="{{ Request::is('admin/pendonor*') ? 'active':'' }}">
                    <a href="{{ route('admin.pendonor.index') }}"> <i class="menu-icon fa fa-clipboard"></i>Data Pendonor </a>
                </li>
                <li class="{{ Request::is('admin/kegiatan*') ? 'active':'' }}">
                    <a href="{{ route('admin.kegiatan.index') }}"> <i class="menu-icon fa fa-info"></i>Kegiatan </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
