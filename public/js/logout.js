async function cerrarSesion(event) {
    // Prevenir comportamiento por defecto
    if (event) event.preventDefault();
    
    try {
        // Obtener el token CSRF de manera segura
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
        
        if (!csrfToken) {
            console.error("No se encontró el token CSRF");
            // Limpieza de emergencia
            localStorage.clear();
            sessionStorage.clear();
            window.location.href = '/login';
            return;
        }

        // 1. Cerrar sesión en Laravel
        await fetch('/logout', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            }
        });

        // 2. Limpieza de almacenamiento
        localStorage.clear();
        sessionStorage.clear();

        // 3. Redirección forzada
        window.location.replace('/login');

    } catch (error) {
        console.error("Error al cerrar sesión:", error);
        window.location.replace('/login');
    }
}