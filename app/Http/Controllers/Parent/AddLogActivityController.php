<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AddLogActivityController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'child_id'=>$request->input('child_id'),
            'parent_id'=>Session::get('idParent'),
            'activity'=>$request->input('activity')
        ];

        $this->addActivity($data);
        return redirect('childlist')->with(['messageSuccess'=>'berhasil menambah anak']);
    }

    private function addActivity($data)
    {
        ActivityLog::insert([
           'child_id'=>$data['child_id'],
           'parent_id'=>$data['parent_id'],
           'activity'=>$data['activity'],
           'date_activity'=>Carbon::now()
        ]);
    }
}
