// 1. Constantes de todos los elementos del HTML.
const formLogin = document.getElementById("login");
const inputUser = document.getElementById("user");
const inputPassword = document.getElementById("password");
const btnToggle = document.getElementById("toggle");
const alerta = document.getElementById("alert");
const btnSubmit = formLogin.querySelector('button[type="submit"]');

// Función auxiliar para mostrar u ocultar mensajes de error
function mostrarError(mensaje) {
    alerta.textContent = mensaje;
    alerta.hidden = false;
}

function ocultarError() {
    alerta.textContent = "";
    alerta.hidden = true;
}

// 2. Funcionalidad del botón del ojito
btnToggle.addEventListener("click", () => {
    const esPassword = inputPassword.type === "password";
    inputPassword.type = esPassword ? "text" : "password";
    btnToggle.setAttribute("aria-pressed", String(esPassword));
});

// 3. Qué pasa cuando el usuario presiona "Iniciar sesión"
formLogin.addEventListener("submit", async (evento) => {
    // Evita que la página se recargue sola (comportamiento por defecto de los <form>)
    evento.preventDefault();
    ocultarError();

    // .trim() quita espacios accidentales al inicio o al final
    const usuario = inputUser.value.trim();
    const password = inputPassword.value;

    // Validación básica antes de molestar al servidor
    if (!usuario || !password) {
        mostrarError("Por favor, ingresa tu usuario/documento y contraseña.");
        return;
    }

    // Desactivamos el botón mientras responde Render (por si tarda unos segundos)
    btnSubmit.disabled = true;
    btnSubmit.textContent = "Ingresando...";

    try {
        // 4. Enviamos los datos a tu ruta POST de Laravel
        // OJO: Verifica que los nombres ("user" y "password") coincidan con lo que espera tu AuthController en Laravel
        const respuesta = await apiRequest("/login", {
            method: "POST",
            body: JSON.stringify({
                user: usuario,
                password: password
            })
        });

        // 5. Si Laravel respondió bien, guardamos el token y los datos del usuario
        guardarSesion(respuesta.token, respuesta.user);

        // 6. Redirigimos al panel principal (cambia "dashboard.html" por el nombre de tu siguiente vista)
        window.location.href = "dashboard.html";

    } catch (error) {
        // Si Laravel devuelve error (ej. credenciales incorrectas), lo mostramos en pantalla
        mostrarError(error.message || "Usuario o contraseña incorrectos.");
    } finally {
        // Pase lo que pase, volvemos a habilitar el botón
        btnSubmit.disabled = false;
        btnSubmit.textContent = "Iniciar sesión";
    }
});