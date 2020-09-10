<?php

namespace App\Exports;

use App\User;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{

    /**
     * @return View
     */
    public function view(): View{
        return view('exports.user',[
            'users' =>User::with('vehiculos')->get()
        ]);
    }
}
