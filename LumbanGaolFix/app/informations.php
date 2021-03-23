<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class informations extends Model
{
    //
    protected $table = 'informations';
    protected $fillable = ['title', 'content','description', 'idDisplay','idCategory','view'];
}
