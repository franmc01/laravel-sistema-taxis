<?php

namespace App\Http\Controllers\Correos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MensajeContacto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;




class ContactController extends Controller implements ShouldQueue
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $correo=request();
        Mail::to('francmarinc@gmail.com')->send(new MensajeContacto($correo));
    }

}
