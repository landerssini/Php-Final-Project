<?php 

class Connection{
  public $host = 'localhost';
  public $username = 'root';
  public $password = '';
  public $db_name = 'favorites_movies';

  public function connect(){
    return mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
  }
}


?>