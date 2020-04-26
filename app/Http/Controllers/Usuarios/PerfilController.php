<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index(){
        $info=User::find(auth()->user()->id);
        return view('Admin\Usuarios\password', compact('info'));
    }

    /**
     *  Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Cambiocontrasena(Request $request, $id){
        if(request()->ajax()){
                $datos = User::find($id);
                if ($request->filled('password')) {
                    $datos->password = Hash::make($request->password);
                }
                $datos->save();
            return response()->json(['success'=>'Contraseña actualizada correctamente']);

        }
    }
}
