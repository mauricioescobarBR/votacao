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
                        <h2>Item de pauta</h2>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="reuniao">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <p>Donec fermentum, ante in tempus accumsan, velit ipsum lacinia enim, a interdum enim enim id metus. Aliquam vitae accumsan neque. Etiam nibh metus, suscipit vel erat iaculis, aliquet elementum metus. Curabitur ultricies risus quis tortor blandit cursus et id turpis.</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="opcaoItem">
                <div class="row">
                    <div class="col-md-10 offset-md-2">
                        <h6>Escolha uma opção de voto</h6>
                        <form>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadio1">Opção de voto padrão</label>
                            </div>
                            <div class="custom-control custom-radio" id="radiocustomizado">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Opção de voto customizado</label>
                            </div>
                        </form>
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
                        <input class="form-control" type="text" placeholder="Digite a opção de voto">
                        <button type="button" class="btn btn-success" id="btn-salvar">Salvar</button>
                    </div>
                </div>
                <div id="list-itens" class="row">
                    <div class="col-md-8 offset-2">
                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Opções de voto</th>
                                    <th class="actions">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                                    <td class="actions">
                                        <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                                    <td class="actions">
                                        <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                                    <td class="actions">
                                        <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="btn-enviarItem">
                <div class="row">
                    <div class="col-md-6 offset-md-3 d-flex justify-content-center ">
                        <button type="button" class="btn btn-success btn-lg btn-block">Enviar item para a votação</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="bootstrap/js/bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $("#item-customizado").hide();
            $("#customRadio1").click(function() {
                $("#item-padrao").show("slow");
                $("#item-customizado").hide("slow");
            });
            $("#customRadio2").click(function() {
                $("#item-customizado").show("slow");
                $("#item-padrao").hide("slow");
            });
        });
    </script>
</body>

</html>
