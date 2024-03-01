<?php
  class UserManager {

    public function getOne(string $data, PDO $pdo) {
      $selectuser = 'SELECT * FROM user WHERE email = :email';
      $statement = $pdo->prepare($selectuser);
      $statement->execute([
        'email' => $data
      ]);

      $user = $statement->fetch();
      return $user;
    }
    public function inserIntoDatabase($name, $email, $passHash, PDO $pdo){
  
      $sql = "INSERT INTO user(name, email, password) VALUES(:pseudo, :email, :password)";
      $query = $pdo->prepare($sql);
      $query->execute([
          'pseudo' => $name,
          'email' => $email,
          'password' => $passHash,
      ]);
  }

  public function passwordHash(string $password): string{
    return password_hash($password, PASSWORD_DEFAULT);
  }
  }
?>
