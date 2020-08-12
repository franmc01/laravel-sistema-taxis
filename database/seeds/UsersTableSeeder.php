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
        $admin = new User();
        $admin->nombres = "Limberth Esneider";
        $admin->apellidos = "Santander Alcivar";
        $admin->cedula = "1314555267";
        $admin->email = "admin@admin.com";
        $admin->password = bcrypt('admin123');
        $admin->save();

        $admin1 = new User();
        $admin1->nombres = "Francisco Joel";
        $admin1->apellidos = "Marin Calderón";
        $admin1->cedula = "1315311009";
        $admin1->email = "socio@socio.com";
        $admin1->password = bcrypt('socio123');
        $admin1->save();

        $socio1 = new User();
        $socio1->nombres = "Martita Julieta";
        $socio1->apellidos = "Kardashian Mendoza";
        $socio1->cedula = "0987654321";
        $socio1->email = "moderador@moderador.com";
        $socio1->password = bcrypt('12345');
        $socio1->save();

        $socio2 = new User();
        $socio2->nombres = "Jose Jair";
        $socio2->apellidos = "Santander Mendoza";
        $socio2->cedula = "1111111111";
        $socio2->email = "moderador@moderador.com";
        $socio2->password = bcrypt('12345');
        $socio2->save();

        $socio3 = new User();
        $socio3->nombres = "Maria Karen";
        $socio3->apellidos = "Estrella de la Mañana";
        $socio3->cedula = "2222222222";
        $socio3->email = "moderador@moderador.com";
        $socio3->password = bcrypt('12345');
        $socio3->save();

        $admin->assignRole('Administrador');
        $admin1->assignRole('Administrador');
        $socio1->assignRole('Socio');
        $socio2->assignRole('Socio');
        $socio3->assignRole('Socio');

    }
}
