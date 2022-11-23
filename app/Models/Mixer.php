<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mixer extends Model
{
    protected $table = 'mixers';
    use HasFactory;
    public $guarded = ['id'];
}
