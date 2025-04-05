@extends('layouts.app')
@section('title','Registrarse')
@section('content')
<body>

      <div class="container">
        <!-- Formulario De Registro -->
        <form action="{{ route ('registro.store') }}" method="post" id="formulario" onsubmit="return validar();">
          @csrf
          <h2><center>Datos Personales</center></h2>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre(s)</label>
              <input type="text" name ="nombre" class="form-control" id="idnombre" aria-describedby="emailHelp" oninput="Mayus(this)">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Apellido Paterno</label>
              <input type="text" name ="ap_paterno" class="form-control" id="idapaterno" aria-describedby="emailHelp" oninput="Mayus(this)">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Apellido Materno</label>
              <input type="text" name ="ap_materno" class="form-control" id="idamaterno" aria-describedby="emailHelp" oninput="Mayus(this)">
          </div>
          <h2><center>Domicilio</center></h2>
          <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Nombre de la Calle</label>
             <input type="text" name ="calle" class="form-control" id="idcalle" aria-describedby="emailHelp" oninput="Mayus(this)">
          </div>      
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Número de casa/apartamento</label>
            <input type="text" name ="numero" class="form-control" id="idno" aria-describedby="emailHelp" oninput="Numeros(event)">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Colonia</label>
            <input type="text" name ="colonia" class="form-control" id="idcol" aria-describedby="emailHelp" oninput="Mayus(this)">
          </div>
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Código Postal</label>
          <input type="text" name ="cp" class="form-control" id="idcp" aria-describedby="emailHelp" oninput="Numeros(event)">
          </div>       
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ciudad/Provincia</label>
            <input type="text" name ="ciudad" class="form-control" id="idciudad" aria-describedby="emailHelp" oninput="Mayus(this)">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Estado</label>
            <input type="text" name ="estado" class="form-control" id="idestado" aria-describedby="emailHelp" oninput="Mayus(this)">
          </div> 
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Numero de Teléfono</label>
            <input type="tel" name ="telefono" class="form-control" id="idtelefono" aria-describedby="emailHelp" oninput="Numeros(event)">
          </div>
          <h2><center>Datos De Cuenta</center></h2>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Eléctronico</label>
            <input type="email" name="correo" class="form-control" id="idcorreo" aria-describedby="emailHelp"> 
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <div class="password-container">
              <input type="password" name="contrasena" class="form-control" id="idcontrasena" aria-describedby="emailHelp">
              <img src="img/eyeopen.jpg" class="toggle-password" alt="Mostrar contraseña" onclick="mostrarContrasena()">
            </div>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="idcasilla1">
            <label class="form-check-label">Aceptar Terminos Y Condiciones</label>
          </div>
          <center><button type="submit" class="btn btn-primary">Registrarse</button></center>
        </form>
      </div>
</body>
@endsection