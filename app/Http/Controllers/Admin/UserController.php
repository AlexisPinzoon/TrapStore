<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');

    }

    public function getUsers($status){
        if($status == 'all'):
            $users = User::orderBy('id', 'Desc')->paginate(50);
        else:
            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(50);
        endif;
        $data = ['users' => $users];
        return view('admin.users.home',$data);
    }

    public function getUserEdit($id, Request $request){
        $u = User::findOrFail($id);
        $data = ['u' => $u];
        return view('admin.users.user_edit',$data);
    }

    public function postUserEdit($id, Request $request){
        $u = User::findOrFail($id);
        $u->role = $request->input('user_type');
        if($request->input('user_type') == "1"):
            if(is_null($u->permissions)):
                $permissions = ['dashboard' => true];
                $permissions = json_encode($permissions);
                $u->permissions = $permissions;
            endif;
        else:
            $u->permissions = null;
        endif;
        if($u->save()):
            if($request->input('user_type')== "1"):
                return redirect('/admin/user/'.$u->id.'/permissions')->with('message', 'El rol se ha actualizado correctamente')->with('typealert', 'success');
            else:
                return back()->with('message', 'El rol se ha actualizado correctamente')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getUserBanned($id){
        $u = User::findOrFail($id);
        if($u->status == "100"):
            $u->status = "0";
            $message = "Usuario activo nuevamente";
        else:
            $u->status = "100";
            $message = "Usuario suspendido exitosamente";
        endif;

        if($u->save()):
            return back()->with('message', $message)->with('typealert', 'success');
        endif;
    }

    public function getUserPermissions($id){
        $u = User::findOrFail($id);
        $data = ['u'=> $u];
        return view('admin.users.user_permissions',$data);

    }

    public function postUserPermissions(Request $request, $id){
        $u = User::findOrFail($id);
        $permissions = ['dashboard' => $request->input('dashboard'),
        $permissions = 'dashboard_stats' => $request->input('dashboard_stats'),
        $permissions = 'dashboard_sell_today' => $request->input('dashboard_sell_today'),
        $permissions = 'products' => $request->input('products'),
        $permissions = 'product_add' => $request->input('product_add'),
        $permissions = 'product_edit' => $request->input('product_edit'),
        $permissions = 'product_delete' => $request->input('product_delete'),
        $permissions = 'product_gallery_add' => $request->input('product_gallery_add'),
        $permissions = 'product_gallery_delete' => $request->input('product_gallery_delete'),
        $permissions = 'categories' => $request->input('categories'),
        $permissions = 'category_add' => $request->input('category_add'),
        $permissions = 'category_edit' => $request->input('category_edit'),
        $permissions = 'category_delete' => $request->input('category_delete'),
        $permissions = 'user_list' => $request->input('user_list'),
        $permissions = 'user_edit' => $request->input('user_edit'),
        $permissions = 'user_banned' => $request->input('user_banned'),
        $permissions = 'user_permissions' => $request->input('user_permissions'),
        ];
        $permissions = json_encode($permissions);
        $u->permissions = $permissions;
        if($u->save()):
            return back()->with('message', 'Permisos actualizados exitosamente')->with('typealert', 'success');
        endif;
    }
}
