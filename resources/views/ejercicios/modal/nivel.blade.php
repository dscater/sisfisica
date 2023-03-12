<div class="mensaje_nivel oculto letrero1">
    <div class="letrero">
        <img src="{{ asset('imgs/partida/mascota.png') }}" class="mascota" alt="Mascota">
        <img src="{{ asset('imgs/partida/letrero1/mensaje.png') }}" class="mensaje" alt="Mensaje">
        <a href="{{ route('introduccion.menu_contenido') }}" class="apuntes">
            <img src="{{ asset('imgs/partida/apuntes.png') }}" alt="Apuntes">
        </a>
        <a href=""class="boton">
            <img src="{{ asset('imgs/partida/letrero1/nivel2.png') }}" onclick="incrementaNivel(event)" alt="Nivel 2">
        </a>
    </div>
</div>

<div class="mensaje_nivel oculto letrero2">
    <div class="letrero">
        <img src="{{ asset('imgs/partida/mascota.png') }}" class="mascota" alt="Mascota">
        <img src="{{ asset('imgs/partida/letrero2/mensaje.png') }}" class="mensaje" alt="Mensaje">
        <a href="{{ route('introduccion.menu_contenido') }}" class="apuntes">
            <img src="{{ asset('imgs/partida/apuntes.png') }}" alt="Apuntes">
        </a>
        <a href=""class="boton">
            <img src="{{ asset('imgs/partida/letrero2/nivel3.png') }}" onclick="incrementaNivel(event)" alt="Nivel 3">
        </a>
    </div>
</div>

<div class="mensaje_nivel oculto letrero3">
    <div class="letrero">
        <img src="{{ asset('imgs/partida/mascota.png') }}" class="mascota" alt="Mascota">
        <img src="{{ asset('imgs/partida/letrero3/mensaje.png') }}" class="mensaje" alt="Mensaje">
        <a href="{{ route('introduccion.menu_contenido') }}" class="apuntes">
            <img src="{{ asset('imgs/partida/apuntes.png') }}" alt="Apuntes">
        </a>
        <a href="{{ route('home') }}"class="boton">
            <img src="{{ asset('imgs/partida/letrero3/inicio.png') }}" alt="Inicio">
        </a>
    </div>
</div>
