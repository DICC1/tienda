<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\HttpClients\SpringBootHttpClient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class Controlador extends Controller
{
    public function index(){
        $url = env ('URL_SERVER_API','localhost:8080'); 
        $response = Http::get($url.'/clientes');
        $data = $response ->json();

        return view('/welcome', compact ('data'));
    }
    public function createRegistro(){
        return view('registro');
    }
    public function createLogin(){
        return view('login');
    }
    public function createPago(){
        return view('pago');
    }
    public function createResumenCompra(){
        return view('resumencompra');
    }
    public function createPerfil(){
        return view('perfil');
    }
    public function store(Request $request){
        $url = env ('URL_SERVER_API','localhost:8080'); 
        $response = Http::post($url.'/clientes', [
            'id_cliente' => $request -> id_cliente,
            'nombre' => $request->nombre,
            'email' => $request->correo,
            'contrasena' => $request->contrasena,
        ]);
        return redirect() -> route('clientes.index');
    }
    public function eliminarCliente($id)
{
    $url = env('URL_SERVER_API', 'http://localhost:8080');
    $response = Http::delete("$url/clientes/$id");

    if ($response->successful()) {
        // Cerrar sesión después de eliminar el cliente
        auth()->logout(); // Cierra la sesión de Laravel
        session()->flush(); // Elimina todos los datos de sesión

        // Redirigir al login con un mensaje de éxito
        return redirect('/')->with('success', 'Cliente eliminado correctamente. Has sido desconectado.');
    } else {
        return redirect()->route('clientes.index')->with('error', 'No se pudo eliminar el cliente');
    }
}


    public function validar(Request $request){
    $url = env('URL_SERVER_API', 'http://localhost:8080');
    
    try {
        $response = Http::post($url.'/login', [
            'email' => $request->email,
            'contrasena' => $request->contrasena,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            
            if ($data['success']) {
                // Autenticación exitosa
                session(['usuario' => $data['usuario']]);
                session()->save();
                session()->regenerate();
                return redirect()->route('clientes.index')
                    ->with('success', 'Bienvenido '.$data['usuario']['nombre']);
            } else {
                // Credenciales incorrectas
                return redirect('/login')
                ->withInput()
                    ->with('error', $data['message'] ?? 'Credenciales incorrectas');
            }
        } else {
            // Error en la conexión con la API
            return redirect('/login')
            ->withInput()
                ->with('error', 'Datos Incorrectos');
        }
    } catch (\Exception $e) {
        // Error inesperado
        return redirect('/login')
            ->withInput()
            ->with('error', 'Ocurrió un error inesperado');
    }
}
public function verificarSesion(Request $request)
{
    return response()->json([
        'autenticado' => $request->user() ? true : false,
        'usuario' => $request->user() ? [
            'id_cliente' => $request->user()->id_cliente,
            'nombre' => $request->user()->nombre,
            'email' => $request->user()->email
        ] : null
    ]);
}
}
