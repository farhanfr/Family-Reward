<?php

namespace App\Http\Controllers\Parent;

use App\Child;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GetChildController extends Controller
{
    public function __invoke()
    {
        $getAllChild = Child::where('parent_id','=',Session::get('idParent'))->get();
        return view('parent.list_child',compact('getAllChild'));
    }
}
