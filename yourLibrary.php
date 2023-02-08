<?php
if (!isset($_SESSION["currentUser"])) {
    header("location: index.php?web=privatezone");
} else {
    $conn = parent::connect();
    $currentUser = $_SESSION["currentUser"];
    $queryShowMovies = "SELECT movies.id FROM users JOIN movies ON users.id = movies.user_id WHERE users.email = ".$currentUser." ;"; //change "2"for "$user_id"
    $query = mysqli_query($conn, $queryShowMovies);
    $movieIds = array();
    while ($movieList = mysqli_fetch_array($query)) {
        $movieIds[] = $movieList['id'];
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>FAVORITE-MOVIES</title>
</head>


<body>
    <?php include_once("./header.php"); ?>
    <div id="myLibrary">
<div>
    
</div>
    </div>
    <?php include_once("./footer.php"); ?>
</body>