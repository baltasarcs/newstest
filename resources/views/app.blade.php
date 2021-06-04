<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <title>MyNews</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        body {
            font-family: sans-serif;
        }

        p {
            color: #666;
        }

        h2 {
            font-size: 2em;
            color: #003400;
            text-align: center;
        }

        .centered {
            margin: 0 auto;
            padding: 0 1em;
        }

        @media screen and (min-width: 52em) {
            .centered {
                max-width: 62em;
            }
        }

        /* Header */
        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.4;
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        #navbar {
            padding: 1rem;
            height: 2.0rem;
            background: #003400;
            color: #fff;
            margin-bottom: 1rem;
        }

        #navbar nav ul li {
            margin: 0.2rem 1.5rem;
        }

        #navbar nav ul li a {
            padding: 0.5rem 0.75rem;
        }

        #navbar nav ul li a:hover {
            background: #000;
            color: #fff;
            border-radius: 0.5em 0 0.5em 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar nav ul {
            display: flex;
        }

        #search {
            height: 1.8em;
            border-radius: 2em;
            background: #ecf0f1;
        }

        /* Cards */
        body {
            background: #ecf0f1;
            line-height: 1.4;
        }

        .site-title {
            color: white;
        }

        .card {
            background: white;
            margin-bottom: 2em;
            border-radius: 2em 0;
        }

        .card a {
            color: black;
            text-decoration: none;
        }

        .card a:hover {
            box-shadow: 6px 6px 8px hsl(0, 0%, 70%);
            border-radius: 2em 0;
        }

        .card-content {
            padding: 1.4em;
        }

        .card-content h2 {
            margin-top: 0;
            margin-bottom: .5em;
            font-weight: normal;
        }

        .card-content p {
            font-size: 95%;
        }

        img {
            width: 100%;
            height: auto;
        }

        .show {
            padding: 0 7em 1.2em;
        }

        .btn {
            font-size: 1.1em;
            color: #ecf0f1;
            border-radius: 0.5em 0;
            transition: transform .2s;
            cursor: pointer;
        }

        .btn:hover {
            transform: scale(1.1);
        }

        .green {
            background: #003400;
        }

        footer {
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: #003400;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            color: #ecf0f1;
        }

        /* Flexbox */
        @media screen and (min-width: 40em) {
            .cards {
                margin-top: -1em;
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
            }
            .card {
                margin-bottom: 1em;
                display: flex;
                flex: 0 1 calc(50% - 0.5em);
            }
        }

        @media screen and (min-width: 60em) {
            .cards {
                margin-top: inherit;
            }
            .card {
                margin-bottom: 2em;
                display: flex;
                flex: 0 1 calc(33% - 0.5em);
            }
        }

        .formnews {
            width: 30%;
            margin: 0px;
            padding: 30px;
            font-size: 20px;
        }
    </style>
    <body>
        <div>
            <header>
                <div class="header-container container">
                    <div class="navbar" id="navbar">
                        <h1 class="logo">News</h1>
                        <nav class="nav-links">
                            <ul>
                                <li><a href="/news/create">Cadastrar Noticias</a></li>
                                <li><a href="/news">Exibir Noticias</a></li>
                                <form action="search" method="GET">
                                    <input type="text" id="search" name="search" value="">
                                </form>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
            @yield('content')
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <footer><p>Desenvolvido por Baltasar Santos</p></footer>
        <div>
    </body>
</html>
