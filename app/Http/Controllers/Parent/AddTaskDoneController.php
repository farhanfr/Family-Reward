<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Child;
use App\Task;
use App\TaskDone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Exception;

class AddTaskDoneController extends Controller
{
    public function __invoke(Request $request,$idTask)
    {
        $getDataTask = Task::find($idTask);

        $data= [
            'child_id'=>$getDataTask['child_id'],
            'parent_id'=>Session::get('idParent'),
            'name'=>$getDataTask['name'],
            'desc'=>$getDataTask['desc'],
            'point_task'=>$getDataTask['point_task'],
            'photo'=>$getDataTask['photo'],
        ];

        $getDataChild = Child::where('parent_id','=',$data['parent_id'])
            ->where('id','=',$data['child_id'])->first();
        $getDataChild->child_point = $getDataChild->child_point + $getDataTask['point_task'];
        $getDataChild->update();


        try{
            $this->addTaskDone($data);
            $getDataTask->delete();
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Berhasil menetapkan selesai tugas '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageSuccessTaskDone'=>'berhasil menetapkan selesai tugas, data dipindahkan ke tabel tugas selesai']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Gagal menetapkan selesai tugas '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageFailedRewardDone'=>$exception->getMessage()]);
        }
    }

    private function addTaskDone($data)
    {
        TaskDone::insert([
            'child_id'=>$data['child_id'],
            'parent_id'=>$data['parent_id'],
            'name'=>$data['name'],
            'desc'=>$data['desc'],
            'point_task'=>$data['point_task'],
            'photo'=>$data['photo'],
            'date_done'=>Carbon::now()
        ]);
    }
}
