<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Receta
 *
 * @property $id
 * @property $descripcion
 * @property $fecha
 * @property $proximaCita
 * @property $consulta_id
 * @property $paciente_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Consulta $consulta
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Receta extends Model
{

    static $rules = [
		'descripcion' => 'required|max:255|string',
		'fecha' => 'required|date',
        'proximaCita'=> 'nullable|date|after_or_equal:fecha',
		'consulta_id' => 'required|integer|exists:consultas,id',
        'estadoReceta_id' => 'required|integer|exists:estado_recetas,id',
    ];

    static $rulesWithoutEstadoReceta = [
		'descripcion' => 'required|max:255|string',
		'fecha' => 'required|date',
        'proximaCita'=> 'nullable|date|after_or_equal:fecha',
		'consulta_id' => 'required|integer|exists:consultas,id'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
protected $fillable = ['descripcion','fecha','proximaCita','consulta_id', 'estadoReceta_id'/*,'paciente_id'*/];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consulta()
    {
        return $this->hasOne('App\Models\Consulta', 'id', 'consulta_id');
    }

    public function estadoReceta()
    {
        return $this->hasOne('App\Models\EstadoReceta', 'id', 'estadoReceta_id');
    }




}
