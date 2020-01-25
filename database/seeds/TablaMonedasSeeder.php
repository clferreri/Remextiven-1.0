<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaMonedasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas = array(
            "1" => array(
                'moneda' => 'Pesos',
                'codigovalor' => '$',
                'codigotexto' => 'UYU',
                'activo' => 1,
            ),

            "2" => array(
                'moneda' => 'Dolar',
                'codigovalor' => 'U$S',
                'codigotexto' => 'USD',
                'activo' => 1,
            ),

            "3" => array(
                'moneda' => 'Bolívar',
                'codigovalor' => 'Bs',
                'codigotexto' => 'VES',
                'activo' => 1,
            ),
        );

        foreach ($monedas as $key => $moneda) {
            DB::table('Monedas')->insert([
             'Moneda' => $moneda['moneda'],
             'CodigoValor' => $moneda['codigovalor'],
             'CodigoTexto' => $moneda['codigotexto'],
             'Activo' => $moneda['activo'],
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'upldated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
