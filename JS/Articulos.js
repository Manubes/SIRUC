// MGTI. Eduardo Palacios Manubes
document.addEventListener("DOMContentLoaded", function () {
    cargarUsuarios();
    cargarTemas();
});

function cargarUsuarios() {
    fetch("CargaUsuarios.php")
        .then((response) => response.json())
        .then((data) => {
            const usuarioSelect = document.getElementById("usuario");
            usuarioSelect.innerHTML = data
                .map(
                    (usuario) =>
                        `<option value="${usuario.idusuario}">${usuario.nombre}</option>`
                )
                .join("");
        })
        .catch((error) => console.error("Error al cargar usuarios:", error));
}

function cargarTemas() {
    fetch("CargaTemas.php")
        .then((response) => response.json())
        .then((data) => {
            const temaSelect = document.getElementById("tema");
            temaSelect.innerHTML = data
                .map(
                    (tema) => `<option value="${tema.idtema}">${tema.tema}</option>`
                )
                .join("");
        })
        .catch((error) => console.error("Error al cargar temas:", error));
}