<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Exception;

class AddTaskController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'child_id'=>$request->input('child_id'),
            'parent_id'=>Session::get('idParent'),
            'name'=>$request->input('name'),
            'desc'=>$request->input('desc'),
            'point_task'=>$request->input('point_task'),
            'photo'=>$request->file('photo'),
        ];

        try{
            $this->addTask($data);
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Berhasil menambah tugas '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageSuccess'=>'berhasil menambah tugas']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Gagal menambah reward  '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageFailedReward'=>$exception->getMessage()]);
        }
    }

    private function addTask($data)
    {
        $file = $data['photo'];
        if ($file == null){
            $registerTask = Task::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>$data['parent_id'],
                'name'=>$data['name'],
                'desc'=>$data['desc'],
                'point_task'=>$data['point_task'],
                'photo'=>"noimg.png",
                'date_send'=>Carbon::now()
            ]);
        }
        else{
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);

            $registerTask = Task::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>$data['parent_id'],
                'name'=>$data['name'],
                'desc'=>$data['desc'],
                'point_task'=>$data['point_task'],
                'photo'=>$filename,
                'date_send'=>Carbon::now()
            ]);
        }

    }
}
