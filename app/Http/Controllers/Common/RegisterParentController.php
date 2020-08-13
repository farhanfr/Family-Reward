<?php

namespace App\Http\Controllers\Common;

use App\ParentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Validator;

class RegisterParentController extends Controller
{
    public function __invoke(Request $request)
    {
        $input =[
            'username'=>$request->input('username')
        ];

        $rules=[
          'username'=>'required|unique:parent'
        ];
        $message=[
          'username.unique'=>'Username sudah dipakai'
        ];

        $validator = Validator::make($input,$rules,$message);

        if ($validator->fails()){
            return redirect('toregisterparent')->with(['errorMessage'=>$validator->errors()->first()]);
        }

        $data= [
            'name'=>$request->input('name'),
            'no_tlp'=>$request->input('no_tlp'),
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
        ];

        try{
            $this->addParent($data);
            return redirect('toregisterparent')->with(['messageSuccessRegister'=>"berhasil registerasi silahkan"]);
        }catch (Exception $exception){
            return redirect('toregisterparent')->with(['messageFailedRegister'=>$exception->getMessage()]);
        }
    }

    private function addParent($data)
    {
        $registerChild = ParentModel::insert([
            'name'=>$data['name'],
            'no_tlp'=>$data['no_tlp'],
            'username'=>$data['username'],
            'password'=>$data['password'],
            'photo'=>'noimg.png'
        ]);

        if (!$registerChild){
           throw new Exception('gagal registerasi');
        }

    }
}
