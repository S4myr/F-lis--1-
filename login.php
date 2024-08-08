<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../css/login1.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #5d86ad;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #43539c;
      --bs-btn-hover-border-color: #4e66a8;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #4e6da7;
      --bs-btn-active-border-color: #34578b;
      --bs-body-bg: #09233d;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>

</head>

<body>

  <<header data-bs-theme="dark">
    <?php include "navbar2.php" ?>
    </header>
    <br>

    <form method="post" action="../Fílis/autentica.php" class="box-login">
      <div class='container'>
        <div class='card'>
          <h1> Entrar </h1>

          <div id='msgError'></div>

          <div class='label-float'>
            <input type='email' id='email' name="email" paceholder='' required>
            <label id='userLabel' for='usuario'>E-mail</label>
          </div>

          <div class='label-float'>
            <input type='password' id='senha' name="senha" paceholder='' required>
            <label id='senhaLabel' for='senha'>Senha</label>
            <i class="fa fa-eye" aria-hiddem='true'></i>
            <script>
              let btn = document.querySelector(".fa-eye");

              btn.addEventListener("click", () => {
                let inputSenha = document.querySelector("#senha");

                if (inputSenha.getAttribute("type") == "password") {
                  inputSenha.setAttribute("type", "text");
                } else {
                  inputSenha.setAttribute("type", "password");
                }
              });
            </script>
          </div>

          <div class='justify-center'>
            <input type="submit" value="Entrar" class="button">
          </div>

          <div class='justify-center'>
            <hr>
          </div>
          <br>

          <p> Não tem uma conta?
            <a href='cadastro.php'> Cadastre-se</a>
          </p>

          <?php
          if (isset($_GET["erro"])) {
            echo "<div class=\"alert alert-danger mt-5 col-6\" role=\"alert\">Acesso Negado! Verifique usuário e senha</div>";
          }
          if (isset($_GET["sucesso"])) {
            echo "<div class=\"alert alert-success mt-5 col-6\" role=\"alert\">Cadastro realizado com sucesso!</div>";
          }
          ?>
        </div>

      </div>
    </form>
    <div vw class="enabled">
      <div vw-access-button class="active"></div>
      <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
      </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
      new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
</body>

</html>