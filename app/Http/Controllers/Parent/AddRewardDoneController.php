<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Child;
use App\Reward;
use App\RewardDone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Exception;


class AddRewardDoneController extends Controller
{
    public function __invoke(Request $request,$idReward)
    {
        $getDataReward = Reward::find($idReward);

        $data= [
            'child_id'=>$getDataReward['child_id'],
            'parent_id'=>Session::get('idParent'),
            'name'=>$getDataReward['name'],
            'desc'=>$getDataReward['desc'],
            'point'=>$getDataReward['point'],
            'photo'=>$getDataReward['photo'],
        ];

        $getDataChild = Child::where('parent_id','=',$data['parent_id'])
            ->where('id','=',$data['child_id'])->first();

        if ($getDataChild->child_point < $data['point']){
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageFailedReward'=>'Point masih kurang']);
        }
        $getDataChild->child_point = $getDataChild->child_point - $getDataReward['point'];
        $getDataChild->update();

        try{
            $this->addReward($data);
            $getDataReward->delete();
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Berhasil mengambil reward '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageSuccessReward'=>'berhasil mengambil reward, data dipindahkan ke tabel reward diambil']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'gagal mengambil reward '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageFailedReward'=>$exception->getMessage()]);
        }
    }

    private function addReward($data)
    {
        RewardDone::insert([
            'child_id'=>$data['child_id'],
            'parent_id'=>$data['parent_id'],
            'name'=>$data['name'],
            'desc'=>$data['desc'],
            'point'=>$data['point'],
            'photo'=>$data['photo']
        ]);

    }
}
