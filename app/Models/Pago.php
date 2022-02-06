<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $descripcion
 * @property $costo
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 * @property $estado_pago_id
 * @property $expediente_doctora_dental_id
 *
 * @property Abono[] $abonos
 * @property EstadoPago $estadoPago
 * @property ExpedienteDoctor $expedienteDoctor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'costo' => 'required|regex:/^\d+(\.\d{1,2})?$/',
		'fecha' => 'required',
		//'estado_pago_id' => 'required|integer|exists:estado_pagos,id',
		'expediente_doctora_dental_id' => 'required|integer|exists:expediente_doctora_dentals,id',
    ];

    static $rulesWithoutExpedienteDoctoraDental = [
		'descripcion' => 'required',
		'costo' => 'required|regex:/^\d+(\.\d{1,2})?$/',
		'fecha' => 'required',
		//'estado_pago_id' => 'required|integer|exists:estado_pagos,id',
		//'expediente_doctora_dental_id' => 'required|integer|exists:expediente_doctora_dentals,id',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','costo','fecha','estado_pago_id','expediente_doctora_dental_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function abonos()
    {
        return $this->hasMany('App\Models\Abono', 'pago_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoPago()
    {
        return $this->hasOne('App\Models\EstadoPago', 'id', 'estado_pago_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function expedienteDoctor()
    {
        return $this->hasOne('App\Models\ExpedienteDoctoraDental', 'id', 'expediente_doctora_dental_id');
    }
    

}
