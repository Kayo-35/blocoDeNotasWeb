<?php
require("views/partials/header.php");
require("views/partials/nav.php");
?>

<div class="container mt-5 w-100 w-sm-50">
    <div class="text-center mb-3">
        <h1>Anotações</h1>
        <h2><?= $user['name'] ?></h2>
    </div>
    <?php !empty($notas) ? require("views/partials/listaNotas.php") : require("views/ops.php"); ?>
</div>
<?php require("views/partials/footer.php"); ?>
