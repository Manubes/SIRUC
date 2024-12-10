document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("registroForm");
    const mensaje = document.getElementById("mensaje");

    form.addEventListener("submit", function (event) {
        const nombre = document.getElementById("nombre").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();

        if (nombre === "" || email === "" || password === "") {
            event.preventDefault();
            mensaje.textContent = "Por favor, complete todos los campos.";
            mensaje.style.color = "red";
        } else if (password.length < 6) {
            event.preventDefault();
            mensaje.textContent = "La contraseña debe tener al menos 6 caracteres.";
            mensaje.style.color = "red";
        } else {
            mensaje.textContent = "Procesando...";
            mensaje.style.color = "blue";
        }
    });
});