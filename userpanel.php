<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js" defer></script>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>FAVORITE-MOVIES</title>
</head>

<body>
    <?php include_once("./userpanel.php"); ?>
    <?php include_once("./partials/header.php"); ?>
    <section>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-movie-modal">
            New
        </button>
        
        <div class="modal fade" id="create-movie-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" data-dismiss="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="form-create-movie" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="year">Year</label>
                                <input type="number" name="year" id="year" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="genre">Genre</label>
                                <input type="text" name="genre" id="genre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="director">Director</label>
                                <input type="text" name="director" id="director" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="time">Time (Minutes)</label>
                                <input type="number" name="time" id="time" class="form-control" required>
                            </div>
                            <div class="form-row align-items-center">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Review</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="review" class="form-control" required>
                                    <option id="star" value=" "></option>
                                    <option id="1star" value="1">One</option>
                                    <option id="2star" value="2">Two</option>
                                    <option id="3star" value="3">Three</option>
                                    <option id="4star" value="4">Four</option>
                                    <option id="5star" value="5">Five</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="create_button" class="btn btn-primary col-auto my-1" value="Create" >
                        </div>
                    </form>
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th>Director</th>
                    <th>Time</th>
                    <th>Review</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                    include 'db.php';
                   
                ?>
            </tbody>
            <tr id ="new-movie">
                
            </tr>
        </table>
    </section>
    <div>
        <button>Previous</button>
        <div></div>
        <button>Next</button>
    </div>
    <?php include_once("./partials/footer.php"); ?>
</body>