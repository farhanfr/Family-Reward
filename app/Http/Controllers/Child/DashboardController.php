<?php

namespace App\Http\Controllers\Child;

use App\Message;
use App\Reward;
use App\RewardDone;
use App\Task;
use App\TaskDone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboardChild()
    {
//        $getPoint = Child::where('child_id','=',Session::get('idChild'))->get();
        $taskUndone = Task::where('child_id','=',Session::get('idChild'))->count();
        $taskDone = TaskDone::where('child_id','=',Session::get('idChild'))->count();
        $rewardAvailable = Reward::where('child_id','=',Session::get('idChild'))->count();
        $rewardTake = RewardDone::where('child_id','=',Session::get('idChild'))->count();
        $getMessage = Message::where('child_id','=',Session::get('idChild'))->get();
        return view('child.dashboard_child',compact('getMessage','taskUndone','taskDone','rewardAvailable','rewardTake'));
    }
}
