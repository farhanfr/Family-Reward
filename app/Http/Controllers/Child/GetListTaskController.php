<?php

namespace App\Http\Controllers\Child;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GetListTaskController extends Controller
{
    public function __invoke()
    {
        $getListTaskChild = Task::where('child_id','=',Session::get('idChild'))->get();
        return view('child.my_task',compact('getListTaskChild'));

    }
}
