<?php 

class Connection  {
    public $conn;
    public function connect() {
      $this->$conn = mysqli_connect("localhost", "root", "", "favorites_movies")

    }

}

?>