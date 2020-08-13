<?php

namespace App\Http\Controllers\Parent;

use App\Reward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetDetailRewardController extends Controller
{
    public function __invoke($id)
    {
        $getData = Reward::where('id','=',$id)->get();
        return view('parent/update_reward_layout',compact('getData'));
    }
}
