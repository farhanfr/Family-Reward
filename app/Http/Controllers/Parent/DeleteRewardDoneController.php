<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\RewardDone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class DeleteRewardDoneController extends Controller
{
    public function __invoke($id)
    {
        $deleteReward = RewardDone::find($id);

        try{
            $deleteReward->delete();
            ActivityLog::insert([
                'child_id'=>$deleteReward['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'berhasil menghapus reward terambil '.$deleteReward['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$deleteReward->child_id)->with(['messageSuccessDeleteRewardDone'=>'berhasil menghapus item']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$deleteReward['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'gagal menghapus reward terambil '.$deleteReward['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$deleteReward->child_id)->with(['messageFailedDeleteRewardDone'=>'gagal menghapus item']);
        }
    }
}
