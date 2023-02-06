let searchBarJS = document.querySelector("#searchBar")
let searchBarResults = document.querySelector("#searchBarResults")

searchBarJS.addEventListener('input', refreshList)
function refreshList() {
    var i = 0
    searchBarResults.innerHTML = ""
    let searchQuery = searchBarJS.value
    fetch(`https://api.themoviedb.org/3/search/movie?api_key=c8e111a0d93537cc581d6268be26297b&language=es-ES&query=${searchQuery}&page=1`)
        .then(response => response.json())
        .then(data =>
            data['results'].slice(0,-10).forEach(movie => {
                    let title = movie["title"]
                    let movieId = movie["id"]
                    let posterPath = "https://image.tmdb.org/t/p/original/" + movie["poster_path"]
                    searchBarResults.innerHTML += `<div><img src="${posterPath}" style="width:100px" alt="${title} poster">
            <h4>${title}</h4></div>`
                    console.log(movie); 
            })
        )
}