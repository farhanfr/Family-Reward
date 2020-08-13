<?php

namespace App\Http\Controllers\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingChildController extends Controller
{
    public function getChild()
    {
        return view('parent.list_child');
    }
}
