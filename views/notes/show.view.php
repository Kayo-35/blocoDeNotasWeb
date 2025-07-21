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
                <div class="d-flex justify-content-between">
                    <?php foreach ($tags as $tag) :?>
                    <div class="border border-light rounded-end-5 bg-success px-2 mx-1">
                        <img src="resources/img/tag.svg" alt="">
                        <span><?= $tag["nm_tag"] ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="card-body text-bg-info">
                <h5><?= $lista["dt_nota"] ?></h5>
                <p>
                    <?= htmlspecialchars($lista["body"]) ?>
                </p>
            </div>
            <div class="card-footer bg-dark">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-outline-warning btn-sm" href="/nota/editar?id=<?= $lista[
                        "id_nota"
                    ] ?>">EDITAR</a>
                    <form method="POST">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="id_nota" value="<?= $lista[
                            "id_nota"
                        ] ?>">
                            <button class="btn btn-outline-danger btn-sm">DELETAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-3">
    <a href="/notas" class="btn btn-info">Voltar</a>
</div>
<?php require path("views/partials/footer.php"); ?>
