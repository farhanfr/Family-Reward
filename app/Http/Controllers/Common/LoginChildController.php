<?php

namespace App\Http\Controllers\Common;

use App\Child;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Exception;

class LoginChildController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        try{
            $this->login($data);
            return redirect('/dashboardchild');

        }catch (Exception $exception){
            return redirect('/tologinchild')->with(['messagefailed'=>$exception->getMessage()]);
        }
    }

    private function login($data)
    {
        if ($userChild = Child::where('username','=',$data['username'])->first()){
            if (!Child::where('password','=',$data['password'])->first()){
                throw new Exception('password salah');
            }
            else{
                Session::put('role','child');
                Session::put('idChild',$userChild->id);
                Session::put('name',$userChild->name);
                Session::put('isLogin',TRUE);
            }
        }
        else{
            throw new Exception('username tidak terdaftar');
        }


    }
}
