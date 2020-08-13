<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\User;
use App\Cuota;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PerfilController extends Controller
{

    public function index()
    {
        $logeado = User::find(auth()->id());
        return view('Admin\Usuarios\profile', compact('logeado'));
    }

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
}
