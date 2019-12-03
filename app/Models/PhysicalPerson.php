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
        'IdUsuario', 'Nombre', 'PrimerApellido', 'SegundoApellido','Documento', 'TipoDocumento', 'FechaNacimiento','Sexo', 'IdPaisDocumento', 'IdPais', 'IdCiudad', 'Direccion', 'NumeroPuerta', 'Telefono'
    ];

}



