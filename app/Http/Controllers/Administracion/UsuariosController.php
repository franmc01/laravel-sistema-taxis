<?php

namespace App\Http\Controllers\Administracion;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){

            return datatables()
                    ->eloquent(User::query())
                    ->addColumn('role', function ($query) { $user = User::find($query->id); return  $user->getRoleNames()->implode(',');})
                    ->addColumn('btnshow', function(User $user) { return view('Snnipets\show_user', compact('user'));})
                    ->addColumn('btnedit','Snnipets.edit_user')
                    ->addColumn('btndelete', function(User $user) { return view('Snnipets\delete_user', compact('user'));})
                    ->rawColumns(['btnshow','btnedit','btndelete'])
                    ->toJson();
        }
        return view('Admin.Usuarios.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('Admin.Usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->ajax()){
        $data = new User();
        $data->nombres = $request->nombres;
        $data->apellidos = $request->apellidos;
        $data->foto_perfil = $request->file('imagen')->store('perfiles', 'public');
        $data->cedula = $request->cedula;
        $data->email = $request->correo;
        $contraseña = str_random(8);
        $data->password = Hash::make($contraseña);
        $data->save();
        $data->assignRole($request->roles);
        UserWasCreated::dispatch($data, $contraseña);
               return response()->json(['success'=>'Data added successfully. ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(request()->ajax())
        {
            $data=User::findOrFail($id);
            return response()->json(['data'=>$data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = User::find($id);
        $roles = Role::all();
        return view('Admin.Usuarios.edit', compact('datos', 'roles'));
    }


    /**
     *  Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(request()->ajax())
        {
        $datos = User::find($id);
        if ($request->hasFile('foto_perfil')) {
            Storage::delete($datos->foto_perfil);
            $datos->foto_perfil = $request->file('foto_perfil')->store('perfiles', 'public');
            $datos->nombres = $request->nombres;
            $datos->apellidos = $request->apellidos;
            $datos->cedula = $request->cedula;
            $datos->email = $request->email;
            $datos->syncRoles($request->roles);
        } else {
            $datos->nombres = $request->nombres;
            $datos->apellidos = $request->apellidos;
            $datos->cedula = $request->cedula;
            $datos->email = $request->email;
            $datos->foto_perfil = $datos->foto_perfil;
            $datos->syncRoles($request->roles);
        }

        if ($request->filled('password')) {
            $datos->password = Hash::make($request->password);
        }

        $datos->save();
        return response()->json(['success'=>'Data successfully. ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user = User::find($id);
            $user->vehiculos()->delete();
            $user->delete();
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
    }


    /**Listado de metodos adicionales
    Metodo de traer los registros inactivos */
    public function eliminados()
    {
        if (request()->ajax()) {
            return datatables()
                ->eloquent(User::onlyTrashed())
                ->addColumn('role', function ($query) { $user = User::onlyTrashed()->find($query->id); return  $user->getRoleNames()->implode(','); })
                ->addColumn('btnrestore', function(User $user){ return view('Snnipets.restore_user',compact('user')); })
                ->addColumn('btndestroy', function(User $user){ return view('Snnipets.destroy_user',compact('user')); })
                ->rawColumns(['btnrestore', 'btndestroy'])
                ->toJson();
        }
        return view('Admin.Usuarios.eliminados');
    }


    /**Metodo de restaura los registros inactivos */
    public function user_restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return redirect()->route('usuarios.eliminados');
    }


    /**Metodo de elimina completamente los registros inactivos de la base de datos */
    public function user_force($id)
    {
        User::withTrashed()->find($id)->forceDelete();
        return redirect()->route('usuarios.eliminados');
    }
}
