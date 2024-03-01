<?php
foreach ($datas as $data) : ?>
  <article>
    <p class="created"><?= htmlspecialchars(date('d/m/Y', strtotime($data['date']))) ?></p>
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
    <p class="date">Crée le <?= htmlspecialchars(date('d/m/Y', strtotime($data['created_at']))) ?></p>
  </article>
<?php endforeach; ?>