const platform = () => {
    let btn = document.getElementById("agregarPlataforma");
    let plataforma = document.getElementById("plataforma");
    let plataformasDiv = document.getElementById("plataformas");
    var plataformas = document.querySelectorAll(".cerrar");

    btn.addEventListener("click", () => {
        let newDiv = document.createElement("div");
        plataformasDiv.appendChild(newDiv);
        newDiv.className =
            "d-flex justify-content-between mb-2 plataforma-item";
        let titulo = document.createElement("div");
        newDiv.appendChild(titulo);
        titulo.textContent = plataforma.value;
        let cross = plataformasDiv.appendChild(document.createElement("span"));
        cross.innerHTML = "&times;";
        cross.className = "cerrar";
        newDiv.appendChild(cross);
        plataformas = document.querySelectorAll(".cerrar");
    });

    plataformas.forEach((element) => {
        element.addEventListener("click", () => {
            /* let div = element.parentElement;
            div.remove(); */
            alert("Wuenas");
        });
    });
};

platform();
