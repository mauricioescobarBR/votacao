<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Open Sans -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom CSS -->
    <?php echo assets_css('styles.css') ?>

    <title>Reuniões</title>
</head>
<body class="bg-light">

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

<!--Lista de reuniões-->
<div class="container bg-white" id="contents">

    <div class="bottom-30">
        <h2 id="titulo" class="text-center font-weight-bold text-secondary app-h2">Reuniões</h2>
        <p id="descricao" class="text-center font-weight-bold text-secondary app-h2-description">
            Clique no botão para abrir uma reunião para os membros poderem se registrar.</p>
    </div>

    <form id="form_reuniao">
        <div class="list-group">
            <?php foreach ($reunioes as $reuniao): ?>

                <div class="list-group-item list-group-item-action d-flex
                    justify-content-between align-items-center">
                    <span><?php echo $reuniao->getDescricao() ?> <span
                                class="badge <?php echo $reuniao->getEstaAberta() ? "badge-success" : "badge-secondary"; ?>"><?php echo $reuniao->getEstaAberta() ? "Aberta" : "Fechada"; ?></span></span>
                    <!--<input type="checkbox" id="switch4"/><label class="no-margin" for="switch4"></label>-->
                    <a href="" data-toggle="modal"
                       onclick="confirm_reuniao_modal('<?php echo route('abrir_reuniao', $reuniao->getId()); ?>','<?php echo $reuniao->getDescricao() ?>', '<?php echo $reuniao->getEstaAberta() ? "entrar" : "abrir"; ?>');"
                       data-target="#reuniao_modal" <?php echo $reuniao->getEstaAberta() ? "" : "disabled"; ?>
                       role="button" aria-disabled="<?php echo $reuniao->getEstaAberta() ? "false" : "true"; ?>"
                       class="btn <?php echo $reuniao->getEstaAberta() ? "btn-outline-success" : "btn-outline-secondary disabled"; ?> btn-reuniao">
                        Entrar na Reunião
                    </a>
                </div>

            <?php endforeach; ?>
        </div>

        <div id="reuniao_modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="is_open"></span> na Reunião</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza de que deseja <span class="is_open font-weight-bold"></span> a reunião "<span
                                    class="grt font-weight-bold"></span>"</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="reuniao_abrir_link" class="btn btn-success" formaction=""
                                formmethod="post">Confirmar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<?php echo assets_js('main.js') ?>
</body>
</html>