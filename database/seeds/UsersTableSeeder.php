<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new User();
        $admin->nombres="Limberth Esneider";
        $admin->apellidos="Santander Alcivar";
        $admin->cedula="1315311019";
        $admin->email="admin@admin.com";
        $admin->password=bcrypt('admin123');
        $admin->save();

        $socio=new User();
        $socio->nombres="Francisco Joel";
        $socio->apellidos="Marin Calderón";
        $socio->cedula="1315311009";
        $socio->email="socio@socio.com";
        $socio->password=bcrypt('socio123');
        $socio->save();

        $moderador=new User();
        $moderador->nombres="Martita Julieta";
        $moderador->apellidos="Kardashian Mendoza";
        $moderador->cedula="0987654321";
        $moderador->email="moderador@moderador.com";
        $moderador->password=bcrypt('moderador');
        $moderador->save();

        $admin->assignRole('Administrador');
        $socio->assignRole('Administrador');
        $moderador->assignRole('Moderador');

    }
}
