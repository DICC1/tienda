document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("login-form").addEventListener("submit", function (event) {
        event.preventDefault(); // Evita la recarga de la página

        const email = document.getElementById("email").value;
        const contrasena = document.getElementById("contrasena").value;

        fetch("/login/validar", { // Ajusta la ruta según tu configuración en web.php
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({ email, contrasena }) // Enviar datos en formato JSON
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                localStorage.setItem("token", data.token); // Guarda el token en localStorage
                window.location.href = "/"; // Redirige si el login es exitoso
            } else {
                alert(data.mensaje); // Muestra mensaje de error
            }
        })
        .catch(error => console.error("Error:", error));
    });
});
