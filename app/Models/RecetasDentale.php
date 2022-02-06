<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RecetasDentale
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $descripcion
 * @property $fecha
 * @property $proximaCita
 * @property $expedienteDental_id
 * @property $estadoReceta_id
 *
 * @property EstadoReceta $estadoReceta
 * @property ExpedienteDoctoraDental $expedienteDoctoraDental
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RecetasDentale extends Model
{
    
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','fecha','proximaCita','expedienteDental_id','estadoReceta_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoReceta()
    {
        return $this->hasOne('App\Models\EstadoReceta', 'id', 'estadoReceta_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function expedienteDoctoraDental()
    {
        return $this->hasOne('App\Models\ExpedienteDoctoraDental', 'id', 'expedienteDental_id');
    }
    

}
