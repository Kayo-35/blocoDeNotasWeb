<?php require ("partials/header.php")?>
<!--Página para indicar erros!-->
<div class="d-flex mt-5 justify-content-center">
    <div class="card bg-danger text-white text-center p-4 w-25">
        <div class="card-body">
            <div class="display-1 fw-body"><?=$code?></div>
            <h5 class="card-title mb-3">Página não encontrada</h5>
            <p class="card-text mb-4">A URL acessada não corresponde a nenhuma rota válida.</p>
            <a href="/" class="btn btn-primary">HOME</a>
        </div>
    </div>
</div>
<?php require("partials/footer.php")?>
