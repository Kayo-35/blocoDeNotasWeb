<?php
extract($params);
require path("views/partials/header.php");
require path("views/partials/nav.php");
?>

<div class="container mt-3 w-100 w-sm-50">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Anotações</h1>
            <h2><?= $user["name"] ?></h2>
        </div>
        <a class="btn btn-info text-white h-25" href="/notas/criar-nota">
            <img class="img-fluid text-light" src="resources/img/create.svg">
        </a>
    </div>
    <?php !empty($notas)
        ? require path("views/partials/listaNotas.php")
        : view("responses/ops.view"); ?>
</div>
<?php require path("views/partials/footer.php"); ?>
