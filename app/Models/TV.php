<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TV extends Model
{
    protected $table = 't_v_s';
    use HasFactory;
    public $guarded = ['id'];
}
