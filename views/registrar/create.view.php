<?php
extract($params);
require path("views/partials/header.php");
require path("views/partials/nav.php");
?>
<section class="row justify-content-center mx-4">
<div class="col-md-3 bg-light border rounded p-4 mt-5">
    <h3 class="text-center mb-3">Cadastre-se em nosso site!</h3>
    <div class="d-flex justify-content-center">
        <img class="img-fluid" src="/resources/img/person-circle.svg" alt="Silhueta de uma Pessoa" width="20%">
    </div>
    <form method="POST">
        <div class="my-2">
            <input type="text" class="form-control rounded-left" name="name" placeholder="Nome" required
                value="<?= htmlspecialchars($old["name"]) ?? "" ?>">
        </div>
        <?php if (isset($erros["name"])): ?>
            <p class="text-danger fst-italic fs-6 mt-2">
                <?= $erros["name"] ?>
            </p>
        <?php endif; ?>

        <div class="my-2">
            <input type="email" class="form-control rounded-left" name="email" placeholder="E-mail" required
                value="<?= htmlspecialchars($old["email"]) ?? "" ?>">
        </div>
        <?php if (isset($erros["email"])): ?>
        <p class="text-danger fst-italic fs-6 mt-2">
            <?= $erros["email"] ?>
        </p>
        <?php endif; ?>

        <div class="my-2">
            <input type="password" class="form-control rounded-left" name="password" placeholder="Senha" required>
        </div>

        <?php if (isset($erros["password"])): ?>
        <p class="text-danger fst-italic fs-6 mt-2">
            <?= $erros["password"] ?>
        </p>
        <?php endif; ?>

        <?php if (isset($erros["login"])): ?>
        <p class="text-danger fs-5 fw-bold text-center mb-1">
            <?= $erros["login"] ?>
        </p>
        <?php endif; ?>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success w-100 rounded submit mt-3">CADASTRAR</button>
        </div>
    </form>
</div>
</section>
<?php require path("views/partials/footer.php"); ?>
