<?php
require("views/partials/header.php");
require("views/partials/nav.php");
?>
<div class="d-flex justify-content-center row mt-5">
    <?php foreach($lista as $notas) : ?>
        <div class="col-md-6 col-sm-12 w-25">
            <div class="card">
                <div class="card-header text-bg-dark">
                    Anotação: <?= $notas['id_nota'] ?>
                </div>
                <div class="card-body text-bg-info">
                    <h5><?= $notas['dt_nota'] ?></h5>
                    <p>
                        <?= $notas['body'] ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?php require("views/partials/footer.php")?>
