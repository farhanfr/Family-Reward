<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class DeleteTaskController extends Controller
{
    public function __invoke($id)
    {
        $deleteTask = Task::find($id);

        try{
            $deleteTask->delete();
            ActivityLog::insert([
                'child_id'=>$deleteTask['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'berhasil menghapus tugas '.$deleteTask['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$deleteTask->child_id)->with(['messageSuccessDeleteTask'=>'berhasil menghapus tugas']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$deleteTask['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'berhasil menghapus tugas '.$deleteTask['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$deleteTask->child_id)->with(['messageFailedDeleteTask'=>'gagal menghapus tugas']);
        }
    }
}
