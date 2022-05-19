<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $cantidad
 * @property $fechapedido
 * @property $estado
 * @property $productos_id
 * @property $users_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    static $rules = [
		'cantidad' => 'required',
		'fechapedido' => 'required',
		'estado' => 'required',
		'productos_id' => 'required',
		'users_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad','fechapedido','estado','productos_id','users_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'productos_id');
    }
    

}
