<?php

namespace App\Http\Controllers\Parent;

use App\ParentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Exception;

class UpdateProfileParentController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'id'=>$request->input('id'),
            'name'=>$request->input('name'),
            'no_tlp'=>$request->input('no_tlp'),
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'photo'=>$request->file('photo')
        ];

        try{
            $this->updateParent($data);
            return redirect('parentprofile')->with(['messageSuccessUpdateProfile'=>'berhasil perbarui profile']);
        }catch (Exception $exception){
            return redirect('parentprofile')->with(['messageFailedUpdateProfile'=>'gagal perbarui profile']);
        }
    }

    private function updateParent($data)
    {
        $getDataParent = ParentModel::where('id','=',$data['id'])->first();

        $file = $data['photo'];
        if ($file == ''){
            $getDataParent->name = $data['name'];
            $getDataParent->no_tlp = $data['no_tlp'];
            $getDataParent->username = $data['username'];
            $getDataParent->password = $data['password'];
            $getDataParent->save();

        }
        else{
            if ($getDataParent->photo != 'noimg.png'){
                File::delete('img/'.$getDataParent->photo);
            }
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);

            $getDataParent->name = $data['name'];
            $getDataParent->no_tlp = $data['no_tlp'];
            $getDataParent->username = $data['username'];
            $getDataParent->password = $data['password'];
            $getDataParent->photo=$filename;
            $getDataParent->save();
        }
    }
}
