<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toa extends Model
{
    protected $table = 'toas';
    use HasFactory;
    public $guarded = ['id'];
}
