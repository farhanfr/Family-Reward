<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskDone extends Model
{
    protected $table = 'taskdone';
    protected $fillable = ['child_id','parent_id ','name ','desc','point_task','photo','date_done'];
    public $timestamps= FALSE;
}
