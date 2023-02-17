<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        $login = Session::get('LoggedUser');
        $name = User::where('user_ID','=', $login)->first();
        if($name){
            session()->put('name', $name->user_Email);
            return view('admin.main', [
                'title' => 'Trang Quản Trị Admin',
             ]);
        }else{
            return view('/admin/users/login',[
                'title' => 'Đăng nhập Quản Trị',
            ]);
        }
        
    }
}
