<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public $primaryKey = 'id';
    public $timestamps = false;
    private $text;
    private $url;

    public function submenus(){
        return $this->hasMany('App\Submenu');
    }
}
