<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Exception;

class UpdateTaskController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'id'=>$request->input('id'),
            'child_id'=>$request->input('child_id'),
            'parent_id'=>Session::get('idParent'),
            'name'=>$request->input('name'),
            'desc'=>$request->input('desc'),
            'point_task'=>$request->input('point_task'),
            'photo'=>$request->file('photo'),
        ];

        try{
            $this->updateTask($data);
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'berhasil perbarui data tugas '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/getdetailtask/'.$data['id'])->with(['messageSuccessUpdateTask'=>'berhasil perbarui data tugas']);
        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'gagal perbarui data tugas '.$data['name'],
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/getdetailtask/'.$data['id'])->with(['messageFailedUpdateTask'=>'gagal perbarui data tugas']);
        }
    }

    private function updateTask($data)
    {
        $getDataTask = Task::where('id','=',$data['id'])->first();

        $file = $data['photo'];
        if ($file == null){
            $getDataTask->child_id = $data['child_id'];
            $getDataTask->parent_id = $data['parent_id'];
            $getDataTask->name = $data['name'];
            $getDataTask->desc = $data['desc'];
            $getDataTask->point_task = $data['point_task'];
            $getDataTask->date_send = Carbon::now();
            $getDataTask->save();
        }
        else{
            if ($getDataTask->photo != 'noimg.png'){
                File::delete('img/'.$getDataTask->photo);
            }
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);

            $getDataTask->child_id = $data['child_id'];
            $getDataTask->parent_id = $data['parent_id'];
            $getDataTask->name = $data['name'];
            $getDataTask->desc = $data['desc'];
            $getDataTask->point_task = $data['point_task'];
            $getDataTask->photo = $filename;
            $getDataTask->date_send = Carbon::now();
            $getDataTask->save();
        }

    }
}
