<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Projeto</title>
</head>

<body>
    {{-- Menu Topo --}}
    <nav>
        <div class="container">
            <div class="nav-whapper">
                <a href="" class="brand-logo">Hemocentro de Campinas</a>
                <ul class="right">
                    <li><a href="#"></a>Imoveis</li>
                    <li><a href="#"></a>Cidades</li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Conteudo principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>
