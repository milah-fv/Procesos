<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use App\Http\Requests\ColorRequest;
Use Alert;

class ColorController extends Controller
{
	public function index()
    {
        $colors = Color::all();
        return view ('admin.color.index',[
            'colors' => $colors,
        ]);
    }
    
    public function store(Request $request)
    {
        /*$color = Color::create([
          'color' => $request->color,
        ]);

        return response()->json($color);*/
        $color = new Color;

        $color->color = $request->color;
        $color->save();

        if($request->ajax())
        {
            return response()->json($color);
        }
        Alert::success('Color creado correctamente');
        return redirect('/admin/color');
    }

    public function create()
    {
        return view('admin.color.create');
    }
    
    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.color.edit',['color' =>$color]);
    }

    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);
        $color->color = $request->color;
        $color->save();
        Alert::success('Color actualizado correctamente');
        return redirect('/admin/color');
    }

  
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        Alert::info('Color eliminado correctamente');
        return response()->json($color);
    }

}
