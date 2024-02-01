<div class="head">
    <h1>memento <?= 'de ' . htmlspecialchars($_SESSION['user']['name']); ?></h1>

    <?php
    if (isset($_SESSION['user'])) {
        echo "<a href='?page=new_post-it' title='Ajouter un post-it' class='add-post-it'>Nouveau post it</a>";
    } else {
        echo "<a href='?page=login.php' title='Ajouter un post-it' class='add-post-it'>Nouveau post it</a>";
    }
    ?>
</div>

<div class="content">

    <?php foreach ($datas as $data) : ?>
        <article>
            <p class="created"><?= htmlspecialchars($data['date']) ?></p>
                <form action="" method="post" class="delete">
                    <input type="number" name="id" hidden value="<?= $data['id'] ?>">
                    <button type="submit">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </button>
                </form>
            <div class="top-post-it">
                <h2><?= htmlspecialchars($data['title']) ?></h2>
            </div>
            <p class="description"><?= htmlspecialchars(nl2br($data['content'])) ?></p>
            <p class="date">Créer le <?= htmlspecialchars($data['created_at']) ?></p>
        </article>
    <?php endforeach; ?>
</div>