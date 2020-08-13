<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 'child';
    protected $fillable = ['parent_id ','name','birthday ','username','password','child_point','photo'];
    public $timestamps= FALSE;
}
