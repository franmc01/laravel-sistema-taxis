<?php

namespace App\Exports;

use App\Chofer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ChoferesExport implements FromView
{
    /**
     * @return View
     */
    public function view(): View{
        return view('exports.chofer',[
            'choferes' =>Chofer::with('users')->where('fecha_fin', '=', null)->get()
        ]);
    }
}
