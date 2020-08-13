<?php

namespace App\Console\Commands;

use App\User;
use App\Cuota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;



class CrearCuotas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cuotas:crear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear los registros de la tabla Cuotas para un mes. Esyo se realizará el primero de cada mes, en principio eso creo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dt = Carbon::now();
        $diasMes = $dt->daysInMonth;
        $users = User::whereHas('roles', function ($q) {
            $q->where('name', 'Socio');
        })->select('users.id as id')->get();
        for ($i = 0; $i < $diasMes; $i++) {
            $fecha = $dt->copy()->addDays($i)->toDateString();
            foreach ($users as $user) {
                $var=Cuota::updateOrCreate(['user_id' =>  $user->id, 'fecha' => $fecha],
                [
                    'pago' => '0',
                    'monto' => '0',
                    'observacion' => 'ninguna'
                ]);
            }
        }
    }
}
