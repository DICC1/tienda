@extends('layouts.app')
@section('title','Inicio De Sesión')
@section('content')
<body>
    <div class="container">

        <form action="{{ route ('login.validar') }}" method="post">
        @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Correo Eléctronico</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1">
            </div>
            <center><button type="submit" class="btn">Iniciar sesión</button></center>
        </form>
    </div>
    @if(session('success'))
       <div class="alert alert-success">
           {{ session('success') }}
       </div>
    @endif

    @if(session('error'))
       <div class="alert alert-danger">
           {{ session('error') }}
       </div>
    @endif    
</body>
@endsection