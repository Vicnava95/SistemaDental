<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diente extends Model
{
    protected $fillable = ['numeroDiente','nombreDiente','expedienteDental_id'];

    public function expediente()
    {
        return $this->hasOne('App\Models\ExpedienteDoctoraDental', 'id', 'expedienteDental_id');
    }

    public function tratamientos()
    {
        return $this->hasMany('App\Models\Tratamiento', 'diente_id', 'id');
    }
}
