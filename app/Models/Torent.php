<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torent extends Model
{
    protected $table = 'torents';
    use HasFactory;
    public $guarded = ['id'];
}
