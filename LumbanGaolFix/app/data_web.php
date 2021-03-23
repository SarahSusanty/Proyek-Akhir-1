<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_web extends Model
{
    //
    protected $table = 'data_web';
    protected $fillable = ['name', 'information','picture', 'type'];
}
