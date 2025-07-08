<?php
    extract($params);
    require("partials/header.php");
    require("partials/nav.php");
?>

<div class="container mt-3">
    <h1><?= $nome ?></h1>
    <div class="d-flex justify-content-center">
        <img class="img-fluid rounded w-75" src="/resources/img/home.jpg">
    </div>
</div>

<?php require("partials/footer.php"); ?>
