<?php

namespace App\Http\Controllers\Administracion;
use \Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehiculo;
use App\User;
use Illuminate\Support\Facades\Log;
use Validator;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        //return $a=Vehiculo::with('users')->latest()->get();

        if(request()->ajax())
        {
            $data=Vehiculo::with('users')->latest()->get();
            return datatables()->of($data)
            ->addColumn('action', function($data){
                $button = '<button type="button"
                    name="view" id="'.$data->id.'"
                    class="view btn btn-xs btn-info"><span style="padding-right:5px"><i class="fa fa-eye"></i></span>
                    Visualizar</button>';
                $button .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<button type="button"
                    name="edit" id="'.$data->id.'"
                    class="edit btn btn-xs btn-warning text-white"><span style="padding-right:5px"><i class="fa fa-wrench"></i></span>
                    Editar</button>';
                $button .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<button type="button"
                    name="delete" id="'.$data->id.'"
                    class="delete btn btn-danger btn-xs"><span style="padding-right:5px"><i class="fa fa-ban"></i></span>
                    Banear</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('Admin.Vehiculos.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('Admin.Vehiculos.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'marca.required' => 'Debe ingresar el nombre de la marca',
            'tipoVehiculo.required' => 'Debe ingresar el tipo de vehículo',
            'placa.required' => 'Debe ingresar el número de placa',
            'placa.unique' => 'El número de placa debe ser único',
            'anio.required' => 'Debe ingresar el año de fabricación del vehículo',
            'user_id.required' => 'Debe ingresar el nombre del socio dueño del vehículo',
            'user_id.unique' => 'Debe ingresar un nombre de socio que no esté asociado a otro vehículo',
        ];
        $rules = array(
            'marca'    =>  'required',
            'tipoVehiculo'     =>  'required',
            'placa'         =>  'required|unique:vehiculos,placa',
            'anio'         =>  'required',
            'user_id'         =>  'required|unique:vehiculos,user_id'
        );
        $this->validate($request, $rules, $messages);

        $vehiculo = array(
            'marca'=>$request->marca,
            'tipoVehiculo'=>$request->tipoVehiculo,
            'placa'=>$request->placa,
            'anio'=>$request->anio,
            'user_id'=>$request->user_id,
        );
        Vehiculo::create($vehiculo);
        return redirect('vehiculos/create')->with('creado','El vehículo ha sido creado con éxito');
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
            $data=Vehiculo::with('users')->findOrFail($id);
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
        if(request()->ajax())
        {
            $data=Vehiculo::findOrFail($id);
            return response()->json(['data'=>$data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $aux= Vehiculo::find($request->hidden_id);
        $placa=(string)$aux->placa;
        Log::info($placa);
        $messages = [
            'marca.required' => 'Debe ingresar el nombre de la marca',
            'tipoVehiculo.required' => 'Debe ingresar el tipo de vehículo',
            'placa.required' => 'Debe ingresar el número de placa',
            'placa.unique' => 'El número de placa debe ser único',
            'anio.required' => 'Debe ingresar el año de fabricación del vehículo',
            'user_id.required' => 'Debe ingresar el nombre del socio dueño del vehículo',
            'user_id.unique' => 'Debe ingresar un nombre de socio que no esté asociado a otro vehículo',
        ];
        $rules = array(
            'marca'    =>  'required',
            'tipoVehiculo'     =>  'required',
            'placa'         =>  'required|unique:vehiculos,placa,'.$request->hidden_id,
            'anio'         =>  'required',
            'user_id'         =>  'required|unique:vehiculos,user_id,'.$request->hidden_id
        );
        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors'=>$error->errors()->all()]);

        }

        $form_data=array(
            'marca'=>$request->marca,
            'tipoVehiculo'=>$request->tipoVehiculo,
            'placa'=>$request->placa,
            'anio'=>$request->anio,
            'user_id'=>$request->user_id,
        );
        Vehiculo::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success'=>'Datos actualizados correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vehiculo::findOrFail($id);
        $data->delete();
    }
}
