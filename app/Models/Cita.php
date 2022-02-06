<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cita
 *
 * @property $id
 * @property $fecha
 * @property $hora
 * @property $paciente_id
 * @property $persona_id
 * @property $estadoCita_id
 * @property $created_at
 * @property $updated_at
 *
 * @property EstadoCita $estadoCita
 * @property Paciente $paciente
 * @property Persona $persona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cita extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'hora' => 'required',
		'paciente_id' => 'required|integer|exists:pacientes,id',
		'persona_id' => 'required|integer|exists:personas,id',
		'estadoCita_id' => 'required|integer|exists:estado_citas,id',
    'paciente_id_hid' => 'required|string'
    ];

    static $rulesWithoutPersona = [
		'fecha' => 'required',
		'hora' => 'required',
		'paciente_id' => 'required|integer|exists:pacientes,id',
		'estadoCita_id' => 'required|integer|exists:estado_citas,id',
    'paciente_id_hid' => 'required|string'
    ];


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','hora','paciente_id','persona_id','estadoCita_id','paciente_id_hid'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoCita()
    {
        return $this->hasOne('App\Models\EstadoCita', 'id', 'estadoCita_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id', 'paciente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    

}
