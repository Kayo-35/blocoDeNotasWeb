<?php
require("views/partials/header.php");
require("views/partials/nav.php");
?>

<div class="container mt-5 w-25">
    <h1 class="text-center">Anotações: <?= $user['name'] ?></h1>
    <?php !empty($notas) ? require("views/partials/notas.php") : ""; ?>
</div>
<?php require("views/partials/footer.php"); ?>
