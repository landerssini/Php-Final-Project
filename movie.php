<?php
session_start();
echo $_SESSION["currentEmail"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="./assets/js/script.js?v=<?php echo time(); ?>" defer></script>
    <link rel="stylesheet" href="./assets/css/styles.css?v=<?php echo time(); ?>">
    <title>FAVORITE-MOVIES</title>
</head>

<body>
    <?php include_once("./header.php"); ?>
    <section>
        <div <?php $id = $_GET["movie_id"];
                echo 'movie_id="' . $id . '"' ?>>
            <div id="mainInfo"></div>
            <div id="sinopsis"></div>
            <div id="comments"></div>
            <form action="addReview.php" method="POST" id="formRating">
                <div class="clasificacion">
                    <input id="ID" type="text" name="ID" value="<?php echo $id ?>" hidden>
                    <input id="radio1" type="radio" name="Review" value="5" hidden>
                    <label for="radio1">★</label>
                    <input id="radio2" type="radio" name="Review" value="4" hidden>
                    <label for="radio2">★</label>
                    <input id="radio3" type="radio" name="Review" value="3" hidden>
                    <label for="radio3">★</label>
                    <input id="radio4" type="radio" name="Review" value="2" hidden>
                    <label for="radio4">★</label>
                    <input id="radio5" type="radio" name="Review" value="1" hidden>
                    <label for="radio5">★</label>
                    <input id="radio0" type="radio" name="Review" value="0" hidden checked>
                    <textarea name="Comments" rows="10" cols="50" id="Comments" required>Write something here</textarea>
                    <input type="submit" value="Save">
                </div>

            </form>
        </div>
    </section>
    <?php include_once("footer.php"); ?>