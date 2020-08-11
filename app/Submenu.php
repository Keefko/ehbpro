<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $table = 'submenus';
    public $primaryKey = 'id';
    public $timestamps = false;
    public $order;

    public function menu(){
        return  $this->belongsTo('App\Menu');
    }
}
