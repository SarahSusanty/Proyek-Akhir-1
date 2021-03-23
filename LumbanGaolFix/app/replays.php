<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replays extends Model
{
    //
    protected $table = "replays";
    protected $fillable = ['idAspiration', 'idUser', 'replay'];
}
