<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <a class="navbar-brand" href="./index.php">YourMovieLib</a>
            <form class="d-flex" id="form-search">
                <input class="form-control me-2" id="searchBar" type="search" placeholder="Search" aria-label="Search">
            </form>
            <?php
            if (isset($_SESSION['currentEmail'])) {
                    echo '<a class="user__library" href="yourLibrary.php">Your Library</a>';
                    echo '<div class="butons-login">';
                    include_once("./view/modal-edit.php");
                    include_once("./view/modal-delete.php");
                    echo '<a href="./logout.php"><button type="button" class="btn material-symbols-outlined user__button-exit" >
                    logout</button></a>';
                    echo "</div>";
                
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



