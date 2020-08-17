<?php

namespace App\Http\Controllers\Administracion;

use App\Chofer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ChoferesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if (request()->ajax()) {
            $data=Chofer::with('users')->latest()->get();
            return datatables()->of($data)
            ->addColumn('editar', 'Snnipets.edit_chofer')
            ->addColumn('ver', 'Snnipets.ver_chofer')
            ->addColumn('delete', 'Snnipets.eliminar_chofer')
            ->rawColumns(['editar','ver','delete'])
            ->make(true);
        }
        return view('Admin.Choferes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Choferes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request()->ajax()) {
            $messages = [
                'cedula.required' => 'Debe ingresar un número de cédula al chofer',
                'nombres.required' => 'Debe ingresar los nombres del chofer',
                'apellidos.required' => 'Debe ingresar los apellidos del chofer',
                'cedula.unique' => 'El número de cédula no debe pertenecer a otro chofer',
                'email.required' => 'Debe ingresar el correo eléctronico',
                'telefono.required' => 'Debe ingresar un número telefónico',
                'email.email' => 'Debe ingresar un correo eléctronico válido',
                'user_id.required' => 'Debe ingresar el nombre del socio dueño del vehículo',
                'user_id.unique' => 'Debe ingresar un nombre de socio que no esté asociado a otro chofer',
            ];
            $rules = array(
                'cedula'    =>  'required|unique:choferes,cedula',
                'nombres'     =>  'required',
                'apellidos'         =>  'required',
                'email'         =>  'required|email',
                'licencia'         =>  'required',
                'telefono'         =>  'required',
                'user_id'         =>  'required|unique:choferes,user_id'
            );
            $this->validate($request, $rules, $messages);
            $chofer = array(
                'cedula' => $request->cedula,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'licencia' => $request->licencia,
                'telefono' => $request->telefono,
                'user_id' => $request->user_id,
            );
            Chofer::create($chofer);
            return response()->json(['success' => 'Data added successfully. ']);
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
        if (request()->ajax()) {
            $data = Chofer::with('users')->findOrFail($id);
            return response()->json(['data' => $data]);
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
        $chofer = Chofer::with('users')->find($id);
        return view('Admin.Choferes.edit', compact('chofer'));
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
            $messages = [
                'cedula.required' => 'Debe ingresar un número de cédula al chofer',
                'nombres.required' => 'Debe ingresar los nombres del chofer',
                'apellidos.required' => 'Debe ingresar los apellidos del chofer',
                'cedula.unique' => 'El número de cédula no debe pertenecer a otro chofer',
                'email.required' => 'Debe ingresar el correo eléctronico',
                'telefono.required' => 'Debe ingresar un número telefónico',
                'email.email' => 'Debe ingresar un correo eléctronico válido',
                'user_id.required' => 'Debe ingresar el nombre del socio dueño del vehículo',
                'user_id.unique' => 'Debe ingresar un nombre de socio que no esté asociado a otro chofer',
            ];
            $rules = array(
                'cedula'    =>  'required|unique:choferes,cedula,'.$request->chofer_id,
                'nombres'     =>  'required',
                'apellidos'         =>  'required',
                'email'         =>  'required|email',
                'licencia'         =>  'required',
                'telefono'         =>  'required',
                'user_id'         =>  'required|unique:choferes,user_id,'.$request->chofer_id
            );
            $this->validate($request, $rules, $messages);
            $chofer = Chofer::find($id);
            $chofer->cedula = $request->cedula;
            $chofer->nombres = $request->nombres;
            $chofer->apellidos = $request->apellidos;
            $chofer->email = $request->email;
            $chofer->licencia = $request->licencia;
            $chofer->telefono = $request->telefono;
            $chofer->user_id = $request->user_id;
            $chofer->save();
            return response()->json(['success' => 'Data successfully. ']);
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
        $chofer = Chofer::find($id);
        $chofer->delete();
        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);

    }
}
