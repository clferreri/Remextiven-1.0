<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaMargenesDeGananciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $margenes = array(
            "1" => array(
                'textoganancia' => '5%',
                'porcentajeganancia' => 0.05,
                'actual' => 0,
                'activo' => 1,
            ),

            "2" => array(
                'textoganancia' => '6%',
                'porcentajeganancia' => 0.06,
                'actual' => 0,
                'activo' => 1,
            ),

            "3" => array(
                'textoganancia' => '7%',
                'porcentajeganancia' => 0.07,
                'actual' => 0,
                'activo' => 1,
            ),

            "4" => array(
                'textoganancia' => '8%',
                'porcentajeganancia' => 0.08,
                'actual' => 0,
                'activo' => 1,
            ),

            "5" => array(
                'textoganancia' => '9%',
                'porcentajeganancia' => 0.09,
                'actual' => 0,
                'activo' => 1,
            ),

            "6" => array(
                'textoganancia' => '10%',
                'porcentajeganancia' => 0.10,
                'actual' => 1,
                'activo' => 1,
            ),

            "7" => array(
                'textoganancia' => '11%',
                'porcentajeganancia' => 0.11,
                'actual' => 0,
                'activo' => 1,
            ),

            "8" => array(
                'textoganancia' => '12%',
                'porcentajeganancia' => 0.12,
                'actual' => 0,
                'activo' => 1,
            ),

            "9" => array(
                'textoganancia' => '13%',
                'porcentajeganancia' => 0.13,
                'actual' => 0,
                'activo' => 1,
            ),

            "10" => array(
                'textoganancia' => '14%',
                'porcentajeganancia' => 0.14,
                'actual' => 0,
                'activo' => 1,
            ),

            "11" => array(
                'textoganancia' => '15%',
                'porcentajeganancia' => 0.15,
                'actual' => 0,
                'activo' => 1,
            ),

            "12" => array(
                'textoganancia' => '16%',
                'porcentajeganancia' => 0.16,
                'actual' => 0,
                'activo' => 1,
            ),

            "13" => array(
                'textoganancia' => '17%',
                'porcentajeganancia' => 0.17,
                'actual' => 0,
                'activo' => 1,
            ),

            "14" => array(
                'textoganancia' => '18%',
                'porcentajeganancia' => 0.18,
                'actual' => 0,
                'activo' => 1,
            ),

            "15" => array(
                'textoganancia' => '19%',
                'porcentajeganancia' => 0.19,
                'actual' => 0,
                'activo' => 1,
            ),

            "16" => array(
                'textoganancia' => '20%',
                'porcentajeganancia' => 0.20,
                'actual' => 0,
                'activo' => 1,
            ),

        );

        foreach ($margenes as $key => $margen) {
            DB::table('MargenesDeGanancia')->insert([
             'TextoGanancia' => $margen['textoganancia'],
             'PorcentajeGanancia' => $margen['porcentajeganancia'],
             'Actual' => $margen['actual'],
             'Activo' => $margen['activo'],
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'upldated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
