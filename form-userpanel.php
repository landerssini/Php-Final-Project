<?php
require_once ("./db.php");
require_once ("./delete.php");

session_start();

if (!isset($_SESSION["currentUser"])) {
    header("location: index.php?web=privatezone");
}

$db = new Delete;
$db->deleteUser();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./assets/js/script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>FAVORITE-MOVIES</title>
</head>

    <body>
        <?php include_once("./view/header.php"); ?>
        <section>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Delete
            </button>
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <form method="POST">
                            <div class="modal-body">
                                <p>Are you sure?</p>
                                <p class="text-center"> You won't be able to revert this!</p>
                                <input type="hidden" name="currentUser" value ='<?php echo $_SESSION["currentUser"]?>'>
                                <input type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-outline-danger" name="delete" value="Delete">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <input type="text" name="" id="">
            
        <div>
            <img src="" alt="">
            <a href="logout.php">Exit</a>
        </div>
    </section>
    
<?php include_once("./view/footer.php"); ?>