<?php

namespace App\Http\Controllers\Child;

use App\Reward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GetListRewardController extends Controller
{
     public function __invoke()
        {
            $getListRewardChild = Reward::where('child_id','=',Session::get('idChild'))->get();
            return view('child.my_reward',compact('getListRewardChild'));

        }
}
