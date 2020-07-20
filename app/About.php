<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    public $primaryKey = 'id';
    public $timestamps = false;
}
