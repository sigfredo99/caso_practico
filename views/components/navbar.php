<nav class="shadow navbar navbar-expand-lg navbar-dark p-0 bg-success bg-pattern" id="headerNav">
    <div class="container-fluid">
        <a class="navbar-brand d-block d-lg-none" href="#">
            <img src="assets/img/logo.png" height="80" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2" href="clients.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="banks.php">Bancos</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link mx-2" href="#">
                        <img src="assets/img/logo.png" height="80" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="channels.php">Canales</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION["recharge_deposit_user"]['name'] ?></a>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <p class="dropdown-item nav-item-navbar">Bienvenido, <?php echo $_SESSION["recharge_deposit_user"]['name'] ?></p>
                        </li>
                        <li><a class="dropdown-item nav-item-navbar" href="Actions/Auth/Logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    @media screen and (min-width:992px) {
        .nav-item {
            line-height: 80px;
        }

        .nav-item-navbar {
            line-height: 26px !important;
        }
    }
</style>