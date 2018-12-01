<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="" crossorigin="anonymous"></script>
    
    <link href="style.css" rel="stylesheet">
    <title>Encaminhamento</title>
</head>

<body>
    <main class="border border-success">
        <section>
            <div class="container" id="tituloItem">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <h2><?= $idp->getDescricao() ?></h2>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="reuniao">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <p>Relator: <?= $idp->getRelator() ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="opcaoItem">
                <div class="row">
                    <div class="col-md-10 offset-md-2">
                        <h6>Escolha uma opção de voto</h6>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadio1">Opção de voto padrão</label>
                            </div>
                            <div class="custom-control custom-radio" id="radiocustomizado">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Opção de voto customizado</label>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="item-padrao">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <ul class="list-group" class="lista-padrao">
                            <li class="list-group-item">À favor</li>
                            <li class="list-group-item">Contra</li>
                            <li class="list-group-item">Abstenção</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container" id="item-customizado">
                <div class="row">
                    <div class="input-group col-md-7 col-sm- offset-2 btn-salvarItemCustomizado">
                        <input class="form-control" type="text" id="opcaovoto" placeholder="Digite a opção de voto">
                        <button type="button" class="btn btn-success" id="btn-salvar">Salvar</button>
                    </div>
                </div>
                <div id="list-itens" class="row">
                    <div class="col-md-8 offset-2">
                        <table class="table table-striped" cellspacing="0" cellpadding="0">

                            <?= form_open('/set_encaminhamentos') ?>

                            <thead>
                                <tr>
                                    <th>Opções de voto</th>
                                    <th class="actions">Ação</th>
                                </tr>
                            </thead>
                            <tbody id="lista-encaminhamentos">
                                <tr>
                                    <td class="texto_encam_pers-1">Abstenção</td>
                                    <td class="actions">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- FORMULÁRIO -->
        <section>
            <input type="hidden" name="item_pauta_id" value="<?= $idp->getId() ?>" />
            <input type="text" name="tipo_encam" value="simples" id="tipo_encam"/>
            <input type="text" name="encam_personalizados" value="" id="encam_personalizados"/>
            <div class="container" id="btn-enviarItem">
               <!--


                <div class="row">
                    <div class="col-md-6 offset-md-3 d-flex justify-content-center ">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Enviar item para a votação</button>
                    </div>
                </div>


                -->
            </div>
            <?= form_close() ?>
        </section>
        <!-- FORMULÁRIO -->
    </main>
    <script src="bootstrap/js/bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $("#item-customizado").hide();
            $("#customRadio1").click(function() {
                $("#item-customizado").hide(1);
                $("#item-padrao").show(1);
                $("#tipo_encam").val("simples");
            });
            $("#customRadio2").click(function() {
                $("#item-customizado").show(1);
                $("#item-padrao").hide(1);
                $("#tipo_encam").val("personalizado");
            });
            $("#btn-salvar").click( function() {
                if($("#opcaovoto").val() !== ''){
                    $("#lista-encaminhamentos").append(
                        adicionaItem(
                            $("#opcaovoto").val().trim()
                        )
                    );
                    $("#opcaovoto").val('');
                    updateResultados();
                }
            });

            function updateResultados(){
                $("#encam_personalizados").val(
                   $(".texto_encam_pers").text()
                );
            }

            function adicionaItem(texto){
               return "<tr><td class='texto_encam_pers'>" + texto + " </td><td class='actions'><a class='btn btn-danger btn-xs btn-delete' href='#' onclick='$(this).closest(\"tr\").remove(); $(\"#encam_personalizados\").val( $(\".texto_encam_pers\").text());' data-toggle='modal' data-target='#delete-modal'>Excluir</a></td></tr>";
            }
        });

    </script>
</body>

</html>
