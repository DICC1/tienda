// Función para cargar los productos del carrito
function cargarCarrito() {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const carritoBody = document.getElementById('carrito-body');
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
                <td><button class="btn btn-danger" onclick="quitarDelCarrito('${producto.nombre}')">Quitar</button></td>
            </tr>
        `;
    }

    document.getElementById('total').innerText = 'Total: $' + total.toFixed(2);
}

// Función para agregar productos al carrito
function agregarAlCarrito(producto, cantidad) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const existingProductIndex = carrito.findIndex(p => p.nombre === producto.nombre);

    if (existingProductIndex > -1) {
        carrito[existingProductIndex].cantidad += parseInt(cantidad);
    } else {
        producto.cantidad = parseInt(cantidad);
        carrito.push(producto);
    }
    
    localStorage.setItem('carrito', JSON.stringify(carrito));
    cargarCarrito(); // Recarga el carrito para reflejar los cambios
}

// Función para quitar productos del carrito
function quitarDelCarrito(nombre) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito = carrito.filter(producto => producto.nombre !== nombre); // Quitar todos los productos del mismo nombre
    localStorage.setItem('carrito', JSON.stringify(carrito));
    cargarCarrito(); // Recarga el carrito para reflejar los cambios
}

// Función para actualizar la cantidad de un producto en el carrito
function actualizarCantidad(nombre, cantidad) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const productoIndex = carrito.findIndex(producto => producto.nombre === nombre);

    if (productoIndex > -1) {
        carrito[productoIndex].cantidad = parseInt(cantidad);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        cargarCarrito(); // Recarga el carrito para reflejar los cambios
    }
}

// Función para finalizar la compra
function finalizarCompra() {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    console.log(carrito); // Agregar esta línea para ver qué hay en el carrito
    if (carrito.length === 0) {
        alert("Tu carrito está vacío.");
        return;
    }
    // Redirigir al resumen de compra
    window.location.href = "SesionActivaPago.html";
}

// Cargar el carrito al inicio
window.onload = cargarCarrito;

function Redirectregistro(){
    window.location.href = "login";
    return true;
}
