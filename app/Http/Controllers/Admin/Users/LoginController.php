<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title'=>'Đăng nhập quản trị']);
    }

    public function store(Request $request)
    {
        //message
        $messages = [
            'email.required' => 'Vui lòng nhập email.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ];
        //Validate requests
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],$messages);

        $userInfo = User::where('user_Email','=', $request->email)->Where('user_Password','=', $request->password)->first();
        if(!$userInfo){
            return back()->with('error','Email hoặc mật khẩu không chính xác.');
        }else{
            $request->session()->put('LoggedUser', $userInfo->user_ID);
            if($request->path!=null){
                return redirect($request->path);
            }
            return redirect('/admin');
        }

    }

    public function logout()
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            if(session()->has('name')){
                session()->pull('name');
                return redirect('/admin/users/login');
            }
        }
    }
}
