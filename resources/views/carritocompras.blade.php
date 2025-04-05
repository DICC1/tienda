@extends('layouts.app')
@section('title','Carrito De Compras')
@section('content')
<body>

<div class="container my-4" >
    <h2>Carrito de Compras</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="carrito-body">
            <!-- Aquí se llenarán los productos -->
        </tbody>
    </table>
    <h4 id="total">Total: $0.00</h4>
    <center><button type="submit" class="btn btn-primary" onclick="return finalizarCompra();">Comprar</button></center>
</div>

</body>
@endsection