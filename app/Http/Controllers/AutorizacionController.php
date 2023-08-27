<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorizacion;

class AutorizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $autorizaciones = Autorizacion::all();

        $autorizaciones = Autorizacion::select(
            'autorizacion.id',
            'usuarios.nombre_usuario',
            'autorizacion.nombre_autorizacion',
            'autorizacion.aprobacion_autorizacion',
            'autorizacion.Solicitante_id_usuario',
            'autorizacion.updated_at',)
         ->join('usuarios', 'autorizacion.Solicitante_id_usuario', '=', 'usuarios.id')
         ->where('autorizacion.aprobacion_autorizacion', 'P')
         ->get();
        
        return view('/vistas_compartidas/autorizaciones/autorizacion', compact('autorizaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id)
    {
        //Actualización de la autorización para APROBAR

        Autorizacion::where('id', $id)->update([
            'aprobacion_autorizacion'=>'A'
        ]);

        return redirect()->route("autorizacion.index")->with('aprobacion_movimiento', 'Movimiento de productos aprobado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //consultar las autorizaciones aprobadas o rechazadas
        $historial = Autorizacion::select(
            'autorizacion.id',
            'usuarios.nombre_usuario',
            'autorizacion.nombre_autorizacion',
            'autorizacion.aprobacion_autorizacion',
            'autorizacion.Solicitante_id_usuario',
            'autorizacion.updated_at',)
         ->join('usuarios', 'autorizacion.Solicitante_id_usuario', '=', 'usuarios.id')
         ->whereIn('aprobacion_autorizacion', ['A', 'R'])
         ->get();

        // Mostrar el historial de autorizaciones aprobadas o rechazadas
        return view('/vistas_compartidas/autorizaciones/autorizacion_historial', compact('historial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Actualización de la autorización para RECHAZAR

        Autorizacion::where('id', $id)->update([
            'aprobacion_autorizacion'=>'R'
        ]);

        return redirect()->route("autorizacion.index")->with('aprobacion_movimiento', 'Movimiento de productos rechazado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
