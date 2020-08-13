<?php

namespace App\Http\Controllers\Parent;

use App\Child;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Exception;
use phpDocumentor\Reflection\Types\True_;

class AddChildController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'parent_id'=>Session::get('idParent'),
            'name'=>$request->input('name'),
            'birthday'=>$request->input('birthday'),
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'photo'=>$request->file('photo')
        ];

        try{
            $this->addChild($data);
            return redirect('childlist')->with(['messageSuccess'=>'berhasil menambah anak']);
        }catch (Exception $exception){
            return redirect('childlist')->with(['messageFailed'=>$exception->getMessage()]);
        }

    }

    private function addChild($data)
    {
        $file = $data['photo'];
        if ($file == ''){
            Child::insert([
                'parent_id'=>$data['parent_id'],
                'name'=>$data['name'],
                'birthday'=>$data['birthday'],
                'username'=>$data['username'],
                'password'=>$data['password'],
                'photo'=>"noimg.png",
            ]);
        }
        else{
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);
            Child::insert([
                'parent_id'=>$data['parent_id'],
                'name'=>$data['name'],
                'birthday'=>$data['birthday'],
                'username'=>$data['username'],
                'password'=>$data['password'],
                'photo'=>$filename
            ]);
        }



    }
}
