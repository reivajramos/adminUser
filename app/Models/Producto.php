<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $codigo_descripcion
 * @property $descripcion
 * @property $especificacion
 * @property $presentacion
 * @property $precio_1
 * @property $precio_2
 * @property $precio_3
 * @property $proveedores_id
 * @property $categorias_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'codigo_descripcion' => 'required',
		'descripcion' => 'required',
		'especificacion' => 'required',
		'presentacion' => 'required',
		'precio_1' => 'required',
		'precio_2' => 'required',
		'precio_3' => 'required',
		'proveedores_id' => 'required',
		'categorias_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo_descripcion','descripcion','especificacion','presentacion','precio_1','precio_2','precio_3','proveedores_id','categorias_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categorias_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedores_id');
    }
    

}
