<!--Lista de reuniões-->
<div class="container bg-white" id="contents">

    <?php foreach ($reunioes as $reuniao) {
            echo $reuniao->getId();
        } ?>
</div>