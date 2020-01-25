<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaTipoSolicitudTransferencia extends Seeder
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
                'tipo' => 'Remesas',
                'activo' => 1,
            ),

            "2" => array(
                'tipo' => 'Viajes',
                'activo' => 1,
            ),

            "3" => array(
                'tipo' => 'Donación',
                'activo' => 1,
            ),

            "4" => array(
                'tipo' => 'Tratamiento Médico',
                'activo' => 1,
            ),

            "5" => array(
                'tipo' => 'Hotel',
                'activo' => 1,
            ),

            "6" => array(
                'tipo' => 'Estudios',
                'activo' => 1,
            ),

            "7" => array(
                'tipo' => 'Préstamo',
                'activo' => 1,
            ),

            "8" => array(
                'tipo' => 'Servicios',
                'activo' => 1,
            ),

            "9" => array(
                'tipo' => 'Importación',
                'activo' => 1,
            ),

            "10" => array(
                'tipo' => 'Otros',
                'activo' => 1,
            ),

        );

        foreach ($tipos as $key => $tipo) {
            DB::table('TiposSolicitudTransferencia')->insert([
             'Tipo' => $tipo['tipo'],
             'Activo' => $tipo['activo'],
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'upldated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
