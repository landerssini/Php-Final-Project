<?php
    // include_once "db.php";

    // class Movies extends Connection {
 
            
        
        


    //     public function addNewMovie(){
    //         $this->connect();
    //         $movie = $conn->prepare("INSERT INTO movies (NULL, NULL, movie_name, year, genre, director, time_minutes, review) VALUES (?,?,?,?,?,?)" );
    //         $movie->bind_param("sissii", $this->$movie_name, $this->$year, $this->$genre, $this->$director, $this->$time_minutes, $this->$review);
    //         $movie->execute();
    //         $movie->close();
    //         $conn->close();
    //     }
        
    // }

    

    $movie_name = $_POST["name"];
    $year = $_POST["year"];
    $genre = $_POST["genre"];
    $director = $_POST["director"];
    $time_minutes = $_POST["time"];
    $review = $_POST["review"];

    

    if(empty($_POST)) {
        echo json_encode("error");
    } else {
        echo json_encode("correct");
    }

    
?>