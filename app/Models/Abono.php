<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Abono
 *
 * @property $id
 * @property $monto
 * @property $pago_id
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Pago $pago
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Abono extends Model
{
    
    static $rules = [
		'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
		'pago_id' => 'required|integer|exists:pagos,id'
    ];

    static $rulesWithoutPago = [
      'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/'
    ];
  

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['monto','pago_id','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pago()
    {
        return $this->hasOne('App\Models\Pago', 'id', 'pago_id');
    }
    

}
