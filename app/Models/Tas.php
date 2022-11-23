<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tas extends Model
{
    protected $table = 'tas';
    use HasFactory;
    public $guarded = ['id'];
}
