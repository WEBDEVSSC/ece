<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use App\Models\PersonalUnidad;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    //
    public function usuariosIndex()
    {
        $login = Auth::user();

        $usuarios = User::where('clues_id', $login->clues_id)->get();

        return view('settings.usuarios.index-usuario', compact('usuarios'));
    }

    public function usuariosShow($id)
    {
        $usuario = User::findOrFail($id);

        $login = Auth::user();

        if ($usuario->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para ver este usuario.');
        }
    
        return view('settings.usuarios.show-usuario', compact('usuario'));
    }

    public function usuariosCreate()
    {
        $roles = Rol::all();    

        $usuario = Auth::user();

        return view('settings.usuarios.create-usuario', compact('roles', 'usuario'));
    }

    public function usuariosStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'rol' => 'required|string|max:255',
        ],[
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser un texto válido.',
            'email.email' => 'Ingrese un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser un texto válido.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',

            'rol.required' => 'Debe seleccionar un rol.',
            'rol.string' => 'El rol seleccionado no es válido.',
            'rol.max' => 'El nombre del rol no puede tener más de 255 caracteres.',
        ]);

        $login = Auth::user();

        $usuario = new User();

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->role_id = $request->rol;
        $usuario->clues_id = $login->clues_id;

        $usuario->save();

        return redirect()->route('usuariosIndex')->with('success', 'Usuario creado exitosamente.');
    }

    public function usuariosEdit($id)
    {
        $usuario = User::findOrFail($id);
        $login = Auth::user();

        if ($usuario->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para ver este usuario.');
        }

        $roles = Rol::all();

        return view('settings.usuarios.edit-usuario', compact('usuario', 'roles'));
    }

    public function usuariosUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'rol' => 'required|string|max:255',
        ],[
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser un texto válido.',
            'email.email' => 'Ingrese un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.nullable' => 'La contraseña es opcional.',
            'password.string' => 'La contraseña debe ser un texto válido.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',

            'rol.required' => 'Debe seleccionar un rol.',
            'rol.string' => 'El rol seleccionado no es válido.',
            'rol.max' => 'El nombre del rol no puede tener más de 255 caracteres.',
        ]);

        $usuario = User::findOrFail($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->password) 
        {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->role_id = $request->rol;

        $usuario->save();

        return redirect()->route('usuariosIndex')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function usuariosDestroy($id)
    {
        $usuario = User::findOrFail($id);

        $login = Auth::user();

        if ($usuario->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para eliminar este usuario.');
        }

        $usuario->delete();

        return redirect()->route('usuariosIndex')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function createUsuarioPersonalUnidad($id)
    {
        $usuario = User::findOrFail($id); 

        $login = Auth::user();

        $personalUnidad = PersonalUnidad::where('clues_id', $login->clues_id)->get();

        if ($usuario->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para editar este usuario.');
        }

        return view('settings.usuarios.asignar-personal-create', compact('usuario', 'personalUnidad'));
    }

    public function updateUsuarioPersonalUnidad(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $login = Auth::user();

        if ($usuario->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para actualizar este usuario.');
        }

        $request->validate([
            'personal_id' => 'required|exists:personal_unidad,id',
        ],[
            'personal_id.required' => 'Debe seleccionar un personal de salud.',
            'personal_id.exists' => 'El personal de salud seleccionado no es válido.',
        ]);

        $usuario->personal_id = $request->input('personal_id');
        $usuario->save();

        return redirect()->route('usuariosIndex')->with('success', 'Personal de salud asignado al usuario exitosamente.');
    }
}
