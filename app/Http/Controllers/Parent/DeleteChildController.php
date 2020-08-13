<?php

namespace App\Http\Controllers\Parent;

use App\Child;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class DeleteChildController extends Controller
{
    public function __invoke($id)
    {
        $deleteChild = Child::find($id);

        try{
            $deleteChild->delete();
            return redirect('childlist')->with(['messageSuccessDeleteChild'=>'berhasil menghapus anak']);

        }catch (Exception $exception){
            return redirect('childlist')->with(['messageFailedDeleteChild'=>$exception->getMessage()]);
        }
    }
}
