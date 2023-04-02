<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $usuarios = DB::table('usuarios')->get();
        $usuarios = DB::table('rol')->join("usuarios","usuarios.Rol_id_rol","=", "rol.id_rol")
        ->select("*")->get();


        return view('/administrador/gestion_usuario/gestion_usuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //Trayendo opciones de filtro de la vista
        
        $busqueda = $request->get('id');
        $filtro = $request->get('filtro');
        
        //filtrando por los datos de la tabla Rol o Usuario
        if ($filtro=="nombre_rol"){
            $tabla = "rol.".$filtro;
        }
        else{
            $tabla = "usuarios.".$filtro;
        }

        if($busqueda==""){
            $usuarios = DB::table('rol')->join("usuarios","usuarios.Rol_id_rol","=", "rol.id_rol")
            ->select("*")->get();
        }
        else{
            $usuarios = DB::table('rol')->join("usuarios","usuarios.Rol_id_rol","=", "rol.id_rol")
            ->select("*")
            ->where($tabla, "=", $busqueda)
            ->get();  
        }
        
         
        return view('/administrador/gestion_usuario/gestion_usuarios', compact('usuarios','busqueda','filtro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
