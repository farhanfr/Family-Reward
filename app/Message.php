<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $fillable = ['child_id','parent_id','message'];
    public $timestamps= FALSE;
}
