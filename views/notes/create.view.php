<?php
extract($params);
require(path("views/partials/header.php"));
require(path("views/partials/nav.php"));
?>
<h1 class="text-center mt-5 display-block">Escreva sua nota!</h1>
<div class="d-flex justify-content-center align-items-center mt-2">
    <form class="container w-50 border border-dark rounded p-4" method="POST">
        <div class="input-group mb-3">
            <label class="input-group-text bg-info" for="title">Título</label>
            <input id="title" name="title" class="bg-dark text-light form-control" placeholder="Nomeie sua nota">
        </div>
        <!-- Validação título -->
        <?php if(isset($erros['title'])) : ?>
            <p class="text-danger-emphasis fst-italic fs-6 mt-2"><?=$erros['title']?></p>
        <?php endif; ?>
        <div class="input-group">
            <label class="input-group-text bg-info" for="body">Anotação</label>
            <textarea id="body" name="body" class="bg-dark text-light form-control" placeholder="Libere sua criatividade..." required>
                <?= isset($_POST['body']) ? $_POST['body'] : '' ;?>
            </textarea>
        </div>
        <!--Trecho incluso para exibição de erros validatórios-->
        <?php if(isset($erros['body'])) : ?>
            <p class="text-danger-emphasis fst-italic fs-6 mt-2"><?=$erros['body']?></p>
        <?php endif; ?>

        <div class="d-flex justify-content-end">
            <button class="btn btn-info mt-1" type="submit">Criar</button>
        </div>
    </form>
</div>
<?php require(path("views/partials/footer.php")); ?>
