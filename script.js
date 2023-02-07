let searchBarJS = document.querySelector("#searchBar")
let searchBarResults = document.querySelector("#searchBarResults")

searchBarJS.addEventListener('input', refreshList)
function refreshList() {
  searchBarResults.innerHTML = ""
  let searchQuery = searchBarJS.value
  fetch(`https://api.themoviedb.org/3/search/movie?api_key=c8e111a0d93537cc581d6268be26297b&language=es-ES&query=${searchQuery}&page=1`)
    .then(response => response.json())
    .then(data =>
      data['results'].slice(0, -5).forEach(movie => {
        let title = movie["title"]
        let movieId = movie["id"]
        let posterPath = "https://image.tmdb.org/t/p/original/" + movie["poster_path"]
        searchBarResults.innerHTML += `<div class="card text-center "style="width: 18rem;">
      <img src="${posterPath}" class="card-img-top" alt="${title} poster">
      <div class="card-body">
      <h5 class="card-title">${title}</h5>
      
      <a href="./movie.php?movie_id=${movieId}" class="btn btn-primary">More info</a>
      </div>
      </div>`

      })
    )

}
if (window.location.pathname.includes("/movie.php")) {
  let movieIdDiv = document.querySelector("#mainInfo").parentElement
  let idFecth = movieIdDiv.getAttribute("movie_id")
  let mainInfo = document.querySelector("#mainInfo")
  let sinopsis = document.querySelector("#sinopsis")
  let comments = document.querySelector("#comments")
  let INFO
  fetch(`https:api.themoviedb.org/3/movie/${idFecth}?api_key=c8e111a0d93537cc581d6268be26297b&language=es-ES`)
  .then(response => response.json())
  .then(data => {
    mainInfo.innerHTML+=`<img src="https://image.tmdb.org/t/p/original/${data["poster_path"]}" style="width:270px;" alt="${data["title"]} poster"><h3>${data["title"]}</h3><h3>${data["original_title"]}</h3><h3>${data["release_date"]}</h3><h4>${data["status"]}</h4><h5>${data["runtime"]}min</h5>`
    sinopsis.innerHTML+=`<p>${data["overview"]}</p>`
  }
  )

    // .then(mainInfo.innerHTML += `<img src="https://image.tmdb.org/t/p/original/${INFO["poster_path"]}" style="width:270px;" alt="${INFO["title"]} poster"><h3>${INFO["title"]}</h3><h3>${INFO["original_title"]}</h3><h3>${INFO["release_date"]}</h3><h4>${INFO["status"]}</h4><h5>${INFO["runtime"]}min</h5>`)
    // .then(sinopsis.innerHTML += `<p>${INFO["overview"]}</p>`)
    // .then()



}
    // let title = data["title"]
    // let overview = data["overview"]
    // let original_title = data["original_title"]
    // let poster_path = data["poster_path"]
    // let release_date = data["release_date"]
    // let movStatus = data["status"]
    // let runtime = data["runtime"]
