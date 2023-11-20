<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome($section){
        $cats = Category::where('section', $section)->Orderby('name','Asc')->get();
        $data = ['cats'=>$cats];
        return view ('admin.categories.home', $data);
    }

    public function postCategoryAdd(Request $request){
        $rules = [
            'name'=>'required',
            'icon'=>'required'
        ];

        $massages =[
            'name.required' => 'Ingrese un nombre para la categoria',
            'icon.required' => 'Ingrese un icono para la categoria'

        ];

        $validator = Validator::make($request->all(), $rules, $massages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error') ->with( 'typealert', 'danger');
        else:
            $c = new Category;
            $c->section = $request->input('section');
            $c->name = $request->input('name');
            $c->slug = Str::slug($request->input('name'));
            $c->icono = $request->input('icon');
            if($c->save()):
                return back()->with('message', 'Se ha guardo exitosamente')->with('typealert', 'success');
            endif;

        endif;
    }

    public function getCategoryEdit($id){
        $cat = Category::find($id);
        $data = ['cat' => $cat];
        return view('admin.categories.edit', $data);
    }

    public function postCategoryEdit(Request $request, $id){
        $rules = [
            'name'=>'required',
            'icon'=>'required'
        ];

        $massages =[
            'name.required' => 'Ingrese un nombre para la categoria',
            'icon.required' => 'Ingrese un icono para la categoria'

        ];

        $validator = Validator::make($request->all(), $rules, $massages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error') ->with( 'typealert', 'danger');
        else:
            $c = Category::find($id);
            $c->section = $request->input('section');
            $c->name = $request->input('name');
            $c->slug = Str::slug($request->input('name'));
            $c->icono = $request->input('icon');
            if($c->save()):
                return back()->with('message', 'Se ha guardo exitosamente')->with('typealert', 'success');
            endif;

        endif;
    }

    public function getCategoryDelete($id){
        $c = Category::find($id);
        if($c->delete()):
            return back()->with('message', 'Se ha eliminado exitosamente')->with('typealert', 'success');
        endif;

    }

}
