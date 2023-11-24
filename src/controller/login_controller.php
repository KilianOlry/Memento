<?php
    require ('./src/views/login.php');
    if (!empty($_POST)) {
        if (isset($_POST['email'], $_POST['password'])
            && !empty($_POST['email']) && !empty($_POST['password'])) {

                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    die("email incorrect");
                }

                $email = $_POST['email'];

                $user = loginUser($email);

                if(!$user){
                    echo "l'utilisateur n'existe pas user";
                }
                if(!password_verify($_POST['password'], $user['password'])){
                    echo 'le mot de passe ne correspond pas';
                }

                $_SESSION['user'] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'id' => $user['id'],
                ];
                $_SESSION['token'] = md5(uniqid(mt_rand(), true));


                header('Location: index.php');
                
                
        }else{
            die('le formulaire est incomplet');
        }
    }


?>