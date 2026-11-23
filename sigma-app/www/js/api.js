async function apiRequest(endpoint, options = {}) {
    const token = localStorage.getItem("sigma_token");

    const headers = {
        "Content-Type": "application/json",
        "Accept": "application/json",
        ...(token ? { "Authorization": `Bearer ${token}` } : {}),
        ...options.headers
    };

    const response = await fetch(`${API_BASE}${endpoint}`, {
        ...options,
        headers
    });

    // Si el token venció o no está autenticado, redirigir al login
    if (response.status === 401) {
        localStorage.removeItem("sigma_token");
        localStorage.removeItem("sigma_user");
        window.location.href = "index.html";
        return;
    }

    const data = await response.json();

    if (!response.ok) {
        throw new Error(data.message || `Error HTTP ${response.status}`);
    }

    return data;
}