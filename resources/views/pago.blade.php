@extends('layouts.app')
@section('title','Metodo De Pago')
@section('content')
<body>
    <div class="container my-4">
        <form method="post" id="formulariopago">
        <h4>Datos De La Tarjeta</h4>
        <h4>----------------------------------------------------------------------------------------------------------------------------------------</h4>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre Del Titular</label>
                <input type="tel" class="form-control" id="idnombre" aria-describedby="emailHelp" oninput="Mayus(this)">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Numero De Tarjeta</label>
                <input type="text" class="form-control" id="idcard" aria-describedby="emailHelp" oninput="Numeros(event)">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha De Expiración</label>
                <input type="text" class="form-control" id="iddate" aria-describedby="emailHelp" oninput="autoCompleteSlash(event)">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">CVV</label>
                <input type="text" class="form-control" id="idcvv" aria-describedby="emailHelp" oninput="Numeros(event)">
            </div>
            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="casilla2">
            <label class="form-check-label" for="exampleCheck1">Aceptar Terminos Y Condiciones</label>
            </div>
        </form>
        <center><button type="submit" class="btn" onclick="return procesopago();">Pagar</button></center>

    </div>
</body>
@endsection