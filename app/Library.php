<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    //
    protected $table = 'library';
    protected $fillable = array('id', 'name', 'file_name','active');
}
