<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basement extends Model
{
    protected $table = 'basements';
    use HasFactory;
    public $guarded = ['id'];
}
