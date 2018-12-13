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
<body ng-controller="EncaminhamentoController as vm">
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

                                    <div class="row">
                                        <div class="text-campo col-md-12 ">
                                            <p class="required-txt bottom-30">* Campos obrigatórios</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><label class="app-label">Descrição do
                                                Item</label></div>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>
                                                    <p class="app-label-description bottom-30">
                                                        <?php echo $item->getDescricao() ?>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><label
                                                    class="app-label">Relator</label></div>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>
                                                    <p class="app-label-description bottom-30"><?php echo $item->getRelator() ?>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><label class="app-label">Tipos de
                                                Item de Voto *</label></div>
                                        <div class="col-md-12">
                                            <p class="app-label-description bottom-30">Selecione o tipo de
                                                item de voto <b>padrão</b> ou <b>customizado</b></p></div>
                                        <div class="bottom-30 col-md-6 ">
                                            <div>
                                                <a ng-click="vm.opcao = 'PADRAO'" class="app-option default"
                                                   ng-class="{'app-option-selected': vm.opcao == 'PADRAO'}">PADRÃO</a>
                                            </div>
                                        </div>
                                        <div class="bottom-30 col-md-6 ">
                                            <div>
                                                <a ng-click="vm.opcao = 'CUSTOMIZADO'" class="app-option custom"
                                                   ng-class="{'app-option-selected': vm.opcao == 'CUSTOMIZADO'}">CUSTOMIZADO</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="padrao" class="row bottom-30" ng-show="vm.opcao == 'PADRAO'">
                                        <div class="col-md-3"><label class="label-opt-padrao">Favorável</label></div>
                                        <div class="col-md-3"><label class="label-opt-padrao">Contrário</label></div>
                                        <div class="col-md-3"><label class="label-opt-padrao">Abstenção</label></div>
                                    </div>

                                    <div id="txt-customizado" class="col-md-12" ng-show="vm.opcao == 'CUSTOMIZADO'">
                                        <p class="app-label-description bottom-30" id="text-custom">No tipo Customizado
                                            você deve
                                            inserir as opções de voto, sendo a opção
                                            <b>Abstenção</b> adicionada automaticamente ao disponibiizar o item:</p>
                                    </div>

                                    <div id="customizado" class="row" ng-show="vm.opcao == 'CUSTOMIZADO'">
                                        <div class="col-md-12"><label class="app-label">Opção de Voto *</label></div>
                                        <div class="col-md-12">
                                            <p class="app-label-description">Adicione suas opções de voto para o item de
                                                pauta</p></div>
                                        <div class="col-md-10">
                                            <div class="form-group ">
                                                <input name="input-opt" type="text" ng-model="vm.itemDeVoto.descricao"
                                                       class="form-control app-input bottom-30">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-default btn-add bottom-30"
                                                    ng-click="vm.adicionaItem()">
                                                <span>ADD</i></span></button>
                                        </div>
                                    </div>

                                    <div id="form:j_idt64" class="bottom-30 col-md-12"
                                         style="padding-left: 0; padding-right: 0;" ng-show="vm.opcao == 'CUSTOMIZADO'">
                                        <div id="form:opt-lista" class="ui-datalist ui-widget encaminhamentos-itens">
                                            <div class="ui-datalist-header ui-widget-header ui-corner-top">
                                                OPÇÕES
                                            </div>
                                            <div id="form:opt-lista_content"
                                                 class="ui-datalist-content ui-widget-content">
                                                <ol id="form:opt-lista_list" class="ui-datalist-data">
                                                    <li class="ui-datalist-item"
                                                        ng-repeat="itemDeVoto in vm.itensDeVoto track by $index">

                                                        <span class="opt-item" ng-click="vm.itemDeVoto = itemDeVoto">
                                                            {{itemDeVoto.descricao}}
                                                        </span>

                                                        <a id="form:opt-lista:0:j_idt67" name="form:opt-lista:0:j_idt67"
                                                           class="btn btn-default excluir-item"
                                                           ng-click="vm.remove(itemDeVoto)">
                                                            X
                                                        </a>
                                                    </li>
                                                    <li ng-hide="vm.itensDeVoto.length" class="ui-datalist-item">
                                                        <span class="opt-item">Nenhum Item Adicionado</span>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="form:j_idt68" class="row" ng-show="vm.opcao == 'CUSTOMIZADO'">
                                        <div id="form:j_idt69" class="col-md-12">
                                            <div id="form:j_idt70" class="bottom-30 col-md-12 "><label
                                                        for="form:segundo-turno" class="app-label">Votação com Segundo
                                                    Turno? *</label>

                                                <div class="pretty p-switch p-fill" style="margin-left: 20px"><input
                                                            id="form:segundo-turno" type="checkbox"
                                                            name="form:segundo-turno" checked="checked">
                                                    <div class="state p-success"><label id="form:segundo-turno-label">Sim</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button"
                                                    class="btn btn-success button1 bottom-30"
                                                    onclick="$('.modalConfirmaEncaminhamento').modal()"
                                                    onclick="$('.modalConfirmaEncaminhamento').modal()"
                                                    ng-click="vm.envia()">Enviar para
                                                Votação
                                            </button>
                                        </div>

                                        <div class="col-md-6">
                                            <button type="button"
                                                    class="btn btn-default button1 bottom-30"
                                                    onclick="$('.modalCancelar').modal()"
                                                    onclick="$('.modalCancelar').modal()">Cancelar
                                            </button>
                                        </div>
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