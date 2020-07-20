<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    public $primaryKey = 'id';
    public $timestamps = false;
    private $text;

    public function getRichTextAttribute(){
        return add_paragraphs(e($this->text));
    }
}
