<?php 

session_start();
include_once("./header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <script src='./assets/js/script.js?v=<?php echo time(); ?>' defer></script>
  <link rel="stylesheet" href='./assets/css/styles.css?v=<?php echo time(); ?>'>
  <title>FAVORITE-MOVIES</title>
</head>

<body>

  <?php echo '<div id="indexPage"></div>';
  include_once("./header.php"); ?>
  <div id="initialPageDiv" class="img-hover-zoom">

  </div>
  <div class="paginationButtons" id="paginationButtons">
    <button class='btn' id="prevPage">Prev</button>
    <p id="currentPage">1</p>
    <button class='btn' id="nextPage">Next</button>
  </div>

  <?php include_once("./footer.php"); ?>

</body>

</html>