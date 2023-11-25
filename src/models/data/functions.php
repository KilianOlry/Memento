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

// Add post-it

function addPostIt($title, $content, $date, $id){
    global $bdd;
    
    $sql = "INSERT INTO post_it(title, content, date, user_id) VALUES(:title, :content, :date, :user_id)";
    $query = $bdd->prepare($sql);
    $query->execute([
        'title' => $title,
        'content' => $content,
        'date' => $date,
        'user_id' => $id,
    ]);
}

function deletePostIt($id){
    global $bdd;

    $sql = "DELETE FROM post_it WHERE id=:id";
    $query = $bdd->prepare($sql);
    $query->execute([
        'id' => $id,
       ]);
}


