<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
session_start();
include_once('./db.php');
$conne = new Connection();
$conn = $conne->connect();
$id_movie = $_POST['id-movie'];
$currentUser = $_SESSION['currentEmail'];
$query = "DELETE FROM movies WHERE user_email='$currentUser' AND movie_id='$id_movie'";
$result = mysqli_query($conn, $query);
if($result){
    header("location: yourLibrary.php");
} else {
    header("location: yourLibrary.php?error=queryerror");
}
?>
