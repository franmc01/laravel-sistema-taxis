<?php

namespace App\Http\Controllers\Correos;

use App\Http\Controllers\Controller;
use App\Mail\MensajeContacto;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $correo = request();
        Mail::to('francmarinc@gmail.com')->send(new MensajeContacto($correo));
    }

}
