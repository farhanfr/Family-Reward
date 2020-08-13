<?php

namespace App\Http\Controllers\Parent;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetDetailTaskController extends Controller
{
    public function __invoke($id)
    {
        $getData = Task::where('id','=',$id)->get();
        return view('parent/update_task_layout',compact('getData'));
    }
}
