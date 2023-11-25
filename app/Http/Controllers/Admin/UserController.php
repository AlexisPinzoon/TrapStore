<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('user.status');

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
}
