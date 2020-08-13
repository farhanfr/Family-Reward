<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Child;
use App\Http\Controllers\Controller;
use App\Message;
use App\Reward;
use App\RewardDone;
use App\Task;
use App\TaskDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GetDetailChildController extends Controller
{
    public function __invoke($id)
    {
        $getIdChild = 0;
        $getNameChild ="";
        $getDetailChild = Child::where('id','=',$id)->get();
        foreach ($getDetailChild as $getDetailChilds){
            $getIdChild = $getDetailChilds->id;
            $getNameChild = $getDetailChilds->name;
        }
        $getListTask = Task::where('parent_id','=',Session::get('idParent'))->where('child_id','=',$getIdChild)->get();
        $getListReward = Reward::where('parent_id','=',Session::get('idParent'))->where('child_id','=',$getIdChild)->get();
        $getMessageChild = Message::where('child_id','=',$getIdChild)->where('parent_id','=',Session::get('idParent'))->first();
        $getRewardDone = RewardDone::where('parent_id','=',Session::get('idParent'))->where('child_id','=',$getIdChild)->get();
        $getTaskDone = TaskDone::where('parent_id','=',Session::get('idParent'))->where('child_id','=',$getIdChild)->get();
        $getActivityLog = ActivityLog::where('parent_id','=',Session::get('idParent'))->where('child_id','=',$getIdChild)->orderBy('id','DESC')->get();
        return view('parent.control_child',
            compact('getDetailChild','getNameChild','getIdChild','getListTask','getListReward','getMessageChild','getRewardDone','getTaskDone','getActivityLog'));
    }
}
