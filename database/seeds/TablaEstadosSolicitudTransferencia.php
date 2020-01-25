<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaEstadosSolicitudTransferencia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = array(
            "1" => array(
                'estado' => 'Pendiente',
                'activo' => 1,
            ),

            "2" => array(
                'estado' => 'Verificado',
                'activo' => 1,
            ),

            "3" => array(
                'estado' => 'Transfiriendo',
                'activo' => 1,
            ),

            "4" => array(
                'estado' => 'Finalizado',
                'activo' => 1,
            ),

            "5" => array(
                'estado' => 'Anulado',
                'activo' => 1,
            ),

            "6" => array(
                'estado' => 'Pausado',
                'activo' => 0,
            ),
        );

        foreach ($estados as $key => $estado) {
            DB::table('EstadosSolicitudTransferencia')->insert([
             'Estado' => $estado['estado'],
             'Activo' => $estado['activo'],
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'upldated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
