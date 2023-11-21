<header class="container">
    <a href="index.php">Memento</a>
    <nav>
        <ul>
            <?php
            if (!isset($_SESSION['user'])) : ?>
                <li><a href="login.php" title="Page de connexion">Connexion</a></li>
                <li><a href="register.php" title="Page d'inscription">Inscription</a></li>
            <?php else : ?>
                <li>Bienvenue <?php echo $_SESSION['user']['name'] ?></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>