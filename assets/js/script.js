// const togglePassword = document.querySelector(".togglePassword");
const password = document.querySelector(".password");
const searchBarJS = document.querySelector("#searchBar")
const searchBarResults = document.querySelector("#searchBarResults")


// togglePassword.addEventListener("click", function () {
//     const type = password.getAttribute("type") === "password" ? "text" : "password";
//     password.setAttribute("type", type);
//     this.classList.toggle("bi-eye");
// });
// 


searchBarJS.addEventListener('input', refreshList)
function refreshList() {
    searchBarResults.innerHTML = ""
    let searchQuery = searchBarJS.value
    if (!searchQuery == "") {
        searchBarResults.classList.remove = "hidden"
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
                    searchBarResults.innerHTML += `<a href="./movie.php?movie_id=${movieId}" style="text-decoration:none;"> <div class="card text-center" style="width: 9rem; ">
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
            mainInfo.innerHTML += `<img src="https://image.tmdb.org/t/p/original/${data["poster_path"]}" style="width:270px;" alt="${data["title"]} poster"><h3>${data["title"]}</h3><h3>${data["original_title"]}</h3><h3>${data["release_date"]}</h3><h4>${data["status"]}</h4><h5>${data["runtime"]}min</h5>`
            sinopsis.innerHTML += `<p>${data["overview"]}</p>`
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
                posterPath.innerHTML += `<img src="https://image.tmdb.org/t/p/original/${data["poster_path"]}" style="width:270px;" alt="${data["title"]} poster">`
                titleMovie.innerHTML += `<p>${data["title"]}</p>`
                review.innerHTML += `<p>${reviewM}</p>`
                commentDiv.innerHTML += `<p>${commentM}</p>`
            }
            )

    });

};



window.addEventListener('load', loadPage)
let initialPageDiv = document.querySelector("#initialPageDiv")

function loadPage() {
    if (window.location.pathname.includes("/index.php")) {
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

