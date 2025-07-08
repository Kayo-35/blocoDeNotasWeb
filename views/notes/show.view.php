<?php
extract($params);
require path("views/partials/header.php");
require path("views/partials/nav.php");
?>
<div class="d-flex justify-content-center row mt-5">
    <div class="
        col-md-6
        col-sm-12
        w-25"
    >
        <div class="card">
            <div class="d-flex justify-content-between align-items-center card-header text-bg-dark">
                <span>Anotação:</span>
                <form method="POST">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id_nota" value="<?= $lista[
                        "id_nota"
                    ] ?>">
                    <button class="btn btn-outline-danger btn-sm">DELETAR</button>
                </form>
            </div>
            <div class="card-body text-bg-info">
                <h5><?= $lista["dt_nota"] ?></h5>
                <p>
                    <?= htmlspecialchars($lista["body"]) ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-3">
    <a href="/notas" class="btn btn-info">Voltar</a>
</div>
<?php require path("views/partials/footer.php"); ?>
