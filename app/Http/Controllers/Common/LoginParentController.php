<?php

namespace App\Http\Controllers\Common;

use App\ParentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Session;

class LoginParentController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        try{
            $this->login($data);
            return redirect('/dashboardparent');

        }catch (Exception $exception){
            return redirect('/')->with(['messagefailed'=>$exception->getMessage()]);
        }


    }

    private function login($data)
    {
        if ($userParent = ParentModel::where('username','=',$data['username'])->first()){
            if (!ParentModel::where('password','=',$data['password'])->first()){
                throw new Exception('password salah');
            }
            else{
                Session::put('role','parent');
                Session::put('idParent',$userParent->id);
                Session::put('name',$userParent->name);
                Session::put('isLogin',TRUE);
            }
        }
        else{
            throw new Exception('username tidak terdaftar');
        }


    }
}
