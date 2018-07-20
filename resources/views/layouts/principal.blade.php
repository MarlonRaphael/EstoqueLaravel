<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Controle de estoque</title>

        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
              integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <nav class="navbar sticky-top navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="" class="navbar-brand">
                            Estoque Laravel
                        </a>
                    </div>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a href="{{ action('ProdutoController@lista') }}" class="nav-link">Listagem</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php Auth::logout() ?>" class="nav-link">Novo</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('LoginController@logout') }}" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('conteudo')

            <footer class="footer">
                <p>© Livro de Laravel da Casa do Código</p>
            </footer>

        </div>
    </body>
</html>