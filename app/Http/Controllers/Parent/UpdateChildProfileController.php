<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Child;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Exception;

class UpdateChildProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'id'=>$request->input('id'),
            'parent_id'=>Session::get('idParent'),
            'name'=>$request->input('name'),
            'birthday'=>$request->input('birthday'),
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'photo'=>$request->file('photo')
        ];

        try{
            $this->updateChild($data);
            ActivityLog::insert([
                'child_id'=>$data['id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'berhasil perbarui profile anak',
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/getprofilechild/'.$data['id'])->with(['messageSuccessUpdateProfileChild'=>'berhasil perbarui profile anak']);
        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$data['id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Gagal perbarui profile anak',
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/getprofilechild/'.$data['id'])->with(['messageFailedUpdateProfileChild'=>'gagal perbarui profile anak']);
        }
    }

    private function updateChild($data)
    {
        $getDataChild = Child::where('id','=',$data['id'])->first();

        $file = $data['photo'];
        if ($file == ''){
            $getDataChild->parent_id = $data['parent_id'];
            $getDataChild->name = $data['name'];
            $getDataChild->birthday = $data['birthday'];
            $getDataChild->username = $data['username'];
            $getDataChild->password = $data['password'];
            $getDataChild->save();

        }
        else{
            if ($getDataChild->photo != 'noimg.png'){
                File::delete('img/'.$getDataChild->photo);
            }
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);

            $getDataChild->parent_id = $data['parent_id'];
            $getDataChild->name = $data['name'];
            $getDataChild->birthday = $data['birthday'];
            $getDataChild->username = $data['username'];
            $getDataChild->password = $data['password'];
            $getDataChild->photo=$filename;
            $getDataChild->save();
        }
    }
}
