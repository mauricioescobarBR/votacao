<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="C:/xampp/htdocs/votacao/instalacao-ci/application/views/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <!--CSS-->
    <style type="text/css">

        /*CSS dos botões*/
        input[type=checkbox] {
            height: 0;
            width: 0;
            visibility: hidden;
        }

        label {
            cursor: pointer;
            text-indent: -9999px;
            width: 50px;
            height: 26px;
            background: grey;
            display: block;
            border-radius: 100px;
            position: relative;
        }

        label:after {
            content: '';
            position: absolute;
            top: 2.5px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: #fff;
            border-radius: 90px;
            transition: 0.3s;
        }

        input:checked + label {
            background: #009045;
        }

        input:checked + label:after {
            left: calc(100% - 5px);
            transform: translatex(-100%);
        }

        label:hover:after {
            /*width: 50px;*/
        }

        /*CSS do navBar*/
        .navBarG {
            background-color: #009045;
        }

        /*CSS do container*/
        #contents {
            float: center;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            -webkit-box-shadow: #ccc 0 0 15px;
        }

        /*CSS do body*/
        body {
            background: #f4f4f4;
        }

        /*CSS do titulo*/
        #titulo {
            color: #666;
        }

    </style>

    <title>Reuniões</title>
</head>
<body class="bg-light">

<!--Navbar -->
<nav class="navBarG navbar navbar-expand-lg navbar-dark bg-gradient ">

    <div class="container">


        <a class="navbar-brand h1 mb-0" href="#">GURI</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSite">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#">ADMINISTRATIVO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ACADÊMICO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SISTEMA</a>
                </li>

            </ul>

            <form class="form-inline">
                <input class="form-control ml-4 mr-2" type="search" placeholder="Buscar...">
                <button class="btn btn-secondary" type="Submit">Ok</button>
            </form>

        </div>

    </div>

</nav>


<div class="row">
    <div>
        <hr>
    </div>
</div>

<!--Lista de reuniões-->
<div class="container bg-white" id="contents">

    <p id="titulo" class="text-center font-weight-bold text-secondary">Reuniões</p>


    <ul class="list-group">
        <li class="list-group-item">Cras justo odio
            <input type="checkbox" id="switch1"/><label for="switch1"></label>
        </li>
        <li class="list-group-item">Dapibus ac facilisis in
            <input type="checkbox" id="switch2"/><label for="switch2"></label>
        </li>
        <li class="list-group-item">Morbi leo risus
            <input type="checkbox" id="switch3"/><label for="switch3"></label>
        </li>
        <li class="list-group-item">Porta ac consectetur ac
            <input type="checkbox" id="switch4"/><label for="switch4"></label>
        </li>
        <li class="list-group-item">Vestibulum at eros
            <input type="checkbox" id="switch5"/><label for="switch5"></label>
        </li>
    </ul>
</div>

<div class="row">
    <div>
        <hr>
    </div>
</div>

<!--Rodapé-->
<div id="footer" class="container text-center">
    <a href="javascript:abrirDialog('ptl/sistema/centralDeAjuda',
                                        'dialog_modal_padrao', '500', '540',
                                        'Central de Ajuda',
                                        '',
                                        'dialog_modal_padrao')" class="text-success">
        <img src="https://guri.unipampa.edu.br/public/themes/moder//imgs/help_verde.png" alt="Central de Ajuda">
        Central de Ajuda</a> <br><br>
    Desenvolvido:
    <a href="http://www.dtic.unipampa.edu.br" target="_new" class="text-success">DTIC</a> -
    <a href="http://www.unipampa.edu.br" target="_new" class="text-success">Universidade Federal do Pampa</a> <br>


    <p class="center">
        <a href="http://validator.w3.org/check?uri=referer" target="_new">
            <img src="https://guri.unipampa.edu.br/public/themes/moder//imgs/valid-xhtml10-blue.png"
                 alt="Valid XHTML 1.0 Transitional" height="23" width="66">
        </a>
    </p>

</div>

</body>
</html>