<?php

class PostIt
{

  private string $createdAt;

  public function __construct(
    private string $name,
    private string $content,
    private string $date,
    private string $userId,
  ) {
  }

  public function getName(): string{
    return $this->name;
  }
  public function setName($name): void{
    $this->name = $name;
  }

  public function getContent() :string{
    return $this->content;
  }
  public function setContent($content): void{
    $this->content = $content;
  }

  public function getDate(): string{
    return $this->date;
  }
  public function setDate($date): void{
    $this->date = $date;
  }

  public function getUserId(): string{
    return $this->userId;
  }
  public function setUserId($userId): void{
    $this->userId = $userId;
  }
}
