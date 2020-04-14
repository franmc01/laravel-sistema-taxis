<?php

namespace App\Http\Controllers\Administracion;
use \Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehiculo;
use App\User;
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
                    View</button>';
                $button .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<button type="button"
                    name="edit" id="'.$data->id.'"
                    class="edit btn btn-xs btn-warning"><span style="padding-right:5px"><i class="fa fa-pencil"></i></span>
                    Edit</button>';
                $button .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<button type="button"
                    name="delete" id="'.$data->id.'"
                    class="delete btn btn-danger btn-xs"><span style="padding-right:5px"><i class="fa fa-ban"></i></span>
                    Delete</button>';
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
        ];
        $rules = array(
            'marca'    =>  'required',
            'tipoVehiculo'     =>  'required',
            'placa'         =>  'required|unique:vehiculos,placa',
            'anio'         =>  'required',
            'user_id'         =>  'required'
        );
        $this->validate($request, $rules, $messages);
//        $error = Validator::make($request->all(), $rules);

//        if($error->fails())
//        {
//            return response()->json(['errors'=>$error->errors()->all()]);
//        }

        $vehiculo = array(
            'marca'=>$request->marca,
            'tipoVehiculo'=>$request->tipoVehiculo,
            'placa'=>$request->placa,
            'anio'=>$request->anio,
            'user_id'=>$request->user_id,
        );
        Vehiculo::create($vehiculo);
//        return response()->json(['success'=>'Data added successfully. ']);
        return redirect('vehiculos/create')->with('creado','El uso de tierra ha sido creado');
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
        
        $rules = array(
            'marca'    =>  'required',
            'tipoVehiculo'     =>  'required',
            'placa'         =>  'required',
            'anio'         =>  'required',
            'user_id'         =>  'required'
        );
        $error = Validator::make($request->all(), $rules);

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
