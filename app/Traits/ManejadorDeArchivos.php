<?php

namespace App\Traits;

use App\Mail\ConfirmacionTransferencia as MailConfirmacionTransferencia;
use App\Mail\Mail\ConfirmacionTransferencia;
use App\Models\Bank;
use App\Models\BeneficiaryAccount;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Storage;

//TRAIT GENERICO PARA USAR CON LOS PDF DE Transferencias
trait ManejadorDeArchivos
{
    public static function RutaCarpetaUsuario($usuario, $subCarpeta = null){
        if ($subCarpeta == null){
            return storage_path('app/public/Usuarios/') . $usuario . '/';
        }
        else{
            return storage_path('app/public/Usuarios/') . $usuario . '/' . $subCarpeta .'/';
        }
    }

    public static function CrearCarpetaVerificacion($idUsuario){
        Storage::disk('public')->makeDirectory('/Usuarios/' . $idUsuario . '/Verificacion');
    }
    
    //GUARDAMOS ARCHIVOS DE VERIFICACION DE USUARIO
    public static function AlmacenarArchivosVerificacion($idUsuario, $archivos){
        $archivos;
        foreach ($archivos as $archivo) {
            $nombre = $archivo->getClientOriginalName();
            Storage::disk('public')->putFileAs('/Usuarios/' . $idUsuario . '/Verificacion/', $archivo, $nombre);
        }

        return true;
    }
   
}