<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalPerson extends Model
{
    protected $table = 'PersonasFR';
    protected $primaryKey = 'IdPersonaF';

    // private $Id;
    // private $IdUsuario;
    // private $Nombre;
    // private $PrimerApellido;
    // private $SegundoApellido;
    // private $Documento;
    // private $TipoDocumento;
    // private $FechaNacimiento;
    // private $Sexo;
    // private $Pais;
    // private $Ciudad;
    // private $Direccion;
    // private $NumeroPuerta;
    // private $CodigoPostal;
    // private $Telefono;
    // private $Telefono2;




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IdUsuario', 'PrimerNombre', 'PrimerApellido', 'SegundoApellido','Documento', 'TipoDocumento', 'FechaNacimiento','Sexo', 'IdPaisDocumento', 'IdPais', 'IdCiudad', 'Direccion', 'NumeroPuerta', 'Telefono'
    ];



    public function Usuario(){
        return $this->hasOne('App\User', 'IdUsuarioR', 'IdUsuario');
    }

    public function Pais(){
        return $this->hasOne('App\Models\Pais', 'IdPais', 'IdPais');
    }

    public function Ciudad(){
        return $this->hasOne('App\Models\Ciudad', 'IdCiudad', 'IdCiudad');
    }

    public function Celular(){
        if(substr($this->Telefono, 0,2) == '09'){
            return $this->Telefono;
        }
        else{
            if(substr($this->Telefono2, 0, 2) == '09'){
                return $this->Telefono2;
            }

            else{
                return "";
            }
        }
    }
}



