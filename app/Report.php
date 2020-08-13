<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $fillable = ['parent_id ','title ','desc ','date_post','photo'];
    public $timestamps= FALSE;
}
