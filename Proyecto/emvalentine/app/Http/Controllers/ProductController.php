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
   public function index()
    {
        $model = Product::spProductC();
		
		$model->each(function($consultProducts)
		{
			$product->cover_image = url($product->cover_image);
			$product->price = "S/.$product->price";
			$product->weight = "$product->weight grm";
			$product->category;
			$product->color;
			$product->sizes;
		});
		
		$data = datatables()->of($model)
		->addColumn('btn', 'admin.product.actions')
		->rawColumns(['btn','description'])
		->toJson();
		return $data;
    } 

    /*
    * Función para registrar los productos
    */
    public function store(ProductRequest $request)
    {
        $model = Product::spProductA();
        $model->each(function($addProducts)
		{
		    'name' =>$request->name,
           'old_price' =>$request->oldprice,
           'price' =>$request->price,
           'cover_image' => ("img_product/$fileNameCover"),
           'stock' =>$stock,
           'features' =>$request->features,
           'description' =>$request->description,
           'state' =>$request->state,
           'weight' =>$request->weight,
           'enable' =>$request->enable,
           'category_id' => $request->categories,
           'color_id' =>$request->colors,
		});

        Alert::success('Producto creado correctamente');
        return redirect('admin/product');
    }

    /*
    * Función para eliminar producto (no utilizar, solo inhabilitar)
    */
    public function destroy($id)
    {
		$product = Product::spProductE($id);
        return redirect('admin/product');
    }

    /*
    * Función para actualizar producto
    */
    public function update(ProductRequest $request, $id)
    {
		$product = Product::spProductM($id);
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
        
		Alert::success('Producto actualizado correctamente');
		return redirect('admin/product');
    }


    
    
}

