<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $table = 'pages';
    public $primaryKey = 'id';
    public $timestamps = false;
    private $title;
    private $slug;
    private $text;
    private $img;

}
