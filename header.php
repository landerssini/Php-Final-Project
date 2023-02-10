<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <a class="navbar-brand" href="./index.php">YourMovieLib</a>
            <form class="d-flex" id="form-search">
                <input class="form-control me-2" id="searchBar" type="search" placeholder="Search" aria-label="Search" name="pepito">
            </form>
            <?php
            if (isset($_SESSION['currentEmail'])) {
                // if ($_GET['session'] == 'active') 
                {
                    echo '<a class="nav-link" href="yourLibrary.php">Your Library</a>';
                    echo '<div class="butons-login">';
                    include_once("./view/modal-edit.php");
                    include_once("./view/modal-delete.php");
                    echo '<a href="./logout.php"><button type="button" class="btn btn-primary" ><span class="material-symbols-outlined">
                    logout
                    </span></button></a>';
                    echo "</div>";
                }
            } else {
                echo '<div class="d-flex">';
                include_once("./view/modal-login.php");
                include_once("./view/modal-signup.php");
                echo "</div>";
            }
            ?>


        </div>
    </nav>
    <div id="searchBarResultsP" class="search-hidden">
        <div id="searchBarResults"></div>
    </div>
</header>


<!-- 
<?php
// if(isset($_GET['session'])) {
//     if ($_GET['session'] == 'active') {
//         echo '<div class="nav-item">
//         <a class="nav-link" href="yourLibrary.php">Your Library</a>
//         </div>';
//         include_once("./view/modal-edit.php");
//         include_once("./view/modal-delete.php");
//         echo "<div><a href='./logout.php'>Exit</a>";
//     } 
// }else {
//     include_once("./view/modal-login.php");
//     include_once("./view/modal-signup.php");
// }
?> -->