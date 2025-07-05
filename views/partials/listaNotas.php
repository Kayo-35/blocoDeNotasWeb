<table class="table mt-3">
    <ul class="list-group">
        <?php foreach($notas as $nt) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="text-dark">
                    <?= htmlspecialchars($nt['body'])."..."?>
                </span>
                <a href="/exibir?id=<?= $nt['id_nota'] ?>">
                    <img class="img-fluid" src="resources/img/eye.svg">
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</table>
