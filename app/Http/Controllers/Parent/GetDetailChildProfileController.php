<?php

namespace App\Http\Controllers\Parent;

use App\Child;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetDetailChildProfileController extends Controller
{
    public function __invoke($id)
    {
        $getDetailChild = Child::where('id','=',$id)->get();
        return view('parent.update_child_layout',compact('getDetailChild'));
    }
}
