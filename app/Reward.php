<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $table = 'reward';
    protected $fillable = ['child_id ','parent_id ','name ','desc','point','photo'];
    public $timestamps= FALSE;
}
