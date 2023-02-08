<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">YourMovieLib</a>
            
                    <?php
                    if(isset($_GET['session'])) {
                        if ($_GET['session'] == 'active') {
                            echo '<div class="nav-item">
                            <a class="nav-link" href="yourLibrary.php">Your Library</a>
                            </div>';
                            include_once("./view/modal-edit.php");
                            include_once("./view/modal-delete.php");
                            echo "<div><a href='./logout.php'>Exit</a>";
                        } 
                    }else {
                        include_once("./view/modal-login.php");
                        include_once("./view/modal-signup.php");
                    }
                        ?>

                <form class="d-flex">
                    <input class="form-control me-2" id="searchBar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div id="searchBarResults"></div>
</header>