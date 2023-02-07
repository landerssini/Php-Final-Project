<?php
    include("./signup.php");
    include_once("./db.php");

session_start();

    if (isset($_SESSION["currentEmail"])) {
        header("location:form-userpanel.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="./assets/js/script.js" defer></script>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>FAVORITE-MOVIES</title>
</head>

<body>
    <?php 
    include_once("./view/header.php"); 
    include_once("./view/modal-signup.php"); 
    ?>
    <section>

        <!-- <form action="" method="POST" class="form-register gap-2">
            <input type="text" id="user" placeholder="Your name" name="name" placeholder="Username"
                class="form-control form-control-lg">
            <input type="text" id="Email" placeholder="Example@mail.com" name="email" placeholder="email"
                class="form-control form-control-lg">
            <input type="password" id="password" placeholder="Password" name="password"
                class="form-control form-control-lg">
            </div>
            <div class="modal-footer">
                <input type="submit" value="Sign up" name="send-register" class="btn btn-primary">
        </form> -->

    </section>

    <?php include_once("./view/footer.php"); ?>