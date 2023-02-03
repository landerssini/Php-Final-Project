const formCreateMovie = document.querySelector("#form-create-movie");
const newMoviedTd = document.querySelector("#new-movie") ;
const createMovieModal = document.querySelector("#create-movie-modal");
formCreateMovie.addEventListener("submit", fetchCreateButton);



function fetchCreateButton(e) {
    e.preventDefault();
    const formData = new FormData(formCreateMovie);
    fetch("./create_movie.php", {   
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            if(data = "correct") {
                newMoviedTd.innerHTML =
                `<td>${formData.get("name")}</td>
                <td>${formData.get("year")}</td>
                <td>${formData.get("genre")}</td>
                <td>${formData.get("director")}</td>
                <td>${formData.get("time")}</td>
                <td>${formData.get("review")}</td>
                <td>""</td>`;

                //FIX MODAL BACKDROP
                // document.body.classList.remove("modal-open");
                // document.querySelector("div").classList.remove("modal-backdrop");
            } 

        }) 

}