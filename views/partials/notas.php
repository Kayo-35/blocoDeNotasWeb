<table class="table mt-3">
    <ul class="list-group">
        <?php foreach($notas as $nt) : ?>
            <li class="list-group-item">
                <a href="/exibir?id=<?= $nt['id_user'] ?>" class="link-dark"><?= $nt['body'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</table>
