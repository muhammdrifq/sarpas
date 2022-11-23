<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backdrop extends Model
{
    protected $table = 'backdrops';
    use HasFactory;
    public $guarded = ['id'];
}
