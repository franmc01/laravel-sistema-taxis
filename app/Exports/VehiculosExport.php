<?php

namespace App\Exports;

use App\Vehiculo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VehiculosExport implements FromView
{
    /**
     * @return View
     */
    public function view(): View{
        return view('exports.vehiculo',[
            'cars' =>Vehiculo::with('users')->get()
        ]);
    }
}
