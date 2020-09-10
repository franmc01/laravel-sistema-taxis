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
        $admin->foto_perfil="https://image.shutterstock.com/image-vector/blank-avatar-photo-place-holder-600w-1114445501.jpg";
        $admin->save();

        $admin->assignRole('Administrador');

    }
}
