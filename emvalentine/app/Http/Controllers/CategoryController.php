<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
Use Alert;

class CategoryController extends Controller
{
    /*
    * Función para mostrar las categorías registrados
    */
   public function mostrarCategorias()
    {
		$objResult=new stdClass();
		$objResult->data=Category::ConsultarCategoria();

        return json_encode($objResult);
        return View('admin.category.index');
    } 

    /*
    * Función para registrar las categorías
    */
    public function registrarCategorias()
    {
        $categoria = new Category::AdicionarCategoria();
		{
		   'name' =>$categoria->name,
           'slug' =>$categoria->slug

		});
        Alert::success('Categoría creada correctamente');
        return View('admin.category.create');
    }


    /*
    * Función para actualizar categoría
    */
    public function actualizarCategoría(CategoryRequest $request, $id)
    {
        $categoria = new Category::ModificarCategoria();
     	$categoria->name = $request->name;
		$categoria->slug = $request->slug;
		
        success('Categoría actualizada correctamente');
		return View('admin.category.edit');
    }


    /*
    * Función para eliminar categoría
    */
    public function eliminarCategoría($id)
    {
		$categoria = Category::EliminarCategoria($id);
        return redirect('admin/product');
    }
    
    
}

