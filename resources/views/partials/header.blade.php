<header>
        <center>
        <h1>La Tiendita Digital</h1>
        </center>
    <!-- Menú de navegación -->
    <div class="container">
        <ul class="nav nav-pills">
            <a class="navbar-brand" href="/">
                <img src="icons/logo.png" alt="Logo" style="max-height: 40px;">
            </a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Menú</a>
                <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Alimentos Y Despensa</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Harina Y Reposteria</a></li>
                            <li><a class="dropdown-item" href="#">Cereales, Granolas Y Avena</a></li>
                            <li><a class="dropdown-item" href="#">Sopas Y Pastas</a></li>
                            <li><a class="dropdown-item" href="#">Aceites De Cocina</a></li>
                            <li><a class="dropdown-item" href="#">Pan Y Tostadas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Bebidas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Jugos Y Nectares</a></li>
                            <li><a class="dropdown-item" href="#">Energéticos Y Hidratantes</a></li>
                            <li><a class="dropdown-item" href="#">Agua</a></li>
                            <li><a class="dropdown-item" href="#">Refresco</a></li>
                        </ul>
                    </li>        
                </ul>
                
                <li class="nav-item dropdown">
                @if(session()->has('usuario'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            Bienvenido, {{ session('usuario')['nombre'] ?? 'Usuario' }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/perfil">Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="#" onclick="cerrarSesion(event)">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Bienvenido</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/login">Iniciar Sesión</a></li>
                            <li><a class="dropdown-item" href="/registro">Registrarse</a></li>
                        </ul>
                    </li>
                @endif
                </li>            
                    <input class="form form-control me-2" type="search" placeholder="Coca cola, Leche, Maizena..." aria-label="Search">
                    <button class="btn" type="submit">Buscar</button>
                <a class="navbar-brand" href="carritocompras">
                <img src="icons/cart.svg" alt="Carrito De Compras">
                 </a>
            </li>
        </ul>
    </div>
</header>
