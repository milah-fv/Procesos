<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use  Illuminate\Support\Collection as Collection;

class Product extends Model
{
    /* 
    * Modelo Product:
    * Creando conexion hacia la tabla producto
    */
    protected $table = 'products';

    protected $fillable = [
        'id','name', 'price', 'old_price', 'cover_image', 'stock', 'description', 'features', 'state', 'weight', 'enable', 'category_id', 'color_id'
    ];
 
    /*
    * Especificando la Relacion uno a muchos entre las tablas Images y products
    */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /*
    * Especificando la Relacion uno a muchos entre las tablas Color y products
    */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
 
    /*
    * Especificando la Relacion uno a muchos entre las tablas Category y products
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    * Especificando la Relacion uno a muchos entre las tablas Sizes y products
    */
    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withTimestamps()->withPivot('quantity');
    }

    /*
    * Especificando conexión hacia el procedimiento almacenado Adicionar
    */
    public function spProductA()
    {
        DB::select('SP_A_table_products(?,?,?,?,?,?,?,?,?,?,?,?,?)', [$id, $name, $price, $old_price, $cover_image, $stock, $description, $features, $state, $weight, $enable, $category_id, $color_id] );
    }  

    /*
    * Especificando conexión hacia el procedimiento almacenados Consultar
    */
    public function spProductC()
    {
        $consultProducts = DB::select('SP_C_table_products');
        return $consultProducts;
    }

    /*
    * Especificando conexión hacia el procedimiento almacenados Modificar
    */
    public function spProductM()
    {
        DB::select('SP_M_table_products(?)', [$id] );
    }

    /*
    * Especificando conexión hacia el procedimiento almacenados Eliminar
    */
    public function spProductE()
    {
        DB::select('SP_E_table_products(?)', [$id]
    }

     
 }   