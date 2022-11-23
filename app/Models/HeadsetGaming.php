<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadsetGaming extends Model
{
    protected $table = 'headsetgamings';
    use HasFactory;
    public $guarded = ['id'];
}
