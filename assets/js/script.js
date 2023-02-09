const togglePassword = document.querySelector(".togglePassword");
const password = document.querySelector(".password");

togglePassword.addEventListener("click", function () {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    this.classList.toggle("bi-eye");
});
let searchBarJS = document.querySelector("#searchBar")
let searchBarResults = document.querySelector("#searchBarResultsP")


searchBarJS.addEventListener('input', refreshList)
function refreshList() {
    searchBarResults.innerHTML = ""
    let searchQuery = searchBarJS.value
    if (!searchQuery == "") {
        searchBarResults.style.display = "hidden"
        fetch(`https://api.themoviedb.org/3/search/movie?api_key=c8e111a0d93537cc581d6268be26297b&language=es-ES&query=${searchQuery}&page=1&include_adult=false`)
            .then(response => response.json())
            .then(data =>
                data['results'].slice(0, -5).forEach(movie => {
                    let title = movie["title"]
                    let movieId = movie["id"]
                    if (movie["poster_path"]) {
                        var posterPath = "https://image.tmdb.org/t/p/original/" + movie["poster_path"]
                    }
                    else { var posterPath = "assets/Skeleton.png" }
                    searchBarResults.innerHTML += `<a href="./movie.php?movie_id=${movieId}" style="text-decoration:none;"> <div class="card text-center resultSearch" style="width: 9rem; ">
      <img src="${posterPath}" class="card-img-top" alt="${title} poster">
      <div class="card-body">
      <h5 class="card-title">${title}</h5></div>
      
      </div></a>`

                })
            )
    } else { searchBarResults.classList.add = "hidden" }

}
if (window.location.pathname.includes("/movie.php")) {
    let movieIdDiv = document.querySelector("#mainInfo").parentElement
    let idFecth = movieIdDiv.getAttribute("movie_id")
    let mainInfo = document.querySelector("#mainInfo")
    let sinopsis = document.querySelector("#sinopsis")
    let comments = document.querySelector("#comments")
    fetch(`https:api.themoviedb.org/3/movie/${idFecth}?api_key=c8e111a0d93537cc581d6268be26297b&language=es-ES`)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            let genres = data.genres;
            let genresString = [];
            genres.forEach(element => {
                let name = element.name
                genresString.push(name)
            })
            let finalGenres = genresString.toString();
            let companies = data.production_companies;
            let companiesString = [];
            companies.forEach(element => {
                let nameComp = element.name
                companiesString.push(nameComp)
            })
            let finalCompanies = companiesString.toString();
            mainInfo.innerHTML += `<div class="container">
            <div class="row">
                <h1 class="d-flex justify-content-center p-5">${data["title"]}</h1>
                <div class="col-6" id="poster">
                <img class="rounded mx-auto d-block" src="https://image.tmdb.org/t/p/original/${data["poster_path"]}" style="width:360px;" alt="${data["title"]} poster">
                </div>
                <div class="col-3" id="filmInfo">
                <h3 class="d-flex justify-content-center">Film Info:</h3>
                   <ul class="list-group list-group-flush mt-5">
                      <li class="list-group-item">Genres:       ${finalGenres}.</li>
                      <li class="list-group-item">Release date: ${data["release_date"]}.</li>
                      <li class="list-group-item">Revenue: ${data["revenue"]}$. </li>
                      <li class="list-group-item">Duration: ${data["runtime"]} minutes. </li>
                      <li class="list-group-item">Vote average: ${data["vote_average"]}. </li>
                  </ul>
                </div>
                <div class="col-3" id="production">
                  <h3 class="d-flex justify-content-center">Production:</h3>
                  <ul class="list-group list-group-flush mt-5">
                    <li class="list-group-item">Original Language: ${data["original_language"]}.</li>
                    <li class="list-group-item">Budget: ${data["budget"]}$.</li>
                    <li class="list-group-item">Production companies: ${finalCompanies}.</li>
                </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-6" id="Sinopsis">
                    <div class="d-flex justify-content-center p-5"></div>
                    <h3 class="d-flex align-self-xl-start ml-4">Sinopsis:</h3>
                    <p>${data["overview"]}</p>
                </div>
                <div class="col-6" id="YourOpinion">
                
                    <h3 class="d-flex justify-content-center">Your Opinion:</h3>

                </div>
                
                
            </div>
          </div>`
            
        }
        )
}
if (window.location.pathname.includes("/yourLibrary.php")) {
    let movieList = document.querySelectorAll(".movieListYL")
    movieList.forEach(movie => {
        let idDiv = movie.getAttribute("id")
        let idMovie = idDiv.split("/")[0]
        console.log(idMovie);
        let reviewM = idDiv.split("/")[1]
        let commentM = idDiv.split("/")[2]
        console.log(reviewM);
        let posterPath = movie.querySelector(".posterPath")
        let titleMovie = movie.querySelector(".titleMovie")
        let commentDiv = movie.querySelector(".commentDiv")
        let time = movie.querySelector(".time")
        let review = movie.querySelector(".review")
        fetch(`https:api.themoviedb.org/3/movie/${idMovie}?api_key=c8e111a0d93537cc581d6268be26297b&language=es-ES`)
            .then(response => response.json())
            .then(data => {
                posterPath.innerHTML += `<a href="movie.php?movie_id=${data["id"]}"><img src="https://image.tmdb.org/t/p/original/${data["poster_path"]}" style="width:270px;" alt="${data["title"]} poster">`
                titleMovie.innerHTML += `<p>${data["title"]}</p>`
                review.innerHTML += `<p>${reviewM}</p>`
                commentDiv.innerHTML += `<p>${commentM}</p></a>`
            }
            )

    });

};



window.addEventListener('load', loadPage)
let initialPageDiv = document.querySelector("#initialPageDiv")

function loadPage() {
    if (document.getElementById("indexPage")!=null) {
        fetch("https://api.themoviedb.org/3/movie/top_rated?api_key=c5fe6d1a7a37ade55ce430078dfb6628&language=es-ES&page=1")
            .then(response => response.json())
            .then(data =>
                data['results'].forEach(movie => {
                    let title = movie["title"]
                    let movieId = movie["id"]
                    if (movie["poster_path"]) {
                        var posterPath = "https://image.tmdb.org/t/p/original/" + movie["poster_path"]
                    }
                    else { var posterPath = "assets/Skeleton.png" }
                    initialPageDiv.innerHTML += `<a href="./movie.php?movie_id=${movieId}" style="text-decoration:none; color:black;" ><div class="card text-center" style="width: 18rem;">
        <img src="${posterPath}" " class="card-img-top" alt="${title} poster">
        <div class="card-body">
        <h5 class="card-title">${title}</h5></div>
        </div></a>`
                    console.log(movie);
                })
            )
    }
}

