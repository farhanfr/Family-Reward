<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Reward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Exception;

class UpdateRewardController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'id'=>$request->input('id'),
            'child_id'=>$request->input('child_id'),
            'parent_id'=>Session::get('idParent'),
            'name'=>$request->input('name'),
            'desc'=>$request->input('desc'),
            'point'=>$request->input('point'),
            'photo'=>$request->file('photo'),
        ];

        try{
            $this->updateTask($data);
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'berhasil perbarui data reward '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/getdetailreward/'.$data['id'])->with(['messageSuccessDeleteReward'=>'berhasil menghapus reward']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'gagal perbarui data reward '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/getdetailreward/'.$data['id'])->with(['messageFailedDeleteReward'=>$exception->getMessage()]);
        }
    }

    private function updateTask($data)
    {
        $getDataReward = Reward::where('id','=',$data['id'])->first();

        $file = $data['photo'];
        if ($file == null){
            $getDataReward->child_id = $data['child_id'];
            $getDataReward->parent_id = $data['parent_id'];
            $getDataReward->name = $data['name'];
            $getDataReward->desc = $data['desc'];
            $getDataReward->point = $data['point'];
            $getDataReward->save();
        }
        else{
            if ($getDataReward->photo != 'noimg.png'){
                File::delete('img/'.$getDataReward->photo);
            }
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);

            $getDataReward->child_id = $data['child_id'];
            $getDataReward->parent_id = $data['parent_id'];
            $getDataReward->name = $data['name'];
            $getDataReward->desc = $data['desc'];
            $getDataReward->point = $data['point'];
            $getDataReward->photo = $filename;
            $getDataReward->save();
        }

    }
}
