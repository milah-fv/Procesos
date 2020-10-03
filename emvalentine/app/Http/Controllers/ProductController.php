<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
Use Alert;

class ProductController extends Controller
{
    /*
    * Función para mostrar los productos registrados
    */
   public function mostrarProductos()
    {
		$objResult=new stdClass();
		$objResult->data=Producto::ConsultarProductos();

        return json_encode($objResult);
        return View('admin.product.index');
    } 

    /*
    * Función para registrar los productos
    */
    public function registrarProductos()
    {
        $producto = new Product::AdicionarProducto();
		{
		   'name' =>$producto->name,
           'old_price' =>$producto->oldprice,
           'price' =>$producto->price,
           'cover_image' => ("img_product/$fileNameCover"),
           'stock' =>$stock,
           'features' =>$producto->features,
           'description' =>$producto->description,
           'state' =>$producto->state,
           'weight' =>$producto->weight,
           'enable' =>$producto->enable,
           'category_id' => $producto->categories,
           'color_id' =>$producto->colors,
           if(Input::hasFile('ruta_imagen')) 
			{
                $foto =Input::file('ruta_imagen');
                $nombre=strtolower('user_image_'.$producto->id.".".$extension);
                $destino='/img_product/';
                $subir=$foto->move(public_path().$destino,$nombre);
                $path_foto=$destino.$nombre;
                $producto->ruta_imagen=$path_foto;
                $producto->save();
			
			}
           
		});
        Alert::success('Producto creado correctamente');
        return View('admin.product.create');
    }


    /*
    * Función para actualizar producto
    */
    public function actualizarProducto(ProductRequest $request, $id)
    {
		$product = Product::ModificarProducto($id);
     	$product->stock = $stock;
		$product->old_price = $request->oldprice;
		$product->price = $request->price;
		$product->weight =$request->weight;
		$product->name =$request->name;
		$product->description = $request->description;
		$product->features = $request->features;
        $product->state = $request->state;
        $product->enable = $request->enable;
		$product->category_id = $request->categories;
        $product->color_id = $request->colors;
        if(Input::hasFile('ruta_imagen')) {
			$Producto =Input::file('ruta_imagen');
			$nombre=strtolower("user_image_".$Producto->id.".".$extension);
			$destino='/img_product/';
			$subir=$foto->move(public_path().$destino,$nombre);
			$path_foto=$destino.$nombre;
			$Producto->ruta_imagen=$path_foto;
			$Producto->save();
			}
        success('Producto actualizado correctamente');
		return View('admin.product.edit');
    }


    /*
    * Función para eliminar producto (no utilizar, solo inhabilitar)
    */
    public function eliminarProducto($id)
    {
		$product = Product::EliminarProducto($id);
        return redirect('admin/product');
    }
    
    
}

