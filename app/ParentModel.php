<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $table = 'parent';
    protected $fillable = ['name ','no_tlp','menu_id ','username','password','photo'];
    public $timestamps= FALSE;

//    public function menu(){
//        return $this->belongsTo('App\MenuRestaurant','menu_id','id');
//    }
}
