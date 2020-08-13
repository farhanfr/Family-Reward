<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Reward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Exception;

class DeleteRewardController extends Controller
{
    public function __invoke($id)
    {
        $deleteReward = Reward::find($id);

        try{
            $deleteReward->delete();
            ActivityLog::insert([
                'child_id'=>$deleteReward['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'berhasil menghapus reward '.$deleteReward['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$deleteReward->child_id)->with(['messageSuccessDeleteReward'=>'berhasil menghapus reward']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$deleteReward['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'gagal menghapus reward '.$deleteReward['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$deleteReward->child_id)->with(['messageFailedDeleteReward'=>'gagal menghapus reward']);
        }
    }
}
