<?php

namespace App\Exports;

use App\Cuota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class CuotasExport implements FromView{

    public $data; // declaras la propiedad

    public function __construct($data)
    {
        $this->data = $data; // asignas el valor inyectado a la propiedad
    }

    /**
     * @return View
     */
    public function view(): View{
        return view('exports.cuota_socio',[
            'cuota' =>$this->data
        ]);
    }
}
