<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property $id
 * @property $nombrePersonas
 * @property $apellidoPersonas
 * @property $dui
 * @property $telefono
 * @property $fechaDeNacimiento
 * @property $nitPersona
 * @property $created_at
 * @property $updated_at
 * @property $sexo_id
 * @property $rolpersona_id
 *
 * @property Rolpersona $rolpersona
 * @property Sexo $sexo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Persona extends Model
{
    
    static $rules = [
		'nombrePersonas' => 'required',
		'apellidoPersonas' => 'required',
		'telefono' => 'required',
		'fechaDeNacimiento' => 'required',
		'sexo_id' => 'required',
		'rolpersona_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrePersonas','apellidoPersonas','dui','telefono','fechaDeNacimiento','nitPersona','sexo_id','rolpersona_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rolpersona()
    {
        return $this->belongsTo('App\Models\Rolpersona', 'id', 'rolpersona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sexo()
    {
        return $this->hasOne('App\Models\Sexo', 'id', 'sexo_id');
    }
    

}
