<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">PHP para Iniciantes</a>
        <button
            class="navbar-toggler"
            type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= isUrl("/")
                        ? "active"
                        : "" ?>" href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <?php if ($_SESSION["user"] ?? false): ?>
                        <a class="nav-link <?= isUrl("/notas") ||
                        str_starts_with($url, "/notas/")
                            ? "active"
                            : "" ?>" href="/notas">Anotações</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isUrl("/about")
                        ? "active"
                        : "" ?>" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isUrl("/contact")
                        ? "active"
                        : "" ?>" href="/contact">Contato</a>
                </li>
                <li class="nav-item">
                    <?php if (!$_SESSION["user"] ?? true): ?>
                        <a class="nav-link <?= isUrl("/registrar/cadastrar")
                            ? "active"
                            : "" ?>" href="/registrar/cadastrar">Registrar-se</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
