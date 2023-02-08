<?php
include_once("db.php");

session_start();

if (isset($_SESSION["currentUser"])) {
    header("location:userpanel.php");
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
<?php include_once("./header.php"); ?>
    <section>
        <h3>Log In</h3>
        <form action="login.php" method="post">
            
            <label for="email">Email</label>
            <input type="email" id="email-login" name="email">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Login" name="submit-login">
        </form>
    </section>
    <div>
        <p>Don’t have an account?</p>
        <a href="./form-signup.php">Sign up</a>
    </div>
    <div id="weekTrendMovies">

    </div>
    <div><button id="previousBtn"></button><p id="counterPages"></p><button id="nextBtn"></button></div>
    <?php include_once("./partials/footer.php"); ?>