<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aspirations extends Model
{
    //
    protected $table = "aspirations";
    protected $fillable = ['idUser', 'topic', 'aspiration','status'];
}
