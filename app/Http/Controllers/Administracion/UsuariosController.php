<?php

namespace App\Http\Controllers\Administracion;

use App\Events\UserWasCreated;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('Admin.Usuarios.index', compact('usuarios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('Admin.Usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data=new User();
        $data->nombres=$request->nombres;
        $data->apellidos=$request->apellidos;
        $data->foto_perfil=$request->file('imagen')->store('perfiles','public');
        $data->cedula=$request->cedula;
        $data->email=$request->correo;
        $contraseña=str_random(8);
        $data->password=Hash::make($contraseña);
        $data->save();
        $data->assignRole($request->roles);
        UserWasCreated::dispatch($data,$contraseña);
        return redirect()->route('usuarios.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos=User::find($id);
        $roles=Role::all();
        return view('Admin.Usuarios.edit',compact('datos','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=User::find($id);
        if ($request->hasFile('foto_perfil')) {
            Storage::delete($datos->foto_perfil);
            $datos->foto_perfil=$request->file('foto_perfil')->store('perfiles','public');
            $datos->nombres=$request->nombres;
            $datos->apellidos=$request->apellidos;
            $datos->cedula=$request->cedula;
            $datos->email=$request->email;
            $datos->syncRoles($request->roles);
        } else {
            $datos->nombres=$request->nombres;
            $datos->apellidos=$request->apellidos;
            $datos->cedula=$request->cedula;
            $datos->email=$request->email;
            $datos->foto_perfil=$datos->foto_perfil;
            $datos->syncRoles($request->roles);
        }

        if ($request->filled('password')) {
            $datos->password=Hash::make($request->password);
        }
        $datos->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       $user=User::find($id);
            $user->delete();
            return redirect()->route('usuarios.index');
    }


    /**Listado de metodos adicionales*/


    /**Metodo de traer los registros inactivos */
    public function eliminados()
    {
        $usuarios = User::onlyTrashed()->get();
        return view('Admin.Usuarios.eliminados', compact('usuarios'));
    }

    /**Metodo de resatura los registros inactivos */
    public function user_restore($id){
        User::withTrashed()->find($id)->restore();
        return redirect()->route('usuarios.eliminados');
    }

    /**Metodo de elimina completamente los registros inactivos de la base de datos */
    public function user_force($id){
        User::withTrashed()->find($id)->forceDelete();
        return redirect()->route('usuarios.eliminados');
    }
}
