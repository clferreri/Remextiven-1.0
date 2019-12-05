<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $table = 'Monedas';
    protected $primaryKey = 'IdMoneda';

    protected $fillable = ['Moneda', 'Codigo', 'Activo'];

    
}
