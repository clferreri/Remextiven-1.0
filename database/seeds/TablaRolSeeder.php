<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = array(
            "1" => array(
                'rol' => 'Usuario',
                'activo' => 1,
                'soloempleado' => 0
            ),

            "2" => array(
                'rol' => 'Cajero',
                'activo' => 1,
                'soloempleado' => 0
            ),

            "3" => array(
                'rol' => 'Remexero',
                'activo' => 1,
                'soloempleado' => 1
            ),

            "4" => array(
                'rol' => 'Banco de Bolivares',
                'activo' => 1,
                'soloempleado' => 1
            ),

            "5" => array(
                'rol' => 'Digitador',
                'activo' => 1,
                'soloempleado' => 1
            ),

            "6" => array(
                'rol' => 'Lider',
                'activo' => 1,
                'soloempleado' => 1
            ),

            "7" => array(
                'rol' => 'Soporte',
                'activo' => 1,
                'soloempleado' => 1
            ),

            "8" => array(
                'rol' => 'Editor',
                'activo' => 1,
                'soloempleado' => 1
            ),

            "9" => array(
                'rol' => 'Moderador',
                'activo' => 1,
                'soloempleado' => 1
            ),

            "10" => array(
                'rol' => 'Administrador',
                'activo' => 1,
                'soloempleado' => 1
            ),
        );

        foreach ($roles as $key => $rol) {
            DB::table('RolesUsuariosR')->insert([
             'Rol' => $rol['rol'],
             'Activo' => $rol['activo'],
             'SoloEmpleado' => $rol['soloempleado'],
            ]);
        }
    }
}
