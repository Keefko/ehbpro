<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $table = 'lists';
    public $primaryKey = 'id';
    public $timestamps = false;
    private $title;
}
