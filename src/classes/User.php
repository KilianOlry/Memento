<?php
  
  class User extends UserManager{
    private string $name;
    private string $email;
    private string $password;
    
    public function __construct(array $props)
    {
      $this->hydrate($props);
    }

    public function hydrate(array $props): void
    {
        if (is_array($props) && count($props)) {
            foreach ($props as $key => $prop) {
                $method = "set" . ucfirst($key);

                if (method_exists($this, $method)) {
                    // Si elle existe, on appelle la méthode et on lui passe en paramètre sa valeur associée
                    $this->$method($prop);
                }
            }
        }
    }

    public function getName(): string {
      return $this->name;
    }
    public function setName($name): void {
      $this->name = $name;
    }

    public function getEmail(): string {
      return $this->email;
    }
    public function setEmail($email): void {
      $this->email = $email;
    }

    public function getPassword():string {
      return $this->password;
    }
    public function setPassword($password): void {
      $this->password = $password;
    }
  }
?>