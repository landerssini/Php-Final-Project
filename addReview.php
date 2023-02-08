<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("db.php");

$user_id = $_SESSION["currentEmail"];
$movie_id = $_POST["ID"];
$rating = $_POST["Review"];
$comment = $_POST["Comments"];
$conne = new Connection();
$conn = $conne->connect();

$query = "SELECT * FROM movies WHERE user_email='$user_id' AND movie_id='$movie_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE movies SET review='$rating', comments = '$comment' WHERE user_email='$user_id' AND movie_id='$movie_id'";
    if(mysqli_query($conn, $sql)){
        header("location: movie.php?movie_id=".$movie_id);
    } else {
        header("location: movie.php?error=queryerror");
    }
} else {
    $sql = "INSERT INTO movies (user_email ,movie_id, review, comments) VALUES ('$user_id','$movie_id','$rating','$comment')";
    if(mysqli_query($conn, $sql)){
        header("location: movie.php?movie_id=".$movie_id);
    } else {
        header("location: movie.php?error=queryerror");
    }
}

// class UserActions extends Connection  {

//     $userID;
//     $filmID;
//     $filmRating;

//     public function __construct($userID, $filmID, $filmRating) {
//         $this->userID = $userID;
//         $this->filmID = $filmID;
//         $this->filmRating = $filmRating;
//     }

//     public function starReview($userID, $filmID, $filmRating) {
//         $conexion = parent::connect();
//         $sql = "INSERT INTO movies (id, user_id, rating) VALUES ('$filmID','$userID','$filmRating')";
//         $answer = mysqli_query($conexion, $sql);

//     }

//     public function getReviews($userID) {
//         $conexion = parent::connect();
//         $sql = "SELECT * FROM movies WHERE user_id = '$userID'";
//         $answer = mysqli_query($conexion, $sql);

//     }
// }