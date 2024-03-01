<div class="bg-form">
    <div class="wrapper container-xl">
        <form action="" method="post">
            <h1>S'inscrire</h1>
            <div class="input-box">
                <input type="text" placeholder="Votre nom" name="name" >
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box" id="ID_msgEmail">
                <input type="text" placeholder="Votre email" name="email" id="ID_email">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box" id="ID_msgPassword">
                <input type="password" placeholder="Mot de passe" id="ID_password" name="password">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <p style="color: red;">
                <?php if (isset($_SESSION['error'])) {
                    foreach ($_SESSION['error'] as $item) {
                        echo "<p style='color: red'>".$item.'</p>';
                    }
                    unset($_SESSION['error']);
                } 
                ?></p>
            </div>
            <button type="submit" class="btn" id="ID_submit">S'inscrire</button>
        </form>
    </div>
</div>