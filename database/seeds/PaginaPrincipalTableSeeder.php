<?php

use App\PaginaPrincipal;
use Illuminate\Database\Seeder;

class PaginaPrincipalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pp = new PaginaPrincipal();
        $pp->historia = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, ad unde eaque. Rem numquam cumque, voluptate, dolor iure, repudiandae officiis voluptates aspernatur sapiente quisquam fugit!';
        $pp->mision = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, ad unde eaque. Rem numquam cumque, voluptate, dolor iure, repudiandae officiis voluptates aspernatur sapiente quisquam fugit!';
        $pp->vision = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, ad unde eaque. Rem numquam cumque, voluptate, dolor iure, repudiandae officiis voluptates aspernatur sapiente quisquam fugit!';
        $pp->direccion = 'Calle Salinas Y Granda Centeno Diagonal al TIA S.A';
        $pp->telefono1 = '052 686 169';
        $pp->telefono2 = '052 686 786';
        $pp->correo_contacto = 'tejecutivo_translasinpar@hotmail.com';
        $pp->save();
    }
}
