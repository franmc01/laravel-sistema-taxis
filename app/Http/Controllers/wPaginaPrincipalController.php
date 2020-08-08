<?php

namespace App\Http\Controllers;

use App\PaginaPrincipal;
use Illuminate\Http\Request;

class PaginaPrincipalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info_pagina = PaginaPrincipal::all();
        return view('Paginaprincipal.principal', compact('info_pagina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $info_pagina = PaginaPrincipal::all();
        return view('Paginaprincipal.crud.edit', compact('info_pagina'));

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
        if (request()->ajax()) {
            $datos = PaginaPrincipal::find($id);
            $datos->historia = $request->historia;
            $datos->mision = $request->mision;
            $datos->vision = $request->vision;
            $datos->direccion = $request->direccion;
            $datos->telefono1 = $request->telefono1;
            $datos->telefono2 = $request->telefono2;
            $datos->correo_contacto = $request->correo_contacto;
            $datos->save();
            return response()->json(['success' => 'Data update successfully. ']);
        }
    }

}
