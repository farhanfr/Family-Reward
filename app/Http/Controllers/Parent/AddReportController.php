<?php

namespace App\Http\Controllers\Parent;

use App\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Exception;

class AddReportController extends Controller
{
    public function __invoke(Request $request)
    {
        $data= [
            'parent_id'=>Session::get('idParent'),
            'title'=>$request->input('title'),
            'desc'=>$request->input('desc'),
            'photo'=>$request->file('photo'),
        ];

        try{
            $this->addReport($data);
            return redirect('toreport')->with(['messageSuccess'=>'berhasil melaporkan masalah']);
        }catch (Exception $exception){
            return redirect('toreport')->with(['messageFailed'=>$exception->getMessage()]);
        }
    }

    private function addReport($data)
    {
        $file = $data['photo'];
        if ($file == ''){
            Report::insert([
                'parent_id'=>$data['parent_id'],
                'title'=>$data['title'],
                'desc'=>$data['desc'],
                'photo'=>"noimg.png",
                'date_post'=>Carbon::now()
            ]);
        }
        else{
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);
            Report::insert([
                'parent_id'=>$data['parent_id'],
                'title'=>$data['title'],
                'desc'=>$data['desc'],
                'photo'=>$filename,
                'date_post'=>Carbon::now()
            ]);
        }
    }
}
