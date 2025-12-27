<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;
//vpx_imports
//crudDone
class DataKeyword extends Model
{
    use BaseTrait;
    protected $table = "data_keywords";
    protected $fillable = [
        'name',
        //'serial'
    ];
    //vpx_attach
}
