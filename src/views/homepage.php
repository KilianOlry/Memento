<h1>memento <?php echo 'de ' . $_SESSION['user']['name']; ?></h1>

<?php
if (isset($_SESSION['user'])) {
    echo "<a href='./new_post-it.php' title='Ajouter un post-it' class='add-post-it'>Nouveau post it</a>";
} else {
    echo "<a href='?page=login.php' title='Ajouter un post-it' class='add-post-it'>Nouveau post it</a>";
}
?>

<div class="content">

    <?php foreach ($datas as $data) : ?>
        <article>
            <p class="created"><?= $data['date'] ?></p>
            <a href="delete.php?id=<?php echo $data['id'] ?>" title="supprimer ce post-it" class="delete">
                <i class="fa-regular fa-circle-xmark"></i>
            </a>
            <div class="top-post-it">
                <h2><?= $data['title'] ?></h2>
            </div>
            <p class="description"><?php echo nl2br($data['content']) ?></p>
            <p class="date">Créer le <?= $data['created_at'] ?></p>
        </article>
    <?php endforeach; ?>
</div>