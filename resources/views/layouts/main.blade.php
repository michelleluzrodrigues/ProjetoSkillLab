<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!--especifica a codificação de caracteres usados -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- usado para sites que foram desenvolvidos para serem responsivos -->
    <meta name="creator" content="Michelle Luz Rodrigues">
    <meta name="author" content="Michelle Luz Rodrigues">
    <meta name="robots" content="index"> <!--  indxe esta página e exiba em seus resultados de busca -->
    <meta name="description" content="Cadastro Produtos"> <!-- Palavra chave que podem ser mostrada nso resultados de busca -->
    <meta http-equiv="content-language" content="pt-br">
    <!--atributo define o idioma padrão da página web-->
    <meta property="og:locale" content="pt_BR">
    <!--Este valor define o idioma da publicação-->
    <meta property="og:title" content="Cadastro Produtos">
    <!--define o título da página -->
    <meta property="og:site_name" content="Cadastro Produtos">
    <!--define o nome do site-->
    <meta property="og:image" content="www.seusite.com.br/img.jpg">
    <!--Serve para apresentar a imagem que representa a publicação -->

    <!-- Social: Twitter -->
    <meta name="twitter:card" content="summary"> <!-- aqui fica o tipo de card -->
    <meta name="twitter:site" content="@email_html"> <!-- twitter handler do site -->
    <meta name="twitter:title" content="Título do Post">
    <meta name="twitter:description" content="Descrição do post">
    <meta property="twitter:image:src" content="link da imagem">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cadastro</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard">Produtos</a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
                </form>
            </li>
            @endauth

            @guest
            <li class="nav-item">
                <a class="nav-link" href="/login">Entrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Cadastrar</a>
            </li>
            @endguest

        </ul>
    </nav>
    @yield('content')


    <footer>
        <div class="footerTexto">
            <p class="text-center"> &copy; Copyright <?php auto_copyright("2020"); ?>

            </p>
        </div>
        <?php function auto_copyright($year = 'auto')
        { ?>
            <?php if (intval($year) == 'auto') {
                $year = date('Y');
            } ?>
            <?php if (intval($year) == date('Y')) {
                echo intval($year);
            } ?>
            <?php if (intval($year) < date('Y')) {
                echo intval($year) . ' - ' . date('Y');
            } ?>
            <?php if (intval($year) > date('Y')) {
                echo date('Y');
            } ?>
        <?php } ?>

    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>

</html>