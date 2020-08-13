<?php

namespace App\Http\Controllers\Parent;

use App\Child;
use App\Message;
use App\Reward;
use App\Task;
use App\TaskDone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboardParent()
    {
        $taskUndone = Task::where('parent_id','=',Session::get('idParent'))->count();
        $taskDone = TaskDone::where('parent_id','=',Session::get('idParent'))->count();
        $rewardAvailable = Reward::where('parent_id','=',Session::get('idParent'))->count();
        $childCount = Child::where('parent_id','=',Session::get('idParent'))->count();
        $childData = Child::where('parent_id','=',Session::get('idParent'))->get();

        return view('parent.dashboard_parent',compact('taskDone','taskUndone','rewardAvailable','childCount','childData'));
    }


}
