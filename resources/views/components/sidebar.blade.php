<div class="sideBar">
    <div class="top">
        <div class="logo">
            <div id="logotipo">
                {{-- <img src="img/logo.jpg" class="logoImg"></img> --}}
            </div>
            <span>Taller de Soporte</span>
        </div>
    </div>

    <div class="usuario">
        <img src="iconosFuente/user.png" alt="usuario" class="usuarioImg">
        <div>
            <p class="bold">{{ auth()->user()->name }}</p>
            <p class="email">{{ auth()->user()->email }}</p>
        </div>
    </div>

    <!-- Botones -->
    <ul>
        <li>
            <a href="/">
                <span id="icons" class="material-symbols-outlined">home</span>
                <span class="navItem">Inicio</span>
            </a>
        </li>

        <li>
            <a href="{{ route('category.index') }}">
                <span id="icons" class="material-symbols-outlined">category</span>
                <span class="navItem">Categorias</span>
            </a>
        </li>

        <li>
            <a href="{{ route('products.index') }}">
                <span id="icons" class="material-symbols-outlined">laptop</span>
                <span class="navItem">Equipos</span>
            </a>
        </li>

        <li>
            <a href="{{ route('product.products') }}">
                <span id="icons" class="material-symbols-outlined">sync_saved_locally</span>
                <span class="navItem">Equipos Listos</span>
            </a>
        </li>

        <li>
            <a href="{{ route('users.index') }}">
                <span id="icons" class="material-symbols-outlined">person</span>
                <span class="navItem">Usuarios</span>
            </a>
        </li>

        <li>
            <a href="{{ route('logout') }}">
                <span id="icons" class="material-symbols-outlined">logout</span>
                <span class="navItem">Salir</span>
            </a>
        </li>

    </ul>
</div>
