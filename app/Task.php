<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    protected $fillable = ['child_id','parent_id ','name ','desc','point_task','photo','date_send'];
    public $timestamps= FALSE;
}
