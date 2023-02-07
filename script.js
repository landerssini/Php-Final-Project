let searchBarJS = document.querySelector("#searchBar")
let searchBarResults = document.querySelector("#searchBarResults")

// searchBarJS.addEventListener('input', refreshList)
// function refreshList() {
//     var i = 0
//     searchBarResults.innerHTML = ""
//     let searchQuery = searchBarJS.value
//     fetch(`https://api.themoviedb.org/3/search/movie?api_key=c8e111a0d93537cc581d6268be26297b&language=es-ES&query=${searchQuery}&page=1`)
//         .then(response => response.json())
//         .then(data =>
//             data['results'].slice(0,-10).forEach(movie => {
//                     let title = movie["title"]
//                     let movieId = movie["id"]
//                     let posterPath = "https://image.tmdb.org/t/p/original/" + movie["poster_path"]
//                     searchBarResults.innerHTML += `<div><img src="${posterPath}" style="width:100px" alt="${title} poster">
//             <h4>${title}</h4></div>`
//                     console.log(movie); 
//             })
//         )
// }

window.addEventListener('load', loadPage)
let initialPageDiv = document.querySelector("#initialPageDiv")

function loadPage() {
        fetch(`https://api.themoviedb.org/3/movie/top_rated?api_key=c5fe6d1a7a37ade55ce430078dfb6628&language=es-ES&page=1`)
            .then(response => response.json())
            .then(data =>
                data['results'].forEach(movie => {
                        let title = movie["title"]
                        let movieId = movie["id"]
                        let posterPath = "https://image.tmdb.org/t/p/original/" + movie["poster_path"]
                        initialPageDiv.innerHTML += `<div data-hidden="${movieId}" class="divSelector"><img src="${posterPath}" data-hidden="${movieId}"  style="width:230px" alt="${title} poster">
                <h6 data-hidden="${movieId}">${title}</h6></div>`
                        console.log(movie); 
                })
            )
    }

// let divSelector = document.getElementsByClassName("divSelector") 
initialPageDiv.addEventListener("click", obtainID)


function obtainID(e) {
        let target = e.target
        let hiddenData = target.getAttribute("data-hidden");
        changePage(hiddenData)
}

function changePage(hiddenData) {
        window.location.href = "yourLibrary.php";
        loadNewPage(hiddenData);
        console.log(hiddenData)
        

}


function loadNewPage(hiddenData) {
        fetch(`https://api.themoviedb.org/3/movie/${hiddenData}?api_key=c5fe6d1a7a37ade55ce430078dfb6628`)
            .then(response => response.json())
            .then(data => {
                title = data["title"]
                movieId = data["id"]
                posterPath = "https://image.tmdb.org/t/p/original/" + data["poster_path"]
                initialPageDiv.innerHTML += `<div data-hidden="${movieId}" class="divSelector"><img src="${posterPath}" data-hidden="${movieId}"  style="width:230px" alt="${title} poster">
                <h6 data-hidden="${movieId}">${title}</h6></div>`;
                                              
})

}

