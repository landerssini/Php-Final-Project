<?php 

  class Connection{
  private $host;
  private $userName;
  private $password;
  private $db_name;

    public function __construct(){
      $this->host = 'localhost';
      $this->userName = "root";
      $this->password = '';
      $this->db_name = 'favorites_movies';
    }
    public function connect(){
      $conn = mysqli_connect($this->host, $this->userName, $this->password, $this->db_name);
      return $conn;
    }
  }


?>