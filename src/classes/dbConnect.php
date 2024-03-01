<?php
class DbConnect
{

  private $pdo;

  public function __construct(
    protected string $dbName,
    protected string $dbHost,
    protected string $userName,
    protected string $userPassword,
  ) {
  }

  public function getPdo(): PDO
  {
    if ($this->pdo === null) {
      $this->pdo = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName . ';charset=utf8', $this->userName, $this->userPassword);
    }

    return $this->pdo;
  }
}
