const platform = () => {
    let btn = document.getElementById("agregarPlataforma");
    let plataforma = document.getElementById("plataforma");
    let form = document.getElementById("form");
    let plataformasDiv = document.getElementById("plataformas");

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
        input = checkbox(plataforma.value);
        form.appendChild(input);
        document.querySelectorAll(".cerrar").forEach((element) => {
            element.addEventListener("click", () => {
                let div = element.parentElement;
                div.remove();
            });
        });
    });
};

const checkbox = (plataforma) => {
    let newInput = document.createElement("input");
    newInput.name = "plataformas[]";
    newInput.type = "checkbox";
    newInput.value = plataforma;
    newInput.checked = true;
    newInput.style.display = "none";

    return newInput;
};

platform();
