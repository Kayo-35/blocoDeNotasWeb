<?php
require("views/partials/header.php");
require("views/partials/nav.php");
?>

<div class="container mt-3">
    <h1>Anotações</h1>
    <p>
        <?= varStats($db);?>
    </p>
</div>

<?php require("views/partials/footer.php"); ?>
