@if (Auth::user()->diagnostico_inicial)
    <li class="nav-item">
        <a href="{{ route('diagnostico_inicials.info_diagnostico', Auth::user()->id) }}"
            class="nav-link {{ request()->is('diagnostico_inicials*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>Diagnostico Inicial</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('diagnostico_finals.info_diagnostico', Auth::user()->id) }}"
            class="nav-link {{ request()->is('diagnostico_finals*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>Diagnostico Final</p>
        </a>
    </li>

    <li class="nav-item @if (request()->is('introduccion*') || request()->is('introduccion/contenido/*'))menu-is-opening menu-open active @endif">
        <a href="#" class="nav-link">
            <i class="nav-icon far fa-list-alt"></i>
            <p>Contenido de la materia <i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('introduccion.menu_contenido') }}" class="nav-link @if (request()->is('introduccion/contenido/menu_contenido*'))active @endif">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Menú del contenido</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('introduccion.show','Vectores') }}" class="nav-link @if (request()->is('introduccion/contenido/show/Vectores*'))active @endif">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Vectores</p>
                </a>
            </li>
            <li class="nav-item @if (request()->is('introduccion/contenido/show/Movimiento rectilíneo*') || request()->is('introduccion/contenido/show/Caída libre*') || request()->is('introduccion/contenido/show/Movimiento parabólico*'))menu-is-opening menu-open active @endif">
                <a class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Cinemática<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('introduccion.show','Movimiento rectilíneo') }}" class="nav-link @if (request()->is('introduccion/contenido/show/Movimiento rectilíneo*'))active @endif">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Movimiento rectilíneo</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('introduccion.show','Caída libre') }}" class="nav-link @if (request()->is('introduccion/contenido/show/Caída libre*'))active @endif">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Caída libre</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('introduccion.show','Movimiento parabólico') }}" class="nav-link @if (request()->is('introduccion/contenido/show/Movimiento parabólico*'))active @endif">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Movimiento parabólico</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('introduccion.show','Gravitación universal') }}" class="nav-link @if (request()->is('introduccion/contenido/show/Gravitación universal*'))active @endif">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Gravitación universal</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('introduccion.show','Movimiento circular') }}" class="nav-link @if (request()->is('introduccion/contenido/show/Movimiento circular*'))active @endif">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Movimiento circular</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('introduccion.show','Dinámica lineal') }}" class="nav-link @if (request()->is('introduccion/contenido/show/Dinámica lineal*'))active @endif">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Dinámica lineal</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('introduccion.show','Trabajo y energía') }}" class="nav-link @if (request()->is('introduccion/contenido/show/Trabajo y energía*'))active @endif">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Trabajo y energía</p>
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item">
        <a href="{{ route('ejercicios.index') }}"
            class="nav-link {{ request()->is('ejercicios*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-clipboard-list"></i>
            <p>Ejercicios</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('formulas.index') }}" class="nav-link {{ request()->is('formulas*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-clipboard-list"></i>
            <p>Formulas</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('pares.index') }}" class="nav-link {{ request()->is('pares*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-list"></i>
            <p>Unidades de Medidas</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('videos.show') }}" class="nav-link {{ request()->is('videos*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-video"></i>
            <p>Videos</p>
        </a>
    </li>
@endif
