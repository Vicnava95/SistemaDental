<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $dui
 * @property $telefonoCasa
 * @property $telefonoCelular
 * @property $fechaDeNacimiento
 * @property $direccion
 * @property $referenciaPersonal
 * @property $telReferenciaPersonal
 * @property $ocupacion
 * @property $correoElectronico
 * @property $created_at
 * @property $updated_at
 * @property $sexo_id
 *
 * @property Sexo $sexo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{

    static $rules = [
        'nombres'=>'required|max:255|string',
        'apellidos'=>'required|max:255|string',
        'dui'=>'nullable|size:10|string',
        'telefonoCasa'=>'nullable|size:9|string',
        'telefonoCelular'=>'required|size:9|string',
        'fechaDeNacimiento'=>'required|date|before_or_equal:today',
        'direccion'=>'required|string',
        'referenciaPersonal'=>'nullable|max:255|string',
        'telReferenciaPersonal'=>'nullable|size:9|string',
        'ocupacion'=>'nullable|max:255|string',
        'correoElectronico'=>'nullable|max:255|email|regex:/^([a-zA-Z0-9]+(?:[.-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:[.-]?[a-zA-Z0-9]+)*\.[a-zA-Z]{2,7})$/',
        'sexo_id'=>'required|integer'
        /*'nombres' => 'required',
		'apellidos' => 'required',
		'telefonoCelular' => 'required',
		'fechaDeNacimiento' => 'required',
		'direccion' => 'required',
		'sexo_id' => 'required',*/
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','dui','telefonoCasa','telefonoCelular','fechaDeNacimiento','direccion','referenciaPersonal','telReferenciaPersonal','ocupacion','correoElectronico','sexo_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sexo()
    {
        return $this->hasOne('App\Models\Sexo', 'id', 'sexo_id');
    }


}
