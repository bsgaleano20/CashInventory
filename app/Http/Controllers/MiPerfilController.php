<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class MiPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vistas_compartidas/mi_perfil');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'phone' => ['numeric'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        Usuario::where('id', $request->id)->update([
            'celular' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route("mi_perfil")->with('actualizar_usuario', 'Usuario actualizado correctamente');
    }

}
