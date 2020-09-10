<?php

namespace App\Http\Controllers\Administracion;

use App\Chofer;
use App\Exports\ChoferesExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
        Log::info($request);
        if (request()->ajax()) {
            $messages = [
                'fecha_inicio.date' => 'Debe ingresar una fecha de inicio válida',
                'fecha_fin.date' => 'Debe ingresar una fecha de finalización válida',
                'cedula.required' => 'Debe ingresar un número de cédula al chofer',
                'nombres.required' => 'Debe ingresar los nombres del chofer',
                'apellidos.required' => 'Debe ingresar los apellidos del chofer',
                'cedula.unique' => 'El número de cédula no debe pertenecer a otro chofer',
                'email.required' => 'Debe ingresar el correo eléctronico',
                'telefono.required' => 'Debe ingresar un número telefónico',
                'email.email' => 'Debe ingresar un correo eléctronico válido',
                'user_id.required' => 'Debe ingresar el nombre del socio dueño del vehículo',
                'user_id.unique' => 'Debe ingresar un nombre de socio que no esté asociado a otro chofer',
                'foto_perfil.image' => 'La foto de perfil debe ser una imagen',
                'foto_perfil.mimes' => 'La foto de perfil debe ser una imagen con formato jpeg, jpg o png',
                'foto_perfil.max' => 'La foto de perfil debe tener máximo 10mb',

            ];
            $rules = array(
                'cedula'    =>  'required',
                'nombres'     =>  'required',
                'apellidos'         =>  'required',
                'email'         =>  'required|email',
                'licencia'         =>  'required',
                'telefono'         =>  'required',
                'fecha_inicio'         =>  'date|nullable',
                'fecha_fin'         =>  'date|nullable',
                'user_id'         =>  'required',
                'foto_perfil'         =>  'image|mimes:jpeg,jpg,png,gif|nullable|max:10000',
            );
            $this->validate($request, $rules, $messages);
            $chofer = array(
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'foto_perfil' => $request->file('imagen') <> null ? $request->file('imagen')->store('choferes', 'public'): null,
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
            Log::info($request);
            $chofer = Chofer::find($id);
            if ($request->hasFile('foto_perfil')) {
                $messages = [
                    'fecha_inicio.date' => 'Debe ingresar una fecha de inicio válida',
                    'fecha_fin.date' => 'Debe ingresar una fecha de finalización válida',
                    'cedula.required' => 'Debe ingresar un número de cédula al chofer',
                    'nombres.required' => 'Debe ingresar los nombres del chofer',
                    'apellidos.required' => 'Debe ingresar los apellidos del chofer',
                    'cedula.unique' => 'El número de cédula no debe pertenecer a otro chofer',
                    'email.required' => 'Debe ingresar el correo eléctronico',
                    'telefono.required' => 'Debe ingresar un número telefónico',
                    'email.email' => 'Debe ingresar un correo eléctronico válido',
                    'user_id.required' => 'Debe ingresar el nombre del socio dueño del vehículo',
                    'user_id.unique' => 'Debe ingresar un nombre de socio que no esté asociado a otro chofer',
                    'foto_perfil.image' => 'La foto de perfil debe ser una imagen',
                    'foto_perfil.mimes' => 'La foto de perfil debe ser una imagen con formato jpeg, jpg o png',
                    'foto_perfil.max' => 'La foto de perfil debe tener máximo 10mb',
                ];
                $rules = array(
                    'cedula'    =>  'required',
                    'nombres'     =>  'required',
                    'apellidos'         =>  'required',
                    'email'         =>  'required|email',
                    'licencia'         =>  'required',
                    'telefono'         =>  'required',
                    'fecha_inicio'         =>  'date|nullable',
                    'fecha_fin'         =>  'date|nullable',
                    'user_id'         =>  'required',
                    'foto_perfil'         =>  'image|mimes:jpeg,jpg,png,gif|nullable|max:10000',
                );

                $this->validate($request, $rules, $messages);
                Storage::delete($chofer->foto_perfil);
                $chofer->foto_perfil = $request->file('foto_perfil')->store('choferes', 'public');
                $chofer->fecha_inicio = $request->fecha_inicio;
                $chofer->fecha_fin = $request->fecha_fin;
                $chofer->cedula = $request->cedula;
                $chofer->nombres = $request->nombres;
                $chofer->apellidos = $request->apellidos;
                $chofer->email = $request->email;
                $chofer->licencia = $request->licencia;
                $chofer->telefono = $request->telefono;
                $chofer->user_id = $request->user_id;
            } else {
                $messages = [
                    'fecha_inicio.date' => 'Debe ingresar una fecha de inicio válida',
                    'fecha_fin.date' => 'Debe ingresar una fecha de finalización válida',
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
                    'cedula'    =>  'required',
                    'nombres'     =>  'required',
                    'apellidos'         =>  'required',
                    'email'         =>  'required|email',
                    'licencia'         =>  'required',
                    'telefono'         =>  'required',
                    'fecha_inicio'         =>  'date|nullable',
                    'fecha_fin'         =>  'date|nullable',
                    'user_id'         =>  'required'
                );

                $this->validate($request, $rules, $messages);
                $chofer->fecha_inicio = $request->fecha_inicio;
                $chofer->fecha_fin = $request->fecha_fin;
                $chofer->cedula = $request->cedula;
                $chofer->nombres = $request->nombres;
                $chofer->apellidos = $request->apellidos;
                $chofer->email = $request->email;
                $chofer->licencia = $request->licencia;
                $chofer->telefono = $request->telefono;
                $chofer->user_id = $request->user_id;
            }
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


    public function reporteChoferes()
    {
        return Excel::download(new ChoferesExport, 'choferes.xlsx');
    }
}
