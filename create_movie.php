<?php
    include_once "db.php";

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
            
    // }

    class CreateMovie extends Connection  {


            PRIVATE $movie_name;
            PRIVATE $movie_year;
            PRIVATE $movie_genre;
            PRIVATE $movie_director;
            PRIVATE $movie_time;
            PRIVATE $movie_review;
        
        public function register($name, $year, $genre, $director, $time, $review) {
            $conexion = parent::connect();
            $sql = "INSERT INTO movies (id, user_id, movie_name, year, genre, director, time_minutes, review) VALUES (NULL, 30,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sissii', $name, $year, $genre, $director, $time, $review);
            return $query->execute();
        }
    }

    
    if(isset($_POST["send-movie"])){
        if(empty($_POST["name"]) || empty($_POST["year"]) || empty($_POST["genre"]) || empty($_POST["director"]) || empty($_POST["time"]) || empty($_POST["review"])){
            echo "<p>Fields cannot be left empty.</p>";
        }else{
            $movie_name = $_POST['name'];
            $movie_year = $_POST['year'];
            $movie_genre = $_POST['genre'];
            $movie_director = $_POST['director'];
            $movie_time = $_POST['time'];
            $movie_review = $_POST['review'];
        
            
            $movie = new CreateMovie();
            
            if ($movie->register($movie_name, $movie_year, $movie_genre, $movie_director, $movie_time, $movie_review)) {
                header("location:userpanel.php");
            } else {
                echo "Could not register";
            }
        }
    }
    

    // $movie_name = $_POST["name"];
    // $year = $_POST["year"];
    // $genre = $_POST["genre"];
    // $director = $_POST["director"];
    // $time_minutes = $_POST["time"];
    // $review = $_POST["review"];



    

    // if(empty($_POST)) {
    //     echo json_encode("error");
    // } else {
    //     echo json_encode("correct");
    // }

    
?>