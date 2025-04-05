<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset ('css/styles.css') }}">
    <link rel="stylesheet" href="{{asset ('css/perfil.css') }}">

    <title>@yield('title')</title>
</head>
<body>
    <div class="wrapper">
    @include('partials.header')
    <main Class="content pb-6">
        @yield('content')
    </main>

    @include('partials.footer')
    </div>
    
    @yield('scripts')

    <script>
    // Manejo de submenús en Bootstrap 5
        document.addEventListener('DOMContentLoaded', function () {
            // Selecciona todos los submenús
            var dropdownSubmenus = document.querySelectorAll('.dropdown-submenu .dropdown-toggle');
            
            dropdownSubmenus.forEach(function (submenu) {
                submenu.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Cierra cualquier otro submenú abierto
                    var allSubmenus = document.querySelectorAll('.dropdown-submenu .dropdown-menu');
                    allSubmenus.forEach(function (otherSubmenu) {
                        if (otherSubmenu !== submenu.nextElementSibling) {
                            otherSubmenu.classList.remove('show');
                        }
                    });
                    
                    // Alterna el submenú seleccionado
                    var nextEl = submenu.nextElementSibling;
                    if (nextEl && nextEl.classList.contains('dropdown-menu')) {
                        nextEl.classList.toggle('show');
                    }
                });
            });
            
            // Cierra los submenús cuando se cierra el dropdown principal
            document.querySelectorAll('.nav-item.dropdown').forEach(function (dropdown) {
                dropdown.addEventListener('hide.bs.dropdown', function () {
                    var allSubmenus = dropdown.querySelectorAll('.dropdown-menu');
                    allSubmenus.forEach(function (submenu) {
                        submenu.classList.remove('show');
                    });
                });
            });
        });
    </script>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://rawgit.com/jeromeetienne/jquery-qrcode/master/jquery.qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="{{asset('js/productos.js')}}"></script>
    <script src="{{asset('js/procedimientocompra.js')}}"></script>
    <script src="{{asset('js/transaccion.js')}}"></script>
    <script src="{{asset('js/validar.js')}}"></script>
    <script src="{{asset('js/carrito.js')}}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="{{ asset('js/logout.js') }}"></script>
    <script>
// Resumen de compra y generación de código QR
  function cargarResumenCompra() {
      let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
      const resumenBody = document.getElementById('resumen-body');
      resumenBody.innerHTML = ''; // Limpiar el contenido antes de cargar
      let total = 0;
      let detallesCompra = 'Artículos Comprados:\n'; // Variable para almacenar el resumen de la compra

      carrito.forEach(producto => {
          const subtotal = producto.precio * producto.cantidad;
          total += subtotal;
          resumenBody.innerHTML += `
              <tr>
                  <td>${producto.nombre}</td>
                  <td>${producto.cantidad}</td>
                  <td>$${producto.precio.toFixed(2)}</td>
                  <td>$${subtotal.toFixed(2)}</td>
              </tr>
          `;
          // Agregar detalles del producto al resumen
          detallesCompra += `${producto.nombre} (x${producto.cantidad}): $${subtotal.toFixed(2)}\n`;
      });

      document.getElementById('total-resumen').innerText = 'Total: $' + total.toFixed(2);
      
      // Generar el código QR con el resumen de compra
      generarCodigoQR(detallesCompra, total); // Generar el código QR con los detalles de compra
  }

  function confirmarCompra() {
      alert("Compra Confirmada. Gracias por su compra.");
      localStorage.removeItem('carrito'); // Limpiar el carrito después de confirmar la compra
      cargarResumenCompra(); // recargar nuevamente el resumen
      window.location.href = "/";

  }

  function generarCodigoQR(detallesCompra, total) {
      const datosResumen = `${detallesCompra}Total: $${total.toFixed(2)}`;
      if (total > 0) {
          $('#codigo-qr').qrcode({
              text: datosResumen,
              width: 128,
              height: 128
          });
          $('#resumen-texto').text(datosResumen); // Mostrar el resumen en texto
      } else {
          $('#codigo-qr').empty(); // Limpiar el div si no hay total
          $('#resumen-texto').text(''); // Limpiar el texto si no hay total
      }
  }

  document.addEventListener('DOMContentLoaded', function() {
      cargarResumenCompra(); // Cargar el resumen de compra al iniciar
      // Manejo de menú desplegable
      const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu > .dropdown-toggle');
      dropdownSubmenus.forEach(function (submenu) {
          submenu.addEventListener('click', function (e) {
              e.preventDefault();
              this.nextElementSibling.classList.toggle('show');
              this.classList.toggle('active');
          });
      });
  });
</script>
</body>
</html>