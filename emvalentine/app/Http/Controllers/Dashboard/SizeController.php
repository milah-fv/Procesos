<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Size;
use App\Http\Requests\SizeRequest;
Use Alert;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view ('admin.size.index',[
            'sizes' => $sizes,
        ]);
    }

    public function store(SizeRequest $request)
    {
       /*$size = Size::create([
        'name' => $request->name,
      ]);
      return response()->json($size); */

      $size = new Size;

        $size->name = $request->name;
        $size->enable = $request->actived == 'on' ? '1':'0';
        $size->save();

        if($request->ajax())
        {
            return response()->json($size);
        }
        Alert::success('Talla creada correctamente');
        return redirect('/admin/size');
    }

    public function create()
    {
        return view('admin.size.create');
    }
    
    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin.size.edit',['size' =>$size]);
    }

    public function update(SizeRequest $request, $id)
    {
        $size = Size::findOrFail($id);
        $size->name = $request->name;
        $size->enable = $request->actived == 'on' ? '1':'0';
        $size->save();
        Alert::success('Talla actualizada correctamente');
        return redirect('/admin/size');
    }

  
    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
        Alert::info('Talla eliminada correctamente');
        return response()->json($size);
    }

}
