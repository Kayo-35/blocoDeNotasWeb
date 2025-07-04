<?php
require("views/partials/header.php");
require("views/partials/nav.php");
?>
<div class="d-flex justify-content-center row mt-5">
    <div class="
        col-md-6
        col-sm-12
        w-25"
    >
        <div class="card">
            <div class="card-header text-bg-dark">
                Anotação:
            </div>
            <div class="card-body text-bg-info">
                <h5><?= $lista['dt_nota'] ?></h5>
                <p>
                    <?= $lista['body'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-3">
    <a href="/notas" class="btn btn-info">Voltar</a>
</div>
<?php require("views/partials/footer.php")?>
