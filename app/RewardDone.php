<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RewardDone extends Model
{
    protected $table = 'rewarddone';
    protected $fillable = ['child_id ','parent_id ','name ','desc','point','photo'];
    public $timestamps= FALSE;
}
