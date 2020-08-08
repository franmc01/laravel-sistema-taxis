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
        return view('Paginaprincipal.principal');
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
        //
    }
}
