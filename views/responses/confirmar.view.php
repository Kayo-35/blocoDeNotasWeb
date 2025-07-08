<?php
extract($params);
require path("views/partials/header.php");
?>
<!--Página para indicar confirmação de solicitcações bem sucedidas!-->
<div class="d-flex mt-5 justify-content-center">
    <div class="card bg-success text-white text-center p-4 w-25">
        <div class="card-body">
            <h4 class="card-title mb-3"><?= $titulo ?><h4>
            <div class="container">
                <img class="w-50" src="/resources/img/confirm.svg">
            </div>
            <a href="<?= $path ?>" class="btn btn-primary mt-3">VOLTAR</a>
        </div>
    </div>
</div>
<?php
require path("views/partials/footer.php");
die();


?>
