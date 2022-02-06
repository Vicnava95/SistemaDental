<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExamenesDoctoraDental
 *
 * @property $id
 * @property $imagen
 * @property $fecha
 * @property $descripcion
 * @property $expediente_doctora_dental_id
 * @property $created_at
 * @property $updated_at
 *
 * @property ExpedienteDoctoraDental $expedienteDoctoraDental
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ExamenesDoctoraDental extends Model
{
    
    static $rules = [
      'imagen' => 'nullable|image|mimes:jpeg,png,jpg',//'required',
      'fecha' => 'required',
      'descripcion' => 'required',
      'expediente_doctora_dental_id' => 'required|integer|exists:expediente_doctora_dentals,id',
    ];

    static $rulesWithoutExpediente = [
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
    protected $fillable = ['imagen','fecha','descripcion','expediente_doctora_dental_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function expedienteDoctoraDental()
    {
        return $this->hasOne('App\Models\ExpedienteDoctoraDental', 'id', 'expediente_doctora_dental_id');
    }
    

}
