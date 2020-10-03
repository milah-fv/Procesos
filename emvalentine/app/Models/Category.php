<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use  Illuminate\Support\Collection as Collection;

class Category extends Model
{
    /* 
    * Modelo Category:
    * Creando conexion hacia la tabla producto
    */
    protected $table = 'categories';
    protected $primaryKey= 'id';

    protected $fillable = [
        'id','name', 'slug'
    ];
 
    
    /*
    * Especificando conexión hacia el procedimiento almacenado Adicionar
    */
    public void AdicionarCategoria($idCategoria, $idColor, $idTalla, $idImagen)
    {
        $AdicionarCategoria = DB::table('categories')
		categories.AdicionarCategoria('SP_A_table_categories(?,?,?)', [$id, $name, $slug]);

    }  

    /*
    * Especificando conexión hacia el procedimiento almacenado Consultar
    */
    public void ConsultarCategoria()
    {
 		$ConsultarCategoria=DB::table('categories')
         ConsultarCategoria = categories(call ConsultarCategoria('idCat,', + 'nombreCat,',+ 'slugCat');
         categories.ConsultarCategoria('SP_C_table_categories');
        
    }

    /*
    * Especificando conexión hacia el procedimiento almacenado Modificar
    */
    public void ModificarCategoria($idcategoria)
    {
		$ModificarCategoria=DB::table('categories')
		ModificarCategoria = categories(call ConsultarCategoria('idCat,', + 'nombreCat,',+ 'slugCat');
		categories.ModificarCategoria('SP_M_table_categories(?,?,?)', [$id, $name, $slug]);

    }

    /*
    * Especificando conexión hacia el procedimiento almacenado Eliminar (No utilizar, deshabilitar al modificar producto)
    */
    public void EliminarCategoria($idcategoria)
    {
		$EliminarCategoria=DB::table('categories')
		EliminarCategoria = categories(call EliminarCategoria('id');
		categories.EliminarCategoria('SP_E_table_categories(?)') ;
    }

     
 }   