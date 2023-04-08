<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Usuario;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // inner Join entre la tabla de usuarios y roles para mostrar en la vista del front
        $usuarios = DB::table('rol')->join("usuarios","usuarios.Rol_id_rol","=", "rol.id_rol")
        ->select("*")->get();

        // Se retorna vista con la tabla obtenida del inner join
        return view('/administrador/gestion_usuario/gestion_usuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create in auth controller - RegisteredUserController
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Store in auth controller - RegisteredUserController
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


        // Si se ejecuta busqueda en blanco se muestra el inner join con la información completa
        if($busqueda==""){
            $usuarios = DB::table('rol')->join("usuarios","usuarios.Rol_id_rol","=", "rol.id_rol")
            ->select("*")->get();
        }
        // Si se ejecuta busqueda en con algún filtro o información se muestra el inner join con el where
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

        //Tabla Rol
        $roles = DB::table('rol')->get();

        //Iner Join entre usuarios y roles
        $users_join = DB::table('rol')->join("usuarios","usuarios.Rol_id_rol","=", "rol.id_rol")
            ->select("*")
            ->where("usuarios.id", "=", $id)
            ->get();
        
        //se recorre el join con cada usuario
        foreach ($users_join as $usuario){
            $usuario_y_rol = $usuario;
        }

        // Se busca el usuario en específico a editar
        $usuarios = Usuario::find($id);

        // Se retorna vista con el id del usuario que se editará en Update
        return view("/administrador/gestion_usuario/edit_user", compact('usuarios', 'roles', 'usuario_y_rol'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Se valida integridad de información
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'celular' => ['numeric'],
            'direccion' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'Rol_id_rol' => ['required', 'numeric'],
        ]);

        // Se Actualiza información en la base de datos
        Usuario::where('id', $id)->update([
            'id' => $request->id,
            'nombre_usuario' => $request->name,
            'email' => $request->email,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
            'habilitado_usuario' => $request->estado,
            'Rol_id_rol' => $request->Rol_id_rol,

        ]);

        // Se retorna vista con mensaje de confirmación de actualizado
        return redirect()->route("gestion_usuario.index")->with('editar_usuario', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Verificar si el ID es válido
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->route("gestion_usuario.index")->with('eliminar_usuario', 'El ID de usuario proporcionado no es válido');
        }
        else{
            //Se ubica el usuario a eliminar
            $registro = Usuario::find($id);

            if (!$registro) {
                // Si no se encuentra usuario --NO DEBERIA EJECUTARSE
                return redirect()->route("gestion_usuario.index")->with('eliminar_usuario', 'No se pudo encontrar el usuario a eliminar');
            }
            else{
                // Si encuentra el usuario
                $registro->delete();
                return redirect()->route("gestion_usuario.index")->with('eliminar_usuario', 'Usuario eliminado correctamente');
            }
        }
        
    }
}
