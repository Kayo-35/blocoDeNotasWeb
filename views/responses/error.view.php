<?php require ("views/partials/header.php")?>
<!--Página para indicar erros!-->
<div class="d-flex mt-5 justify-content-center">
    <div class="card bg-danger text-white text-center p-4 w-25">
        <div class="card-body">
            <div class="display-1 fw-body"><?=$code?></div>
            <h5 class="card-title mb-3">Descrição do Erro</h5>
            <p class="card-text mb-4"><i><?= $mensagem ?></i></p>
            <a href="/" class="btn btn-primary">HOME</a>
        </div>
    </div>
</div>
<?php require("views/partials/footer.php")?>
