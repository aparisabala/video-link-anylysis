<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;
//vpx_imports
//crudDone
class VideoLink extends Model
{
    use BaseTrait;
    protected $table = "video_links";
    protected $fillable = [
        'name',
        'product_url',
        'image',
        'extension',
        'content',
        'keywords',
        'serial'
    ];
    //vpx_attach
}
