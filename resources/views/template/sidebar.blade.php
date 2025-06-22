<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme-veris-life shadow-none">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo d-none">
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/icono-veris-vertical-white.svg" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-none">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <div class="text-center mx-auto mb-4">
            <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/icono-veris-vertical-white.svg" alt="veris">
        </div>
        @foreach (Session::get('menu') as $value)
            @foreach ($value->opciones as $v)
                <li class="menu-item @if($loop->first) active @endif">
                    <a href="/{{ $value->vista }}/{{ $v->vista }}" class="menu-link fw-medium text-white">
                        <div class="fs-14" data-i18n="{{ $v->descripcionOpcion }}">{{ $v->descripcionOpcion }}</div>
                    </a>
                </li>
            @endforeach
        </li>
        @endforeach
        {{-- <li class="menu-item active">
            <a href="/verislife/home" class="menu-link fw-medium text-white">
                <i class="menu-icon tf-icons ti ti-mail d-none"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/verislife/registro" class="menu-link fw-medium text-white">
                <i class="menu-icon tf-icons ti ti-messages d-none"></i>
                <div data-i18n="Registro de Planes">Registro de Planes</div>
            </a>
        </li> --}}
    </ul>
</aside>