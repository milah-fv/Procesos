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
    protected $primaryKey= 'id';

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
    public void AdicionarProducto($idCategoria, $idColor, $idTalla, $idImagen)
    {
        $AdicionarProducto = DB::table('products')
		AdicionarProducto = products(call AdicionarProducto('+ idCategoria +','idColor' , 'idTalla', 'idImagen'));
		products.AdicionarProducto('SP_A_table_products(?,?,?,?,?,?,?,?,?,?,?,?,?)', [$id, $name, $price, $old_price, $cover_image, $stock, $description, $features, $state, $weight, $enable, $category_id, $color_id] );

    }  

    /*
    * Especificando conexión hacia el procedimiento almacenado Consultar
    */
    public void ConsultarProductos()
    {
 		$ConsultarProductos=DB::table('products')
        ConsultarProductos = products(call ConsultarProductos('nombreProd', + 'precioProd',+ 'precAntiguoProd', + 'imagenProd',+'stockProd', + 'descripcionProd',+ 'característicasProd', +'pesoProd',+ 'habilitarProd',+ 'categoriaProd', + 'colorProd', + 'galeriaProd', + 'tallaProd', +'cantidadTallaProd');
        products.ConsultarProductos('SP_C_table_products');
        
    }

    /*
    * Especificando conexión hacia el procedimiento almacenado Modificar
    */
    public void ModificarProducto($idproducto)
    {
		$ModificarProducto=DB::table('products')
		ModificarProducto = products(call ModificarProducto('nombreProd', + 'precioProd',+ 'precAntiguoProd', + 'imagenProd',+'stockProd', + 'descripcionProd',+ 'característicasProd', +'pesoProd',+ 'habilitarProd',+ 'categoriaProd', + 'colorProd', + 'galeriaProd', + 'tallaProd', +'cantidadTallaProd');
		products.ModificarProducto('SP_M_table_products(?,?,?,?,?,?,?,?,?,?,?,?,?)', [$id, $name, $price, $old_price, $cover_image, $stock, $description, $features, $state, $weight, $enable, $category_id, $color_id] );

    }

    /*
    * Especificando conexión hacia el procedimiento almacenado Eliminar (No utilizar, deshabilitar al modificar producto)
    */
    public void EliminarProducto($idproducto)
    {
		$EliminarProducto=DB::table('products')
		EliminarProducto = products(call EliminarProducto('id');
		products.EliminarProducto('SP_E_table_products(?)');
    }

     
 }   