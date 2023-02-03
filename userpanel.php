<?php

// require "connection.php";
session_start();
//----------connection.php
$conn = mysqli_connect("localhost", "root", "", "favorites_movies");

//------------
if (isset($_SESSION["userId"])) {
    header("location: index.php?web=privatezone");
} else {
    // $user_id = $_SESSION["userId"];
    $queryShowMovies = "SELECT movies.id FROM users JOIN movies ON users.id = movies.user_id WHERE users.id = 2;"; //change "2"for "$user_id"
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
        <script src="./assets/js/script.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <title>FAVORITE-MOVIES</title>
    </head>

    <body>
        <?php include_once("./partials/header.php"); ?>
        <section>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                New
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="newmovie.php" method="post" id="addMovieForm">
                                <label for="name">Name</label><br>
                                <input type="text"><br>
                                <label for="year">Year</label><br>
                                <input type="text"><br>
                                <label for="genre">Genre</label><br>
                                <input type="text"><br>
                                <label for="director">Director</label><br>
                                <input type="text"><br>
                                <label for="time">Time (Minutes)</label><br>
                                <input type="text"><br>
                                <label for="review">Review</label><br>
                                <input type="radio" id="1star" name="review" value="1">
                                <input type="radio" id="2star" name="review" value="2">
                                <input type="radio" id="3star" name="review" value="3">
                                <input type="radio" id="4star" name="review" value="4">
                                <input type="radio" id="5star" name="review" value="5">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" form="addMovieForm">Add movie</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" name="" id="">
            <div>
                <img src="" alt="">
                <p>Lander sola</p>
                <button>Exit</button>
            </div>
        </section>
        <section>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th>Director</th>
                    <th>Time</th>
                    <th>Review</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php foreach ($movieIds as $movieId) {
                        $queryGetMovie = 'SELECT * FROM movies WHERE id = ' . $movieId . ';';
                        $result = mysqli_query($conn, $queryGetMovie);
                        $movie = mysqli_fetch_array($result); ?>
                        <tr>
                            <td><?php echo $movie["id"]; ?></td>
                            <td><?php echo $movie["movie_name"]; ?></td>
                            <td><?php echo $movie["year"]; ?></td>
                            <td><?php echo $movie["genre"]; ?></td>
                            <td><?php echo $movie["director"]; ?></td>
                            <td><?php echo $movie["time_minutes"]; ?></td>
                            <td><?php echo $movie["review"]; ?></td>
                            <td><button id="<?php echo $movie["id"]; ?>" <?php echo " class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'" ?>><span class="material-symbols-outlined">
                                        edit
                                    </span></button></td>
                        </tr>
                <?php }
                } ?>
                </tbody>
            </table>
        </section>
        <div>
            <button>Previous</button>
            <div></div>
            <button>Next</button>
        </div>
        <?php include_once("./partials/footer.php"); ?>