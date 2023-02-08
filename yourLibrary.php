<?php
include_once("./db.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION["currentEmail"])) {
    header("location: index.php?web=privatezone");
} else {
    $conne = new Connection();
    $conn = $conne->connect();
    $currentEmail = $_SESSION["currentEmail"];
    $queryShowMovies = "SELECT movies.movie_id, movies.review, movies.comments FROM users JOIN movies ON users.email = movies.user_email WHERE users.email = '$currentEmail'"; //change "2"for "$user_id"
    $query = mysqli_query($conn, $queryShowMovies);
    $moviePack = array();
    while ($movieList = mysqli_fetch_array($query)) {
        $movieId = $movieList['movie_id'];
        $movieComment = $movieList['comments'];
        $movieReview = $movieList['review'];
        array_push($moviePack, $movieId."/".$movieReview."/".$movieComment);
    }
    // var_dump($moviePack);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./assets/js/script.js?v=<?php echo time(); ?>" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>FAVORITE-MOVIES</title>
</head>


<body>
    <?php include_once("./header.php"); ?>
    <div id="myLibrary">
        <?php foreach ($moviePack as $idR) { ?>

            <div <?php echo "id='$idR'"; ?>class="movieListYL">
                <div class="posterPath"></div>
                <div class="titleMovie"></div>
                <div class="time"></div>
                <div class="review"></div>
                <div class="commentDiv"></div>
            </div>
        <?php } ?>
    </div>
    <?php include_once("./footer.php"); ?>
</body>