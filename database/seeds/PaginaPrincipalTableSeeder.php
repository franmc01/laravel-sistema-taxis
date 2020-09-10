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
        $pp->historia = 'La Compañía de Taxi Ejecutivo TRANSLASINPAR S.A empezó a funcionar en el año 2013 y ha brindado  sus servicios a la población de la ciudad de Calceta a través de los años siempre con esmero y siendo una compañía responsable y buscando brindar el mejor servicio posible. En el año 2018 cambia su nombre a Compañía de Taxi Convencional TRANS LASINPAR S.A. En la actualidad cuenta con 35 vehículos a disposición de la ciudadanía y cuenta con 4 bases de trabajo a lo largo de la ciudad de Calceta.';
        $pp->mision = 'Dar una respuesta segura y rápida para satisfacer la demanda de transporte de nuestros clientes, de la mano de los mejores precios y el mejor personal de trabajo.';
        $pp->vision = 'Nuestro principal objetivo es brindar un proceso con total cumplimiento y seguridad, garantizando siempre el respeto y atención que se merecen los clientes.';
        $pp->direccion = 'Calle Salinas Y Granda Centeno frente al TIA S.A';
        $pp->telefono1 = '052 686 169';
        $pp->telefono2 = '052 686 786';
        $pp->correo_contacto = 'tejecutivo_translasinpar@hotmail.com';
        $pp->save();
    }
}
