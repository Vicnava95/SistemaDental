<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['fecha','descripcion','diente_id'];
    
    public function diente()
    {
        return $this->hasOne('App\Models\Diente', 'id', 'diente_id');
    }
}
