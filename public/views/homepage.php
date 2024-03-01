<div class="head">

    <h1>memento <?= 'de ' . htmlspecialchars($_SESSION['user']['name']); ?></h1>
    <a href='?page=new_post-it' title='Ajouter un post-it' class='add-post-it'>Nouveau post it</a>

</div>

<div class="content">

    <?php
    require './public/views/postIt.php';
    ?>

</div>