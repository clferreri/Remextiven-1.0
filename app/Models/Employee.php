<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'PersonaER';
    protected $primaryKey = 'IdPersonaE';

    protected $fillable = ['IdUsuario', 'PrimerNombre', 'SegundoNombre', 'PrimerApellido', 'SegundoApellido', 'Documento', 
                            'TipoDocumento', 'FechaNacimiento', 'Sexo', 'IdPaisDocumento', 'IdPais', 'IdCiudad', 'Direccion', 'NumeroPuerta', 'Telefono', 'Telefono2', 'IdCargo', 'CorreoPersonal' ];
    
    // RELACION (1 a 1) (Empleado - Cargo)
    public function Cargo(){
        return $this->hasOne('App\Models\EmployeePosition', 'IdCargo', 'IdCargo');
    }
}
