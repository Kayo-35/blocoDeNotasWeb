<?php
extract($params);
require path("views/partials/header.php");
require path("views/partials/nav.php");
?>
<!--Página de edição -->
<h1 class="text-center mt-5 display-block">Edite sua nota!</h1>
<div class="d-flex justify-content-center align-items-center mt-2">
    <form class="container w-50 border border-dark rounded p-4" method="POST">
        <div class="row">
            <div class="col-md-10">
                <div class="input-group mb-3">
                    <label class="input-group-text bg-light" for="title">Título</label>
                    <input id="title" name="title" class="bg-dark text-light form-control" placeholder="Nomeie sua nota" value="<?= htmlspecialchars(
                        $nota["title"]
                    ) ?>">
                </div>
                <!-- Validação título -->
                <?php if (isset($erros["title"])): ?>
                    <p class="text-danger-emphasis fst-italic fs-6 mt-2"><?= htmlspecialchars(
                        $erros["title"]
                    ) ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                    Tags
                </button>
                <ul class="dropdown-menu bg-dark text-light">
                    <?php foreach($tags as $tag) : ?>
                    <li>
                        <input name="tags[]" type="checkbox" class="ms-3 form-check-input" value="<?= $tag["id_tag"] ?>"
                            <?= in_array($tag["id_tag"],$tagsNota)  ? 'checked' : ''?>>
                        <label class="form-label">
                            <?= $tag["nm_tag"] ?>
                        </label>
                    </li>
                    <?php endforeach;?>
                </ul>
                <!-- Validação Tags -->
                <?php if (isset($erros["tags"])): ?>
                    <p class="text-danger-emphasis fst-italic fs-6 mt-2"><?= htmlspecialchars(
                        $erros["tags"]
                    ) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="input-group">
            <label class="input-group-text bg-light" for="body">Anotação</label>
            <textarea id="body" name="body" class="bg-dark text-light form-control" placeholder="Libere sua criatividade..." required>
                <?= htmlspecialchars($nota["body"]) ?>
            </textarea>
        </div>
        <!--Trecho incluso para exibição de erros validatórios-->
        <?php if (isset($erros["body"])): ?>
            <p class="text-danger-emphasis fst-italic fs-6 mt-2"><?= htmlspecialchars(
                $erros["body"]
            ) ?></p>
        <?php endif; ?>

        <input type="hidden" name="_method" value="patch">
        <div class="d-flex justify-content-between mt-2">
            <a class="btn btn-primary mt-1" href="/nota?id=<?= $_GET["id"] ?>">
                Cancelar
            </a>
            <button class="btn btn-warning mt-1" type="submit">EDITAR</button>
        </div>
    </form>
</div>
<?php require path("views/partials/footer.php"); ?>
