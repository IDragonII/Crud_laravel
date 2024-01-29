<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacen
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $tipo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Almacen extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'tipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','tipo'];



}
