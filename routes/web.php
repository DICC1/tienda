<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controlador;


Route::get('/', [Controlador::class, 'index']) -> name('clientes.index');
Route::get('/registro', [Controlador::class, 'createRegistro']);
Route::post('/registro', [Controlador::class, 'store']) -> name('registro.store');

Route::get('/login', [Controlador::class, 'createLogin']);
Route::post('/login', [Controlador::class, 'validar' ])->name('login.validar') ;

Route::post('/logout', function() {
    auth()->logout();  // Cierra sesión de Laravel
    session()->flush(); // Elimina todos los datos de sesión
    return response()->json(['message' => 'Sesión cerrada']);
});

Route::get('/pago', [Controlador::class, 'createPago']);

Route::get('/resumencompra', [Controlador::class, 'createResumenCompra']);

Route::get('/perfil', [Controlador::class, 'createPerfil']);

Route::delete('/cliente/eliminar/{id}', [Controlador::class, 'eliminarCliente'])->name('eliminar.cliente');
