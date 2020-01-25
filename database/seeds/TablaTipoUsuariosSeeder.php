<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaTipoUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = array(
            "1" => array(
                'tipo' => 'Persona Fisica',
                'activo' => 1,
            ),

            "2" => array(
                'tipo' => 'Persona Juridica',
                'activo' => 1,
            ),

            "3" => array(
                'tipo' => 'Empleado Remextiven',
                'activo' => 1,
            ),
        );

        foreach ($tipos as $key => $tipo) {
            DB::table('TiposUsuario')->insert([
             'Tipo' => $tipo['tipo'],
             'Activo' => $tipo['activo'],
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'upldated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
