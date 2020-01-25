<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaCargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = array(
            "1" => array(
                'sigla' => 'CEO',
                'nombrecargo' => 'Director Ejecutivo',
                'activo' => 0,
                'soloadmin' => 1,
            ),

            "2" => array(
                'sigla' => 'CFO',
                'nombrecargo' => 'Director de Finanzas',
                'activo' => 0,
                'soloadmin' => 1,
            ),

            "3" => array(
                'sigla' => 'CTO',
                'nombrecargo' => 'Director de Tecnología',
                'activo' => 0,
                'soloadmin' => 1,
            ),

            "4" => array(
                'sigla' => 'CMO',
                'nombrecargo' => 'Director de Marketing',
                'activo' => 0,
                'soloadmin' => 1,
            ),

            "5" => array(
                'sigla' => 'CDO',
                'nombrecargo' => 'Jefe de Diseño',
                'activo' => 0,
                'soloadmin' => 1,
            ),

            "6" => array(
                'sigla' => 'DIG',
                'nombrecargo' => 'Digitador',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "7" => array(
                'sigla' => 'OPE',
                'nombrecargo' => 'Operador',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "8" => array(
                'sigla' => 'RSC',
                'nombrecargo' => 'Representante de Servicio al Cliente',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "9" => array(
                'sigla' => 'CAD',
                'nombrecargo' => 'Cadete Remextiven',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "10" => array(
                'sigla' => 'STI',
                'nombrecargo' => 'Soporte Técnico Informatico',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "11" => array(
                'sigla' => 'DGR',
                'nombrecargo' => 'Diseñador Grafico',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "12" => array(
                'sigla' => 'LOP',
                'nombrecargo' => 'Lider de Operaciones',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "13" => array(
                'sigla' => 'CMM',
                'nombrecargo' => 'Community Manager',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "14" => array(
                'sigla' => 'ERC',
                'nombrecargo' => 'Encargado de Relaciones Comerciales',
                'activo' => 1,
                'soloadmin' => 0,
            ),

            "15" => array(
                'sigla' => 'TSO',
                'nombrecargo' => 'Tesorero',
                'activo' => 1,
                'soloadmin' => 1,
            ),

            "16" => array(
                'sigla' => 'SIS',
                'nombrecargo' => 'Sistema Remextiven',
                'activo' => 0,
                'soloadmin' => 1,
            ),
    

        );

        foreach ($cargos as $key => $cargo) {
            DB::table('Cargos')->insert([
             'Sigla' => $cargo['sigla'],
             'NombreCargo' => $cargo['nombrecargo'],
             'Activo' => $cargo['activo'],
             'SoloAdmin' => $cargo['soloadmin'],
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'upldated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
