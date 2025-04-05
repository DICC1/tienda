async function verificarSesion() {
    try {
        // 1. Verificar sesión con credenciales
        const response = await fetch('/verificar-sesion', {
            method: 'GET',
            credentials: 'include', // ¡IMPORTANTE! Envía cookies
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        // 2. Verificar si la respuesta es JSON
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            throw new Error('Respuesta no es JSON');
        }

        const data = await response.json();

        // 3. Redirigir según autenticación
        if (data.autenticado) {
            window.location.href = '/resumencompra';
        } else {
            // Guardar carrito antes de redirigir
            localStorage.setItem('carrito_pendiente', JSON.stringify(obtenerCarrito()));
            window.location.href = '/login?redirect=' + encodeURIComponent(window.location.pathname);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al verificar sesión. Intente nuevamente.');
    }
}