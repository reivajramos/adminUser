<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $name
 * @property $descrip
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    
    static $rules = [
		'name' => 'required',
		'descrip' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','descrip'];



}
