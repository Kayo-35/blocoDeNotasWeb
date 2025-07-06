<table class="table mt-3">
    <ul class="list-group">
        <?php foreach($notas as $nt) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="text-primary-emphasis"><?= htmlspecialchars($nt['title'])?></h5>
                    <span class="text-dark fst-italic" style="font-size: 12px;">
                        <?= htmlspecialchars($nt['body'])."..."?>
                    </span>
                </div>
                <a href="/exibir?id=<?= $nt['id_nota'] ?>">
                    <img class="img-fluid" src="resources/img/eye.svg">
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</table>
