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
    <title>FAVORITE-MOVIES</title>
</head>

<body>
    <?php include_once("./header.php"); ?>
    <section>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            New
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="newmovie.php" method="post">
                            <label for="name">Name</label>
                            <input type="text">
                            <label for="year">Year</label>
                            <input type="text">
                            <label for="genre">Genre</label>
                            <input type="text">
                            <label for="director">Director</label>
                            <input type="text">
                            <label for="time">Time (Minutes)</label>
                            <input type="text">
                            <label for="review">Review</label>
                            <input type="radio" id="1star" name="review" value="1">
                            <input type="radio" id="2star" name="review" value="2">
                            <input type="radio" id="3star" name="review" value="3">
                            <input type="radio" id="4star" name="review" value="4">
                            <input type="radio" id="5star" name="review" value="5">
                            <input type="submit" value="Add movie">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
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
            <tr>
            </tr>
        </table>
    </section>
    <div>
        <button>Previous</button>
        <div></div>
        <button>Next</button>
    </div>
    <?php include_once("./footer.php"); ?>
</body>