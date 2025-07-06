<?php
    extract($params);
    require("partials/header.php");
    require("partials/nav.php");
?>

<div class="container mt-3">
    <h1>Pagina <?= $nome ?></h1>
    <p>Olá Mundo</p>
</div>

<?php require("partials/footer.php"); ?>
