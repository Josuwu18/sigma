function guardarSesion(token, usuario) {
    localStorage.setItem("sigma_token", token);
    localStorage.setItem("sigma_user", JSON.stringify(usuario));
}

function obtenerUsuario() {
    const raw = localStorage.getItem("sigma_user");
    return raw ? JSON.parse(raw) : null;
}

function verificarAutenticacion() {
    if (!localStorage.getItem("sigma_token")) {
        window.location.href = "index.html";
    }
}

function cerrarSesion() {
    localStorage.removeItem("sigma_token");
    localStorage.removeItem("sigma_user");
    window.location.href = "index.html";
}