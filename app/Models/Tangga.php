<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tangga extends Model
{
    protected $table = 'tanggas';
    use HasFactory;
    public $guarded = ['id'];
}
