<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\TaskDone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class DeleteTaskDoneController extends Controller
{
    public function __invoke($id)
    {
        $deleteTask = TaskDone::find($id);

        try{
            $deleteTask->delete();
            ActivityLog::insert([
                'child_id'=>$deleteTask['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'berhasil menghapus tugas selesai '.$deleteTask['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$deleteTask->child_id)->with(['messageSuccessDeleteTaskDone'=>'berhasil menghapus tugas selesai']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$deleteTask['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'gagal menghapus tugas selesai '.$deleteTask['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$deleteTask->child_id)->with(['messageFailedDeleteTaskDone'=>'gagal menghapus tugas selesai']);
        }
    }
}
