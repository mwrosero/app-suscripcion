<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme-veris-life shadow-none">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link text-white">
            <span class="app-brand-text demo menu-text fw-bold">
                Menú
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-none">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <div class="text-start mx-auto my-3 px-4 w-100 d-none">
            <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/icono-veris-vertical-white.svg" alt="veris" class="d-none">
            <h2 class="fw-bold text-white text-start">Menú</h2>
        </div>
        @foreach (Session::get('menu') as $value)
            @foreach ($value->opciones as $v)
                @php
                    $currentRoute = request()->path();
                    $expectedRoute = "{$value->vista}/{$v->vista}";
                    $isActive = $currentRoute === $expectedRoute;

                    $style = $isActive ? 'solid' : 'light';
                    $iconBase = config('menu_icons.' . $v->vista);
                    $iconPath = $iconBase ? "/assets/svg/icons/menu/{$iconBase}_{$style}_icon.svg" : null;
                @endphp

                <li class="menu-item @if($isActive) active @endif">
                    <a href="/{{ $expectedRoute }}" class="menu-link text-white">
                        @if ($iconPath)
                            <div class="svg-container me-3">
                                <img src="{{ $iconPath }}" width="32"/>
                            </div>
                        @endif
                        <div class="text-one-line fs-14p lh-1 mt-1" data-i18n="{{ $v->descripcionOpcion }}">
                            {{ $v->descripcionOpcion }}
                        </div>
                    </a>
                </li>
            @endforeach
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