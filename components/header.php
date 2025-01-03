<header>
    <nav>
        <ul>
            <li class="nav-button"><a href="./index.php">Inicio</a></li>
            <li class="nav-button"><a href="./products.php">Productos</a></li>
        </ul>
        <a href="./index.php"><img src="./images/brand-page.svg" alt="Página principal"></a>
        <ul>
            <?php if (isset($_SESSION['user_alias'])): ?>
                <li class="title">
                    <a href="#">
                        <img src="./images/profile.svg" alt="Perfil">
                        <p><?= htmlspecialchars($_SESSION['user_alias']) ?></p>
                        <img src="./images/arrow-down.svg" alt="">
                    </a>
                    <ul class="dropdown-menu">
                        <li class="profile">
                            <div class="profile-photo">
                                <img src="./images/profile.svg" alt="">
                            </div>
                            <div class="name">
                                <h1><?= htmlspecialchars($_SESSION['user_alias']) ?></h1>
                                <h3 class="role"><?= htmlspecialchars($_SESSION['user_role']) ?></h3>
                            </div>
                        </li>
                        <li class="item">
                            <h2 class="title">Cuenta</h2>
                            <ul class="dropdown-inner-menu">
                                <li class="item">
                                    <a href="./profile.php">
                                        <img src="./images/user.svg" alt="Perfil de usuario">
                                        <p>Perfil</p>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="./wish.list.php">
                                        <img src="./images/cart.svg" alt="Lista de deseos">
                                        <p>Lista de deseos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="item">
                            <h2 class="title">Ajustes</h2>
                            <ul class="dropdown-inner-menu">
                                <li class="item">
                                    <a href="./settings.php">
                                        <img src="./images/settings.svg" alt="Ajustes">
                                        <p>Ajustes</p>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="./security.php">
                                        <img src="./images/lock.svg" alt="Seguridad">
                                        <p>Seguridad</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="item">
                            <a href="./database/logout.php">
                                <img src="./images/logout.svg" alt="Cerrar sesión">
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="./logIn.php">Iniciar sesion</a></li>
            <?php endif; ?>
            <li class="shopping-cart"><a href="./cart.php"><img src="./images/shopping-cart.svg" alt="Carrito de compras"></a></li>
            <li class="nav-button"><a href="./contact.php">Contacto</a></li>
        </ul>
    </nav>
</header>
<script>
    /**
     * Cambia el botón de navegación activo en función del archivo actual de la URL.
     * La función determina el archivo actual basado en la ruta de la URL, compara el nombre del archivo
     * con casos predefinidos ('index.php', 'products.php', 'contact.php') y asigna la clase 'active'
     * al botón de navegación correspondiente.
     *
     * El método busca todos los elementos con la clase 'nav-button' y activa el primero que coincide
     * con el archivo actual. Si no se encuentra un archivo que coincida, no se realiza ningún cambio.
     *
     * Esta función se utiliza típicamente para resaltar el botón de navegación correspondiente a la
     * página actual del usuario.
     *
     * @function changeNav
     */
    function changeNav() {
        let file = window.location.pathname.split('/').pop();
        let navButtons = document.querySelectorAll('.nav-button');
        let activeButton;
        switch (file) {
            case 'index.php':
                activeButton = navButtons[0];
                break;
            case 'products.php':
                activeButton = navButtons[1];
                break;
            case 'contact.php':
                activeButton = navButtons[2];
                break;
        }
        if (activeButton) {
            activeButton.classList.add('active');
        }
    }
    changeNav()
</script>