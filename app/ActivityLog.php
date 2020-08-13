<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'log_activity';
    protected $fillable = ['child_id ','parent_id','activity ','date_activity'];
    public $timestamps= FALSE;
}
