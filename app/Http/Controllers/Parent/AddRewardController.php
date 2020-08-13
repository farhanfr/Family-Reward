<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Reward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Support\Facades\Session;

class AddRewardController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'child_id'=>$request->input('child_id'),
            'parent_id'=>Session::get('idParent'),
            'name'=>$request->input('name'),
            'desc'=>$request->input('desc'),
            'point'=>$request->input('point'),
            'photo'=>$request->file('photo'),
        ];

        try{
            $this->addReward($data);
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Berhasil menambah reward  '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageSuccessReward'=>'berhasil menambah reward']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Gagal menambah reward '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageFailedReward'=>$exception->getMessage()]);
        }


    }

    private function addReward($data)
    {
        $file = $data['photo'];
        if ($file == null){
             Reward::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>$data['parent_id'],
                'name'=>$data['name'],
                'desc'=>$data['desc'],
                'point'=>$data['point'],
                'photo'=>"noimg.png"
            ]);
        }
        else{
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);

            Reward::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>$data['parent_id'],
                'name'=>$data['name'],
                'desc'=>$data['desc'],
                'point'=>$data['point'],
                'photo'=>$filename
            ]);
        }

    }
}
