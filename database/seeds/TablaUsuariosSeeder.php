<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TablaUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = array(
            "1" => array(
                'TipoUsuario' => 3,
                'Email' => 'sistemas@remextiven.com',
                'Password' => Hash::make('$istema$R3mextiv3n2020'),
                'FechaRegistro' => Carbon::now()->format('Y-m-d'),
                'IdRol' => 10,
                'Activo' => 1,
                'Verificado' => 1,
                'TokenActivacion' => '213dXyNOTOKEN123$#23fdSA',
                'NewsLetters' => 0,
                'TokenReferido' => 'sistemasRX',
                'RutaImagen' => 'img/images/av-sistemas2020E.jpg',
                'EsReferido' => 0,
                'RequiereCambioPass' => 0,
            ),
        );

        $datos = array(
            "1" => array(
                'IdUsuario' => 1,
                'PrimerNombre' => 'Sistema',
                'SegundoNombre' => 'Informatico',
                'PrimerApellido' => 'Remextiven',
                'SegundoApellido' => 'Remesas',
                'Documento' => '00000000',
                'TipoDocumento' => 'DNI',
                'FechaNacimiento' => '2020-02-01',
                'Sexo' => 'Otro',
                'IdPaisDocumento' => 1,
                'IdCiudad' => 1,
                'Direccion' => 'El internet',
                'NumeroPuerta' => '0101',
                'Telefono' => '093833306',
                'IdCargo' => 16,
            ),
        );

        foreach ($usuario as $key => $usu) {
            DB::table('UsuariosR')->insert([
             'TipoUsuario' => $usu['TipoUsuario'],
             'Email' => $usu['Email'],
             'Password' => $usu['Password'],
             'FechaRegistro' => $usu['FechaRegistro'],
             'IdRol' => $usu['IdRol'],
             'Activo' => $usu['Activo'],
             'Verificado' => $usu['Verificado'],
             'PinTransaccion' => null,
             'TokenActivacion' => $usu['TokenActivacion'],
             'NewsLetters' => $usu['NewsLetters'],
             'TokenReferido' => $usu['TokenReferido'],
             'RutaImagen' => $usu['RutaImagen'],
             'EsReferido' => $usu['EsReferido'],
             'RequiereCambioPass' => $usu['RequiereCambioPass'],
             'UltimoLogin' => null,
             'remember_token' => null,
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'upldated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

        foreach ($datos as $key => $dato) {
            DB::table('PersonaER')->insert([
             'Tipo' => $tipo['tipo'],
             'Activo' => $tipo['activo'],
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'upldated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
