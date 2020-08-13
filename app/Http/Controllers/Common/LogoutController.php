<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logoutParent(){
        Session::remove('role');
        Session::remove('idParent');
        Session::remove('name');
        Session::remove('isLogin');
        return redirect('/');
    }

    public function logoutChild(){
        Session::remove('role');
        Session::remove('idChild');
        Session::remove('name');
        Session::remove('isLogin');
        return redirect('tologinchild');
    }
}
