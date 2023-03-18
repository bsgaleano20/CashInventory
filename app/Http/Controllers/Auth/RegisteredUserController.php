<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = DB::table('rol')->get();

        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Id_usuario' => ['required', 'numeric', 'unique:'.Usuario::class],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Usuario::class],
            'celular' => ['numeric'],
            'direccion' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'Rol_id_rol' => ['required', 'numeric'],
        ]);

        $usuario_habilitado='A';

        $user = Usuario::create([
            // 'Id_usuario' => $request->Id_usuario,
            'Id_usuario' => '1012343567',
            'nombre_usuario' => $request->name,
            'email' => $request->email,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
            'habilitado_usuario' => $usuario_habilitado,
            'Rol_id_rol' => $request->Rol_id_rol,

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
