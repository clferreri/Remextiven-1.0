<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaPaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = array(
            "1" => array(
                'Pais' => 'Sistema',
                'Codigo' => 'SIS',
                'Prefijo' => '+000',
                'Activo' => 0,
                'ImagenBandera' => ''
            ),

            "2" => array(
                'Pais' => 'Alemania',
                'Codigo' => 'DE',
                'Prefijo' => '+49',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Alemania.png'
            ),

            "3" => array(
                'Pais' => 'Argentina',
                'Codigo' => 'AR',
                'Prefijo' => '+54',
                'Activo' => 1,
                'ImagenBandera' => 'img/images/banderas/Argentina.png'
            ),

            "4" => array(
                'Pais' => 'Australia',
                'Codigo' => 'AU',
                'Prefijo' => '+61',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Australia.png'
            ),

            "5" => array(
                'Pais' => 'Bélgica',
                'Codigo' => 'BE',
                'Prefijo' => '+32',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Bélgica.png'
            ),

            "6" => array(
                'Pais' => 'Bolivia',
                'Codigo' => 'BO',
                'Prefijo' => '+591',
                'Activo' => 1,
                'ImagenBandera' => 'img/images/banderas/Bolivia.png'
            ),

            "7" => array(
                'Pais' => 'Brasil',
                'Codigo' => 'BR',
                'Prefijo' => '+55',
                'Activo' => 1,
                'ImagenBandera' => 'img/images/banderas/Brasil.png'
            ),

            "8" => array(
                'Pais' => 'Canadá',
                'Codigo' => 'CA',
                'Prefijo' => '+1',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Canadá.png'
            ),

            "9" => array(
                'Pais' => 'Chile',
                'Codigo' => 'CL',
                'Prefijo' => '+56',
                'Activo' => 1,
                'ImagenBandera' => 'img/images/banderas/Chile.png'
            ),

            "10" => array(
                'Pais' => 'China',
                'Codigo' => 'CN',
                'Prefijo' => '+86',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/China.png'
            ),

            "11" => array(
                'Pais' => 'Colombia',
                'Codigo' => 'CO',
                'Prefijo' => '+57',
                'Activo' => 1,
                'ImagenBandera' => 'img/images/banderas/Colombia.png'
            ),

            "12" => array(
                'Pais' => 'Costa Rica',
                'Codigo' => 'CR',
                'Prefijo' => '+506',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/CostaRica.png'
            ),

            "13" => array(
                'Pais' => 'Croacia',
                'Codigo' => 'HR',
                'Prefijo' => '+385',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Croacia.png'
            ),

            "14" => array(
                'Pais' => 'Cuba',
                'Codigo' => 'CU',
                'Prefijo' => '+53',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Cuba.png'
            ),

            "15" => array(
                'Pais' => 'Dominica',
                'Codigo' => 'DM',
                'Prefijo' => '+1',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Dominica.png'
            ),
            
            "16" => array(
                'Pais' => 'Republica Dominicana',
                'Codigo' => 'DO',
                'Prefijo' => '+1809',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/RepublicaDominicana.png'
            ),

            "17" => array(
                'Pais' => 'Ecuador',
                'Codigo' => 'EC',
                'Prefijo' => '+593',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Ecuador.png'
            ),

            "18" => array(
                'Pais' => 'El Salvador',
                'Codigo' => 'SV',
                'Prefijo' => '+503',
                'Activo' => 1,
                'ImagenBandera' => 'img/images/banderas/ElSalvador.png'
            ),

            "19" => array(
                'Pais' => 'España',
                'Codigo' => 'ES',
                'Prefijo' => '+34',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/España.png'
            ),

            "20" => array(
                'Pais' => 'Estados Unidos',
                'Codigo' => 'US',
                'Prefijo' => '+1',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/EstadosUnidos.png'
            ),

            "21" => array(
                'Pais' => 'Finlandia',
                'Codigo' => 'FI',
                'Prefijo' => '+358',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Finlandia.png'
            ),
            "22" => array(
                'Pais' => 'Francia',
                'Codigo' => 'FR',
                'Prefijo' => '+33',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Francia.png'
            ),

            "23" => array(
                'Pais' => 'Guatemala',
                'Codigo' => 'GT',
                'Prefijo' => '+502',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Guatemala.png'
            ),

            "24" => array(
                'Pais' => 'Honduras',
                'Codigo' => 'HN',
                'Prefijo' => '+504',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Honduras.png'
            ),

            "25" => array(
                'Pais' => 'Irlanda',
                'Codigo' => 'IE',
                'Prefijo' => '+353',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Irlanda.png'
            ),

            "26" => array(
                'Pais' => 'Italia',
                'Codigo' => 'IT',
                'Prefijo' => '+39',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Italia.png'
            ),

            "27" => array(
                'Pais' => 'Japon',
                'Codigo' => 'JP',
                'Prefijo' => '+81',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Japon.png'
            ),

            "28" => array(
                'Pais' => 'Mexico',
                'Codigo' => 'MX',
                'Prefijo' => '+52',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Honduras.png'
            ),

            "29" => array(
                'Pais' => 'Nicaragua',
                'Codigo' => 'NI',
                'Prefijo' => '+505',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Nicaragua.png'
            ),

            "30" => array(
                'Pais' => 'Nueva Zelanda',
                'Codigo' => 'NZ',
                'Prefijo' => '+64',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/NuevaZelanda.png'
            ),

            "31" => array(
                'Pais' => 'Panamá',
                'Codigo' => 'PA',
                'Prefijo' => '+507',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Panamá.png'
            ),

            "32" => array(
                'Pais' => 'Paraguay',
                'Codigo' => 'PY',
                'Prefijo' => '+595',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Paraguay.png'
            ),

            "33" => array(
                'Pais' => 'Perú',
                'Codigo' => 'PE',
                'Prefijo' => '+51',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Perú.png'
            ),

            "34" => array(
                'Pais' => 'Puerto Rico',
                'Codigo' => 'PR',
                'Prefijo' => '+1787',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/PuertoRico.png'
            ),

            "35" => array(
                'Pais' => 'Reino Unido',
                'Codigo' => 'GB',
                'Prefijo' => '+44',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/ReinoUnido.png'
            ),

            "36" => array(
                'Pais' => 'Rusia',
                'Codigo' => 'RU',
                'Prefijo' => '+7',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Rusia.png'
            ),

            "37" => array(
                'Pais' => 'Suiza',
                'Codigo' => 'CH',
                'Prefijo' => '+41',
                'Activo' => 0,
                'ImagenBandera' => 'img/images/banderas/Suiza.png'
            ),

            "38" => array(
                'Pais' => 'Uruguay',
                'Codigo' => 'UY',
                'Prefijo' => '+598',
                'Activo' => 1,
                'ImagenBandera' => 'img/images/banderas/Uruguay.png'
            ),

            "39" => array(
                'Pais' => 'Venezuela',
                'Codigo' => 'VE',
                'Prefijo' => '+58',
                'Activo' => 1,
                'ImagenBandera' => 'img/images/banderas/Venezuela.png'
            ),
        );

        foreach ($paises as $key => $pais) {
            DB::table('Paises')->insert([
             'Pais' => $pais['Pais'],
             'Codigo' => $pais['Codigo'],
             'Prefijo' => $pais['Prefijo'],
             'Activo' => $pais['Activo'],
             'ImagenBandera' =>  $pais['ImagenBandera'],
            ]);
        }
    }
}
