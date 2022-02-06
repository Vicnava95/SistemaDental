<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rolpersona
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $nombreRolPersona
 *
 * @property Persona[] $personas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rolpersona extends Model
{
    
    static $rules = [
		'nombreRolPersona' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreRolPersona'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'rolpersona_id', 'id');
    }
    

}
