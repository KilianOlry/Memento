<?php

function selectPostItFromUser(){
    global $bdd;

    $sql = 'SELECT p.id, p.title, p.content, p.date, p.created_at FROM post_it AS p INNER JOIN user AS u ON p.user_id = u.id WHERE u.id = '.$_SESSION['user']['id'];
    $requete = $bdd->query($sql);
    $datas = $requete->fetchAll();

    return $datas;
}
// Register User
function registerUserIntoDatabase($pseudo, $email, $passHash){
    global $bdd;

    $sql = "INSERT INTO user(name, email, password) VALUES(:pseudo, :email, :password)";
    $query = $bdd->prepare($sql);
    $query->execute([
        'pseudo' => $pseudo,
        'email' => $email,
        'password' => $passHash,
    ]);
}

function loginUser(){
    global $bdd;

    $sql = 'SELECT * FROM user WHERE email = :email';
    $query =$bdd->prepare($sql);     
    $query->execute([
        'email' => $_POST['email'],
    ]);
    $user = $query->fetch();

    return $user;
}

// Validate Input

function validateInput($name)
{
    $cleanInput = strip_tags($name);
    if (empty($cleanInput)) {
        throw new Exception('Le champ ne peut pas être vide.');
    }
    return $cleanInput;
}

function validateEmail($email)
{
    $cleanEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($cleanEmail === false) {
        throw new Exception("Ce n'est pas une adresse email valide.");
    }
    return $cleanEmail;
}

function validatePassword($password)
{
    if (strlen($password) <= 8) {
        throw new Exception('Le mot de passe est trop court.');
    }
    return $password;
}
