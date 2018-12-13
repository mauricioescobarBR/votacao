<!DOCTYPE html>
<html lang="pt-br" ng-app="app">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Open Sans -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/angular-spinkit@0.3.4/build/angular-spinkit.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>

    <!-- Custom CSS -->
    <?php echo assets_css('styles.css') ?>

    <title>Disponibilizar Item de Pauta</title>
</head>
<body ng-controller="VotarItemDePautaController as vm">
<nav class="navbar-grey navbar navbar-expand-lg navbar-dark">

    <div class="row margin-left">
        <a class="navbar-brand h1 mb-0 logo" href="#">
            <?php echo assets_img('logo.png') ?>
        </a>
</nav>
<!--Navbar -->
<nav class="navbar-green navbar navbar-expand-lg navbar-dark bottom-30">

    <div class="row margin-left">

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

        </div>

    </div>

</nav>

<div class="container">

    <div class="row">
        <div class="col-md-10 offset-md-1">

            <div class="panel-group">
                <div class="app-panel panel panel-default">
                    <div class="panel-collapse collapse in">
                        <div class="panel-body">

                            <form id="form" name="form" method="post">
                                <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 offset-1">

                                    <div class="bottom-30">
                                        <h2 id="titulo" class="text-center font-weight-bold text-secondary app-h2">
                                            Disponibilizar Item de Pauta</h2>
                                        <p id="descricao"
                                           class="text-center font-weight-bold text-secondary app-h2-description">
                                            Disponibilize um item de pauta para ser votado pelos membros da sua
                                            comissão.</p>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.4/socket.io.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/angular-spinkit@0.3.4/build/angular-spinkit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/ui-bootstrap4@3.0.5/dist/ui-bootstrap-3.0.5.min.js"></script>

<?php echo assets_js('angular-socket-io-master/socket.min.js') ?>
<?php echo assets_js('main.js') ?>
</body>
</html>