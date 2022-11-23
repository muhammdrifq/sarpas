<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebCam extends Model
{
    protected $table = 'web_cams';
    use HasFactory;
    public $guarded = ['id'];
}
