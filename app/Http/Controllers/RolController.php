<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function rolesIndex()
    {
        // Cargamos todos los roles
        $roles =  Rol::all();

        // Regresamos a la vista y pasamos el objero
        return view('settings.roles.index-rol', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function rolesCreate()
    {
        //
        return view('settings.roles.create-rol');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function rolesStore(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'rol'=>'required',
            'descripcion'=>'required',
        ],[
            'rol.required' => 'El campo es obligatorio.',
            'descripcion.required' => 'El campo es obligatorio.',
        ]);

        // Creamos el objeto y asignamos los valores
        $rol = new Rol();

        $rol->rol = $request->rol;
        $rol->descripcion = $request->descripcion;

        $rol->save();

        return redirect()->route('rolesIndex')->with('success', 'Registro realizado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function rolesEdit($id)
    {
        // Consultamos los datos
        $rol = Rol::findOrFail($id);

        // Retornamos la vista con el objeto
        return view('settings.roles.edit-rol', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function rolesUpdate(Request $request, $id)
    {
        //
        // Validamos los datos
        $request->validate([
            'rol'=>'required',
            'descripcion'=>'required',
        ],[
            'rol.required' => 'El campo es obligatorio.',
            'descripcion.required' => 'El campo es obligatorio.',
        ]);

        // Buscar el registro por su ID
        $rol = Rol::find($id);

        // Modificar campos
        $rol->rol = $request->rol;
        $rol->descripcion = $request->descripcion;

        // Guardar cambios en la base de datos
        $rol->save();

        // Regresamos la vista con el mensaje
        return redirect()->route('rolesIndex')->with('update', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function rolesDelete($id)
    {
        // Seleccionamos el registro
        $rol = Rol::findOrFail($id);

        // Lo eliminamos
        $rol->delete();

        // Regresamos a la vista con el mensaje
        return redirect()->route('rolesIndex')->with('delete', 'Registro eliminado correctamente');
    }
}
