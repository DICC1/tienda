@extends('layouts.app')
@section('title','Resumen De Compra')
@section('content')
<body>
  <div class="container my-4">
    <h2>Detalles de tu Compra</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="resumen-body">
            <!-- Aquí se llenarán los productos del carrito -->
        </tbody>
    </table>
    <h4 id="total-resumen">Total: $0.00</h4>
  </div>

  <div class="container">
    <center>
      <h2>¡El Repartidor Te Solicitara El Siguiente Código QR, Muestraselo Para Que Puedas Recibir Tus Articulos, Al Dar Clic En "Confirmar Compra" Ya No Tendras Acceso Al Codigo QR Asi Que Guardalo Bien!</h2>
      <div id="codigo-qr"></div>
      <div id="resumen-texto"></div> <!-- Aquí se mostrará el resumen de la compra -->
    </center>  
  </div>
  
  <div class="container">
    <center><h3>¡Gracias Por Tu Compra!</h3></center>  
    <center><button class="btn btn-primary" onclick="confirmarCompra()">Confirmar Compra</button></center>

  </div>

</body>
@endsection