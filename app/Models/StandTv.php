<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandTv extends Model
{
    protected $table = 'stand_tvs';
    use HasFactory;
    public $guarded = ['id'];
}
