// Función para obtener el carrito de manera segura
function obtenerCarrito() {
    let carrito = localStorage.getItem('carrito');

    try {
        let parsedCarrito = JSON.parse(carrito);
        
        // Verificar si el carrito es un array válido
        if (!Array.isArray(parsedCarrito)) {
            throw new Error("Formato incorrecto en carrito");
        }

        return parsedCarrito;
    } catch (e) {
        console.error("Error al parsear JSON de carrito:", e);
        localStorage.removeItem('carrito'); // Eliminar el JSON corrupto
        return []; // Retornar un carrito vacío para evitar errores
    }
}

// Función para guardar el carrito de manera segura
function guardarCarrito(carrito) {
    try {
        if (!Array.isArray(carrito)) {
            throw new Error("Intentando guardar un carrito no válido");
        }
        localStorage.setItem('carrito', JSON.stringify(carrito));
    } catch (e) {
        console.error("Error al guardar el carrito en localStorage:", e);
    }
}

// Función para cargar los productos del carrito
function cargarCarrito() {
    let carrito = obtenerCarrito();
    const carritoBody = document.getElementById('carrito-body');

    // Verificar si el elemento existe antes de modificarlo
    if (!carritoBody) {
        console.error("Elemento 'carrito-body' no encontrado");
        return;
    }

    carritoBody.innerHTML = ''; // Limpiar el contenido antes de cargar
    let total = 0;

    // Agrupar productos por nombre
    const productosAgrupados = {};
    carrito.forEach(producto => {
        if (!productosAgrupados[producto.nombre]) {
            productosAgrupados[producto.nombre] = { ...producto, cantidad: 0 };
        }
        productosAgrupados[producto.nombre].cantidad += producto.cantidad;
    });

    // Crear las filas de la tabla
    for (const nombre in productosAgrupados) {
        const producto = productosAgrupados[nombre];
        const subtotal = producto.precio * producto.cantidad;
        total += subtotal;
        carritoBody.innerHTML += `
            <tr>
                <td>${producto.nombre}</td>
                <td>
                    <input type="number" value="${producto.cantidad}" min="1" onchange="actualizarCantidad('${producto.nombre}', this.value)" class="form-control" style="width: 70px; display: inline;">
                </td>
                <td>$${producto.precio.toFixed(2)}</td>
                <td>$${subtotal.toFixed(2)}</td>
                <td><button class="btn-delete btn-danger" onclick="quitarDelCarrito('${producto.nombre}')">Quitar</button></td>
            </tr>
        `;
    }

    document.getElementById('total').innerText = 'Total: $' + total.toFixed(2);
}

// Función para agregar productos al carrito
function agregarAlCarrito(producto, cantidad) {
    let carrito = obtenerCarrito();
    const existingProductIndex = carrito.findIndex(p => p.nombre === producto.nombre);

    if (existingProductIndex > -1) {
        carrito[existingProductIndex].cantidad += parseInt(cantidad);
    } else {
        producto.cantidad = parseInt(cantidad);
        carrito.push(producto);
    }

    guardarCarrito(carrito);
    cargarCarrito();
}

// Función para quitar productos del carrito
function quitarDelCarrito(nombre) {
    let carrito = obtenerCarrito();
    carrito = carrito.filter(producto => producto.nombre !== nombre);
    guardarCarrito(carrito);
    cargarCarrito();
}

// Función para actualizar la cantidad de un producto en el carrito
function actualizarCantidad(nombre, cantidad) {
    let carrito = obtenerCarrito();
    const productoIndex = carrito.findIndex(producto => producto.nombre === nombre);

    if (productoIndex > -1) {
        carrito[productoIndex].cantidad = parseInt(cantidad);
        guardarCarrito(carrito);
        cargarCarrito();
    }
}

// Función para finalizar la compra
function finalizarCompra() {
    const carrito = obtenerCarrito();
    console.log(carrito); // Ver qué hay en el carrito antes de proceder
    if (carrito.length === 0) {
        alert("Tu carrito está vacío.");
        return;
    }
    // Redirigir al la pagina de pago
    window.location.href = "pago";
}

// Cargar el carrito al inicio
window.onload = cargarCarrito;

function Redirectregistro(){
    window.location.href = "login";
    return true;
}
