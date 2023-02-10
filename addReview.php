<?php

session_start();

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
        echo json_encode('Save');
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

