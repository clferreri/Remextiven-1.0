<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateConfig extends Model
{
    protected $table = 'Tasas';
    protected $primaryKey = 'IdTasa';

    protected $fillable = [
        'USDCOP', 'UYUCOP', 'VESCOP', 'USDVES', 'UYUVES', 'USDUYU', 
        'TasaBanescoUSD','TasaOtroUSD', 'TasaBanescoUYU', 'TasaOtroUYU', 'IdUsuarioCarga', 'Fecha'
    ];
}
