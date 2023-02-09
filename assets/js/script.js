// const togglePassword = document.querySelector(".togglePassword");
const password = document.querySelector(".password");
const searchBarJS = document.querySelector("#searchBar")
const searchBarResults = document.querySelector("#searchBarResults")


// togglePassword.addEventListener("click", function () {
//     const type = password.getAttribute("type") === "password" ? "text" : "password";
//     password.setAttribute("type", type);
//     this.classList.toggle("bi-eye");
// });



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
            <div class="container">
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
                <div class="col-6 m-5" id="Sinopsis">
                    <div class="d-flex justify-content-center p-5"></div>
                    <h3 class="d-flex align-self-xl-start ml-4">Sinopsis:</h3>
                    <p>${data["overview"]}</p>
                </div>
                
                
                
            </div>
          </div>`;
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



// if (window.location.pathname.includes("/movie.php")) {
//     let movieIdDiv = document.querySelector("#mainInfo").parentElement
//     let idFecth = movieIdDiv.getAttribute("movie_id")
//     let mainInfo = document.querySelector("#mainInfo")
//     let sinopsis = document.querySelector("#sinopsis")
//     let comments = document.querySelector("#comments")
//     fetch(`https:api.themoviedb.org/3/movie/${idFecth}?api_key=c8e111a0d93537cc581d6268be26297b&language=es-ES`)
//         .then(response => response.json())
//         .then(data => {
//             console.log(data)
//             let genres = data.genres;
//             let genresString = [];
//             genres.forEach(element => {
//                 let name = element.name
//                 genresString.push(name)
//             })
//             let finalGenres = genresString.toString();
//             let companies = data.production_companies;
//             let companiesString = [];
//             companies.forEach(element => {
//                 let nameComp = element.name
//                 companiesString.push(nameComp)
//             })
//             let finalCompanies = companiesString.toString();
            

            
//             // genres = genres["name"];
            
//             mainInfo.innerHTML += `
//             <div class="container">
//             <div class="row">
//                 <h1 class="d-flex justify-content-center p-5">${data["title"]}</h1>
//                 <div class="col-6" id="poster">
//                 <img class="rounded mx-auto d-block" src="https://image.tmdb.org/t/p/original/${data["poster_path"]}" style="width:360px;" alt="${data["title"]} poster">
//                 </div>
//                 <div class="col-3" id="filmInfo">
//                 <h3 class="d-flex justify-content-center">Film Info:</h3>
//                    <ul class="list-group list-group-flush mt-5">
//                       <li class="list-group-item">Genres:       ${finalGenres}.</li>
//                       <li class="list-group-item">Release date: ${data["release_date"]}.</li>
//                       <li class="list-group-item">Revenue: ${data["revenue"]}$. </li>
//                       <li class="list-group-item">Duration: ${data["runtime"]} minutes. </li>
//                       <li class="list-group-item">Vote average: ${data["vote_average"]}. </li>
//                   </ul>
//                 </div>
//                 <div class="col-3" id="production">
//                   <h3 class="d-flex justify-content-center">Production:</h3>
//                   <ul class="list-group list-group-flush mt-5">
//                     <li class="list-group-item">Original Language: ${data["original_language"]}.</li>
//                     <li class="list-group-item">Budget: ${data["budget"]}$.</li>
//                     <li class="list-group-item">Production companies: ${finalCompanies}.</li>
//                 </ul>
//                 </div>
//             </div>
//             <div class="row">
//                 <div class="col-6" id="Sinopsis">
//                     <div class="d-flex justify-content-center p-5"></div>
//                     <h3 class="d-flex align-self-xl-start ml-4">Sinopsis:</h3>
//                     <p>${data["overview"]}</p>
//                 </div>
//                 <div class="col-6" id="YourOpinion">
                
//                     <h3 class="d-flex justify-content-center">Your Opinion:</h3>
//                 <form  id="formRating">
//                 <div class="clasificacion">
                    
//                     <input id="radio1" type="radio" name="Review" value="5" hidden>
//                     <label for="radio1">★</label>
//                     <input id="radio2" type="radio" name="Review" value="4" hidden>
//                     <label for="radio2">★</label>
//                     <input id="radio3" type="radio" name="Review" value="3" hidden>
//                     <label for="radio3">★</label>
//                     <input id="radio4" type="radio" name="Review" value="2" hidden>
//                     <label for="radio4">★</label>
//                     <input id="radio5" type="radio" name="Review" value="1" hidden>
//                     <label for="radio5">★</label>
//                     <!-- <input id="radio0" type="radio" name="Review" value="0" hidden checked> -->
//                     <textarea class="form-control" id="textArea" rows="5" name="Comments"></textarea>
//                     <input type="submit" class="btn btn-primary" value="Save">
//                 </div>

//             </form>
//                 </div>
                
                
//             </div>
//           </div>`;
//         })
//         .then(function() {
//             let form = document.querySelector("#formRating");
//             form.addEventListener("submit", function(event) {
//                 event.preventDefault()
//                 let textValue = document.querySelector("#textArea")                
//                 textValue = textValue.value
//                 let radios = document.getElementsByName("Review")
//                 for (var i = 0, length = radios.length; i < length; i++) {
//                     if (radios[i].checked) {
//                       let pick = radios[i]
//                       pick = pick.getAttribute('value');
//                       console.log(pick)
//                       console.log(textValue)
//                       let url = window.location.href
//                       let numbers = url.match(/\d+/g).map(function(number) {
//                         return parseInt(number, 10);
//                       });
//                       let idFilm = numbers[0]
//                     //   let data = { "Review" : pick, "Comments" : textValue, "ID" : idFilm };

//                       fetch("./addReview.php", {
//                       method: "POST",
//                       headers:{
//                         'Content-Type': 'application/x-www-form-urlencoded'
//                       },
//                       body: `/Review=${pick}&ID=${idFilm}&Comments=${textValue}`
//                       })
//                             .then(response => response.json())
//                             .then(data => console.log(data))
//                             .catch(error => console.error(error));



//                     }}
                
//             })
//             })
// }