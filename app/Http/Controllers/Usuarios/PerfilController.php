<?php

namespace App\Http\Controllers\Usuarios;

use App\Chofer;
use App\Cuota;
use App\Http\Controllers\Controller;
use App\User;
use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
class PerfilController extends Controller
{

    //Esto de aqui es para todo lo que tiene que ver con mi perfil de usuario

    public function index()
    {
        $logeado = User::find(auth()->id());
        $vehiculo = Vehiculo::where('user_id', $logeado->id)->get();
        $chofer = Chofer::where('user_id', $logeado->id)->get();
        return view('Admin.Usuarios.profile', compact('logeado', 'vehiculo', 'chofer'));
    }

    public function contrasena()
    {
        $info = User::find(auth()->user()->id);
        return view('Admin\Usuarios\password', compact('info'));
    }

    /**
     *  Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Cambiocontrasena(Request $request, $id)
    {
        if (request()->ajax()) {
            $datos = User::find($id);
            if ($request->filled('password')) {
                $datos->password = Hash::make($request->password);
            }
            $datos->save();
            return response()->json(['success' => 'Contraseña actualizada correctamente']);

        }
    }


    public function actualizarFoto(Request $request, $id){
        if (request()->ajax()) {
            $datos = User::find($id);
            Storage::delete($datos->foto_perfil);
            $datos->foto_perfil = "storage/".$request->file('foto_perfil')->store('perfiles', 'public');
            $datos->save();
            return response()->json(['success' => 'Foto actualizada correctamente']);
        }
    }



    //Esto de aqui es para las cuotas
    public function cuotasocio()
    {
        return view('Admin\Usuarios\cuotas');
    }



    public function consultarCuota(Request $request)
    {
        $fecha1 = $request->get('fecha1');
        $fecha2 = $request->get('fecha2');
        $info = User::find(auth()->id());
        $user = $info->id;
        if (request()->ajax()) {
            $fecha = Cuota::with('users')
                ->Fecha1($fecha1)
                ->Fecha2($fecha2)
                ->User($user)
                ->get();
            return datatables()->of($fecha)
                ->toJson();
        }
    }
}
