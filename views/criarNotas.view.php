<?php
require("views/partials/header.php");
require("views/partials/nav.php");
?>
<h1 class="text-center mt-5">Escreva sua nota!</h1>
<div class="d-flex justify-content-center align-items-center mt-2">
    <form class="container w-50" method="POST">
        <div class="input-group">
            <label class="input-group-text bg-info" for="body">Anotação</label>
            <textarea id="body" name="body" class="bg-dark text-light form-control" placeholder="Libere sua criatividade..." required></textarea>
        </div>
                <div class="d-flex justify-content-end">
            <button class="btn btn-info mt-2" type="submit">Criar</button>
        </div>
    </form>
</div>
<?php require("views/footer.php"); ?>
