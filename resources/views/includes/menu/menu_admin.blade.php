<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Usuarios</p>
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
    <a href="{{ route('carreras.index') }}" class="nav-link {{ request()->is('carreras*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list-alt"></i>
        <p>Carreras</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('paralelos.index') }}" class="nav-link {{ request()->is('paralelos*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list-alt"></i>
        <p>Paralelos</p>
    </a>
</li>
