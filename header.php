<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">YourMovieLib</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                    <?php if (isset($_SESSION["currentEmail"])){echo '<li class="nav-item">
                        <a class="nav-link" href="yourLibrary.php">Your Library</a>
                    </li>';} ?>
                </ul>
                <!-- BOTON MODAL LOG IN CON IF DE SESSION ID-->
                <!-- BOTON MODAL SIGN UP CON IF DE SESSION ID-->
                <form class="d-flex">
                    <input class="form-control me-2" id="searchBar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div id="searchBarResults"></div>
</header>