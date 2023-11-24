<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PGallery;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;




class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome(){
        $products = Product::with(['cat'])->orderBy('id','desc')->paginate(25);
        $data = ['products' => $products];
        return view('admin.products.home',$data);
    }

    public function getProductAdd(){
        $cats = Category::where('section', '0')->pluck('name','id');
        $data = ['cats'=> $cats];
        return view('admin.products.add', $data);
    }

    public function postProductAdd(Request $request){
        $rules = [
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',

        ];

        $messages = [
            'name.required' => 'Ingrese el nombre del producto',
            'img.required' => 'Ingrese la imagen del producto',
            'price.required' => 'Ingrese el precio del producto'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error') ->with( 'typealert', 'danger')->withInput();
        else:
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '',$request->file('img')->getClientOriginalExtension()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$filename;



            $product = new Product;
            $product -> status = '0';
            $product -> name = e($request->input('name'));
            $product -> slug = Str::slug($request->input('name'));
            $product -> category_id = $request->input('category');
            $product -> image = $filename;
            $product -> file_path = date('Y-m-d');
            $product -> price = $request->input('price');
            $product -> in_discount = $request->input('indiscount');
            $product -> discount = $request->input('discount');
            $product -> content = e($request->input('content'));
            if($product->save()):
                if($request -> hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256,256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return redirect('/admin/products')->with('message', 'Se ha guardo exitosamente')->with('typealert', 'success');
            endif;


        endif;
    }

    public function getProductEdit($id){
        $p = Product::findOrFail($id);

        $cats = Category::where('section', '0')->pluck('name','id');
        $data = ['cats'=> $cats, 'p' => $p];
        return view('admin.products.edit', $data);

    }

    public function postProductEdit($id,Request $request){
        $rules = [
            'name' => 'required',
            'price' => 'required',

        ];

        $messages = [
            'name.required' => 'Ingrese el nombre del producto',
            'price.required' => 'Ingrese el precio del producto'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error') ->with( 'typealert', 'danger')->withInput();
        else:
            $product = Product::findOrFail($id);
            $ipp = $product->file_path;
            $ip = $product ->image;
            $product -> status = $request->input('status');
            $product -> name = e($request->input('name'));
            $product -> category_id = $request->input('category');
            if($request -> hasFile('img')):
                $path = '/'.date('Y-m-d');
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '',$request->file('img')->getClientOriginalExtension()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;

                $product -> image = $filename;
                $product -> file_path = date('Y-m-d');
            endif;
            $product -> price = $request->input('price');
            $product -> in_discount = $request->input('indiscount');
            $product -> discount = $request->input('discount');
            $product -> content = e($request->input('content'));
            if($product->save()):
                if($request -> hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256,256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                    unlink($upload_path.'/'.$ipp.'/'.$ip);
                    unlink($upload_path.'/'.$ipp.'/t_'.$ip);

                endif;
                return back()->with('message', 'Se ha actualizado exitosamente')->with('typealert', 'success');
            endif;


        endif;

    }

    public function postProductGalleryAdd($id, Request $request){
        $rules = [
            'file_image' => 'required',


        ];

        $messages = [
            'file_image.required' => 'Ingrese una imagen',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error') ->with( 'typealert', 'danger')->withInput();
        else:
            if($request -> hasFile('file_image')):
                $path = '/'.date('Y-m-d');
                $fileExt = trim($request->file('file_image')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '',$request->file('file_image')->getClientOriginalExtension()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;

                $g = new PGallery;
                $g -> product_id = $id;
                $g -> file_path = date('Y-m-d');
                $g -> file_name = $filename;

                if($g->save()):
                    if($request -> hasFile('file_image')):
                        $fl = $request->file_image->storeAs($path, $filename, 'uploads');
                        $img = Image::make($file_file);
                        $img->fit(256,256, function($constraint){
                            $constraint->upsize();
                        });
                        $img->save($upload_path.'/'.$path.'/t_'.$filename);
                    endif;
                    return back()->with('message', 'Se ha subido exitosamente')->with('typealert', 'success');
                endif;
            endif;
        endif;
    }

    public function getProductGalleryDelete($id, $gid){
        $g = PGallery::findOrFail($gid);
        $path = $g->file_path;
        $file= $g->file_name;
        $upload_path = Config::get('filesystems.disks.uploads.root');
        if($g->product_id != $id){
            return back()->with('message', 'La imagen no se ha podido eliminar')->with('typealert', 'danger');
        }else{
            if($g->delete()):
                unlink($upload_path.'/'.$path.'/'.$file);
                unlink($upload_path.'/'.$path.'/t_'.$file);
                return back()->with('message', 'La imagen se ha eliminado exitosamente')->with('typealert', 'succes');
            endif;
        }
    }
}
