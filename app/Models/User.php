<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $rols_fk
 *
 * @property Rol $rol
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
  use Notifiable;
    
  static $rules = [
  'name' => 'required',
  'email' => 'required',
  'rols_fk' => 'required',
  'password' => 'required'
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name','email','rols_fk','password'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];
  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function rol()
  {
      return $this->hasOne('App\Models\Rol', 'id', 'rols_fk','nombreRol');
  }
    

}
