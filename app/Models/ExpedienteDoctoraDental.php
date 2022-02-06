<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ExpedienteDoctoraDental extends Model
{
    protected $fillable = ['paciente_id']; 

    public function paciente(){
        return $this->hasOne(Paciente::class);
    }

    public function consultas(){
        return $this->belongsToMany(Consulta::class, ['consulta_expedienteDoctora']);
    }
    
    public function recetasDentales()
    {
        return $this->hasMany('App\Models\RecetasDentales', 'estadoReceta_id', 'id');
    }

    public function dientes()
    {
        return $this->hasMany('App\Models\Diente', 'expedienteDental_id', 'id');
    }
}
