@extends('layouts.app')
@section('title','Perfil')
@section('content')
<body>
    <div class="container">
        <!-- Tarjeta de Perfil -->
        <div class="card profile-card">
            <div class="card-header profile-header text-center py-3">
                <h4 class="mb-0">Mi Perfil</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-4">
                    <div class="col-md-3 text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="Usuario" class="profile-img rounded-circle">
                    </div>
                    <div class="col-md-9">
                        <h5 class="mb-1">{{ session('usuario')['nombre'] ?? 'Usuario' }} {{ session('usuario')['ap_paterno'] ?? 'Usuario' }} {{ session('usuario')['ap_materno'] ?? 'Usuario' }}</h5>
                        <p class="text-muted mb-2">Cliente desde: 15/03/2022</p>
                        <span class="badge bg-success">Cliente frecuente</span>
                    </div>
                </div>

                <!-- Información Básica -->
                <div class="mb-4">
                    <h5 class="mb-3">Información de Contacto</h5>
                    <div class="row mb-2">
                        <div class="col-sm-3 fw-bold">Teléfono:</div>
                        <div class="col-sm-9">{{ session('usuario')['telefono'] ?? 'Usuario' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 fw-bold">Correo:</div>
                        <div class="col-sm-9">{{ session('usuario')['email'] ?? 'Usuario' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 fw-bold">Dirección:</div>
                        <div class="col-sm-9">{{ session('usuario')['calle'] ?? 'Usuario' }}, {{ session('usuario')['numero'] ?? 'Usuario' }}, {{ session('usuario')['colonia'] ?? 'Usuario' }}, {{ session('usuario')['codigo_postal'] ?? 'Usuario' }}, MÉXICO</div>
                    </div>
                </div>

                <!-- Historial de Compras -->
                <div class="mb-4">
                    <h5 class="mb-3">Últimas Compras</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Orden #10025 - $350.00
                            <span class="badge bg-primary rounded-pill">15/05/2023</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Orden #10018 - $420.50
                            <span class="badge bg-primary rounded-pill">08/05/2023</span>
                        </li>
                    </ul>
                </div>

                <!-- Acciones -->
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">
                        <i class="bi bi-pencil"></i> Editar Perfil
                    </button>
                    <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#confirmDelete">
                        <i class="bi bi-trash"></i> Eliminar Cuenta
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación para Eliminar -->
    <div class="modal fade" id="confirmDelete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro que deseas eliminar tu cuenta permanentemente?</p>
                    <p class="fw-bold">Esta acción no se puede deshacer y perderás todo tu historial de compras.</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('eliminar.cliente', session('usuario')['id_cliente']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Sí, Eliminar Cuenta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
