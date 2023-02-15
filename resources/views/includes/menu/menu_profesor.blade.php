<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Estudiantes</p>
    </a>
</li>

<li class="nav-item @if(request()->is('diagnostico_inicials*') || request()->is('lista_diagnosticos_inicial*'))menu-is-opening menu-open active @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-list-alt"></i>
        <p>Diagnóstico Inicial <i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('diagnostico_inicials.index') }}" class="nav-link @if(request()->is('diagnostico_inicials*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Diagnóstico Inicial</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('diagnostico_inicials.lista_diagnosticos') }}" class="nav-link @if(request()->is('lista_diagnosticos_inicial*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Diagnóstico Inicial Estudiantes</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item @if (request()->is('introduccion*') || request()->is('introduccion/contenido/*'))menu-is-opening menu-open active @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-list-alt"></i>
        <p>Contenido de la materia <i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('introduccion.edit','Vectores') }}" class="nav-link @if (request()->is('introduccion/contenido/edit/Vectores*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Vectores</p>
            </a>
        </li>
        <li class="nav-item @if (request()->is('introduccion/contenido/edit/Movimiento rectilíneo*') || request()->is('introduccion/contenido/edit/Caída libre*') || request()->is('introduccion/contenido/edit/Movimiento parabólico*'))menu-is-opening menu-open active @endif">
            <a class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>Cinemática<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('introduccion.edit','Movimiento rectilíneo') }}" class="nav-link @if (request()->is('introduccion/contenido/edit/Movimiento rectilíneo*'))active @endif">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Movimiento rectilíneo</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('introduccion.edit','Caída libre') }}" class="nav-link @if (request()->is('introduccion/contenido/edit/Caída libre*'))active @endif">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Caída libre</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('introduccion.edit','Movimiento parabólico') }}" class="nav-link @if (request()->is('introduccion/contenido/edit/Movimiento parabólico*'))active @endif">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Movimiento parabólico</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('introduccion.edit','Gravitación universal') }}" class="nav-link @if (request()->is('introduccion/contenido/edit/Gravitación universal*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Gravitación universal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('introduccion.edit','Movimiento circular') }}" class="nav-link @if (request()->is('introduccion/contenido/edit/Movimiento circular*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Movimiento circular</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('introduccion.edit','Dinámica lineal') }}" class="nav-link @if (request()->is('introduccion/contenido/edit/Dinámica lineal*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Dinámica lineal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('introduccion.edit','Trabajo y energía') }}" class="nav-link @if (request()->is('introduccion/contenido/edit/Trabajo y energía*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Trabajo y energía</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('ejercicios.index') }}" class="nav-link {{ request()->is('ejercicios*') ? 'active' : '' }}">
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
    <a href="{{ route('videos.index') }}" class="nav-link {{ request()->is('videos*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-video"></i>
        <p>Videos</p>
    </a>
</li>

<li class="nav-item @if(request()->is('diagnostico_finals*') || request()->is('lista_diagnosticos_final*'))menu-is-opening menu-open active @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-list-alt"></i>
        <p>Diagnóstico Final <i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('diagnostico_finals.index') }}" class="nav-link @if(request()->is('diagnostico_finals*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Diagnóstico Final</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('diagnostico_finals.lista_diagnosticos') }}" class="nav-link @if(request()->is('lista_diagnosticos_final*'))active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Diagnóstico Final Estudiantes</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a href="{{ route('reportes.estudiantes') }}" target="_blank" class="nav-link">
        <i class="nav-icon fa fa-list-alt"></i>
        <p>Lista de Estudiantes</p>
    </a>
</li>