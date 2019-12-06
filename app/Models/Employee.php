<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'PersonaER';
    protected $primaryKey = 'IdPersonaE';


    
    // RELACION (1 a 1) (Empleado - Cargo)
    public function Cargo(){
        return $this->hasOne('App\Models\EmployeePosition', 'IdCargo', 'IdCargo');
    }
}
