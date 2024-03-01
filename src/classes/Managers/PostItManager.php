<?php

  class PostItManager{

    public function __construct()
    {
      
    }

    public function selectAllPostIt($id, PDO $pdo){

      $selectPostit = 'SELECT * FROM post_it WHERE user_id =' . $id;
      $statement = $pdo->query($selectPostit);
      $datas= $statement->fetchAll();

      return $datas;
    }

    public function insertPostIt($title, $content, $date, $id, PDO $pdo): void{
      
      $insertPostIt = "INSERT INTO post_it(title, content, date, user_id) VALUES(:title, :content, :date, :user_id)";
      $statement = $pdo->prepare($insertPostIt);
      $statement->execute([
          'title' => $title,
          'content' => $content,
          'date' => $date,
          'user_id' => $id,
      ]);
  }

    public function deleteOne($userId, $id, PDO $pdo): void{
      
      $deletePostIt = "DELETE FROM post_it WHERE user_id = :user_id AND id = :post_id";
      $query = $pdo->prepare($deletePostIt);
      $query->execute([
          'user_id' => $userId,
          'post_id' => $id,
         ]);
    }
  }
?>
