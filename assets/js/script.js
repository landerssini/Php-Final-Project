
const password = document.querySelector(".password");
const searchBarJS = document.querySelector("#searchBar");
const searchBarResults = document.querySelector("#searchBarResults");
const searchView = document.querySelector(".search-hidden");

searchBarJS.addEventListener('input', refreshList);
searchBarJS.addEventListener('keyup',  viewModalResult);

function viewModalResult(){
    searchView.style.display = "block";

    if (searchBarJS.value === "") {
        searchView.style.display = "none";
    }else {
        searchView.style.display = "block";
    }

}

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
                    searchBarResults.innerHTML += `<a href="./movie.php?movie_id=${movieId}" style="text-decoration:none;"> <div class="card text-center border-0" style="width: 9rem; ">
                    <div class movie__img-box>
                      <img src="${posterPath}" class="card-img-top" alt="${title} poster">
                    </div>
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
            

            
            // genres = genres["name"];
            
            mainInfo.innerHTML += `
            <section class="container" id="pageMovie">
            <div class="row">
                <div class="col-md-12">
                    <h1>${data["title"]}</h1>
                </div>
                <div class="col-md-4">
                    <img src="https://image.tmdb.org/t/p/original/${data["poster_path"]}" style="width:360px;" alt="${data["title"]} poster">
                </div>
                <div class="col-md-8 d-flex">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Film Info:</h3>
                            <ul class="list-group list-group-flush mt-5">
                                <li class="list-group-item">Genres:       ${finalGenres}.</li>
                                <li class="list-group-item">Release date: ${data["release_date"]}.</li>
                                <li class="list-group-item">Revenue: ${data["revenue"]}$. </li>
                                <li class="list-group-item">Duration: ${data["runtime"]} minutes. </li>
                                <li class="list-group-item">Vote average: ${data["vote_average"]}. </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Production:</h3>
                            <ul class="list-group list-group-flush mt-5">
                                <li class="list-group-item">Original Language: ${data["original_language"]}.</li>
                                <li class="list-group-item">Budget: ${data["budget"]}$.</li>
                                <li class="list-group-item">Production companies: ${finalCompanies}.</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <h3>Sinopsis:</h3>
                            <p>${data["overview"]}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
          `;
        })
        
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
        fetch("https://api.themoviedb.org/3/movie/top_rated?api_key=c5fe6d1a7a37ade55ce430078dfb6628&language=es-ES&page=2")
            .then(response => response.json())
            .then(data =>
                data['results'].forEach(movie => {
                    let title = movie["title"]
                    let movieId = movie["id"]
                    if (movie["poster_path"]) {
                        var posterPath = "https://image.tmdb.org/t/p/original/" + movie["poster_path"]
                    }
                    else { var posterPath = "assets/Skeleton.png" }
                    initialPageDiv.innerHTML += `<a href="./movie.php?movie_id=${movieId}" style="text-decoration:none; color:black;" ><div class="card text-center border-0" style="width: 18rem;">
        <img src="${posterPath}" " class="card-img-top img-hover-zoom--quick " alt="${title} poster">
        <div class="card-body">
        <h5 class="card-title">${title}</h5></div>
        </div></a>`
                    console.log(movie);
                })
            )
    }
}




///////////////////////////////////////////////////////////////////Validacion Formulario Registro

const forms = document.getElementById('form');
const inputs = document.querySelectorAll('#form input');

const condicion = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
}

const fields = {
	nombre: false,
	password: false,
	correo: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(condicion.nombre, e.target, 'nombre');
		break;
		case "password":
			validarCampo(condicion.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "correo":
			validarCampo(condicion.correo, e.target, 'correo');
		break;
	}
}

const validarCampo = (condicion, input, campo) => {
	if(condicion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		fields[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		fields[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		fields['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		fields['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});


