<?php

namespace App\Http\Controllers\Parent;

use App\ParentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GetDetailParentController extends Controller
{
    public function __invoke()
    {
        $dataParent = ParentModel::where('id','=',Session::get('idParent'))->get();
        return view('parent.profile',compact('dataParent'));
    }
}
