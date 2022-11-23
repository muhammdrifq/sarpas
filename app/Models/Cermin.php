<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cermin extends Model
{
    protected $table = 'cermins';
    use HasFactory;
    public $guarded = ['id'];
}
