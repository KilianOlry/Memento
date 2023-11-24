<header class="container">
    <a href="?page=homepage">Memento</a>
    <nav>
        <ul>
            <?php
            if (!isset($_SESSION['user'])) : ?>
                <li><a href="?page=login" title="Page de connexion">Connexion</a></li>
                <li><a href="?page=register" title="Page d'inscription">Inscription</a></li>
            <?php else : ?>
                <li>Bienvenue <?php echo $_SESSION['user']['name'] ?></li>
                <li><a href="?page=logout" title="Déconnexion"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>