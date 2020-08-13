<?php

namespace App\Http\Controllers\Parent;

use App\ActivityLog;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class AddMessageController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'child_id'=>$request->input('child_id'),
            'parent_id'=>Session::get('idParent'),
            'message'=>$request->input('message')
        ];

        $dataMessage = Message::where('child_id','=',$data['child_id'])
            ->where('parent_id','=',$data['parent_id'])->first();

        try{
            $this->addMessage($dataMessage,$data);
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Berhasil menerapkan pesan anak',
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageSuccessMsg'=>'berhasil menerapkan pesan']);

        }catch (Exception $exception){
            ActivityLog::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>Session::get('idParent'),
                'activity'=>'Gagal menerapkan pesan anak',
                'date_activity'=>Carbon::now()
            ]);
            return redirect('childlist/detailChild/'.$data['child_id'])->with(['messageFailedMsg'=>$exception->getMessage()]);
        }
    }

    private function addMessage($dataMessage,$data)
    {
        if ($dataMessage == null){
            Message::insert([
                'child_id'=>$data['child_id'],
                'parent_id'=>$data['parent_id'],
                'message'=>$data['message']
            ]);
        }
        else{
            $dataMessage->message=$data['message'];
            $dataMessage->update();
        }

    }
}
