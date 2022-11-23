<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tripod extends Model
{
    protected $table = 'tripods';
    use HasFactory;
    public $guarded = ['id'];
}
