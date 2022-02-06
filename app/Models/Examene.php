<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Examene
 *
 * @property $id
 * @property $imagen
 * @property $fecha
 * @property $descripcion
 * @property $consulta_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Consulta $consulta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Examene extends Model
{
    
    static $rules = [
		'imagen' => 'nullable|image|mimes:jpeg,png,jpg',//'required',
		'fecha' => 'required',
		'descripcion' => 'required',
		'consulta_id' => 'required|integer|exists:consultas,id',
    ];

    static $rulesWithoutConsulta = [
      'imagen' => 'nullable|image|mimes:jpeg,png,jpg',//'required',
      'fecha' => 'required',
      'descripcion' => 'required'
      ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['imagen','fecha','descripcion','consulta_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consulta()
    {
        return $this->hasOne('App\Models\Consulta', 'id', 'consulta_id');
    }
    

}
