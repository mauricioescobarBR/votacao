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
    <title>Reunião</title>
</head>

<body>
    <main class="border border-success">
        <section>
            <div class="container" id="tituloItem">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <h2><?= $reuniao->getDescricao() ?></h2>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="reuniao">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <p>Relator: <?= $reuniao->getModerador()->getNome() ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="reuniao">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                    <p>Data: <?= $reuniao->getData()->format('d/m/Y') ?> às <?= $reuniao->getHorario()->format('H:i:s') ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="reuniao">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <p>Status da reunião: <?= $statusReuniao ?></p>
                    </div>
                </div>
            </div>
        <section>
            <div class="container">
                <div class="row">
                    <?= form_open("set_status_reuniao") ?>
                        <input type="text" name="reuniao_id" value="<?= $reuniao->getId() ?>" />
                        <button type="submit" class="btn btn-info btn-lg">Abrir/Fechar Reunião</button>
                    <?= form_close() ?>
                </div>
            </div>
        </section>
    </main>
    <script src="bootstrap/js/bootstrap.min.js">
</body>

</html>
