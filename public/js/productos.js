    // Array de productos
    const productos = [
        { nombre: 'Coca Cola 600ml', precio: 19.99, imagen: 'img/1.png' },
        { nombre: 'Maizena Vainilla 49g', precio: 15.99, imagen: 'img/2.jpg' },
        { nombre: 'Leche Santa Clara 1L', precio: 29.99, imagen: 'img/3.jpg' },
        {nombre: 'Jabon Zote 400g', precio: 18.99, imagen: 'img/7.jpg'},
        {nombre: 'Galletas Flor De Naranjo 75g', precio: 15.99, imagen: 'img/8.jpg'},
        {nombre: 'Sopa Pluma La Moderna 250g', precio: 9.99, imagen: 'img/9.jpg'}
    ];
    
    // Función para generar productos en el HTML
    function generarProductos() {
        const contenedor = document.getElementById('productos-container');
        productos.forEach(producto => {
            const col = document.createElement('div');
            col.className = 'col';
            col.innerHTML = `
                <div class="card h-100">
                    <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
                    <div class="card-body text-center">
                        <h5 class="card-title">${producto.nombre}</h5>
                        <p class="card-text">$${producto.precio.toFixed(2)}</p>
                        <button class="btn" onclick="agregarAlCarrito({ nombre: '${producto.nombre}', precio: ${producto.precio} })">Agregar al carrito</button>
                    </div>
                </div>
            `;
            contenedor.appendChild(col);
        });
    }
    
    // Función para agregar productos al carrito
    function agregarAlCarrito(producto) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const productoExistenteIndex = carrito.findIndex(item => item.nombre === producto.nombre);
    
        if (productoExistenteIndex > -1) {
            carrito[productoExistenteIndex].cantidad += 1; // Incrementar cantidad
        } else {
            producto.cantidad = 1; // Añadir nuevo producto con cantidad 1
            carrito.push(producto);
        }
        
        localStorage.setItem('carrito', JSON.stringify(carrito));
        alert('Producto agregado al carrito');
    }
    
    // Generar productos al cargar la página
    document.addEventListener('DOMContentLoaded', generarProductos);
