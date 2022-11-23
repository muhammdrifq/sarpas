<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestopSwitch extends Model
{
    protected $table = 'destop_switches';
    use HasFactory;
    public $guarded = ['id'];
}
