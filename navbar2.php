<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark " style="background-image: url('../php/imagens/fundo.png'); background-repeat: repeat-x;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../php/imagens/filis.png" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../php/inicio.php" style="color: rgb(77, 57, 35);">INÍCIO</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-DARK dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: rgb(77, 57, 35);">
                        ANIMAIS
                    </a>
                    <ul class="dropdown-menu" style="background-color: white;">
                        <li><a class="dropdown-item" href="../php/animais.php?categoria=gato" style="color: rgb(77, 57, 35);">GATOS</a></li>
                        <li><a class="dropdown-item" href="../php/animais.php?categoria=cachorro" style="color: rgb(77, 57, 35);">CACHORROS</a></li>
                        <li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                </li>
                <li><a class="dropdown-item text-DARK" href="../php/acessorio.php" style="color: rgb(77, 57, 35);">ACESSÓRIOS</a></li>
            </ul>
            <li class="nav-item">
                <a class="nav-link text-DARK" href="../php/doacoes.php" style="color: rgb(77, 57, 35);">DOAÇÕES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-DARK" href="../php/blog.php" style="color: rgb(77, 57, 35);">BLOG</a>
            </li>
            </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2 btn btn-outline-dark" type="search" placeholder="Pesquisa" aria-label="Pesquisa" style="background-color: white; color: black;">
                <button class="btn btn-outline-dark" type="submit">Pesquisar</button>
            </form>

        </div>
    </div>
</nav>