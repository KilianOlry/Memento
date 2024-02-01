    <div class="bg-form">
        <div class="wrapper container-xl">
        <form action="" method="post">
            <h1>Création du nouveau post it</h1>
            <div class="input-box">
                <input type="text" placeholder="Titre du post-it" name="title" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="date" placeholder="Votre email" name="date" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <textarea name="content" id="" cols="30" rows="10" placeholder="Votre message"></textarea>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
            <button type="submit" class="btn">Créer</button>
        </form>
    </div>
</div>