<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akrilik extends Model
{
    protected $table = 'akriliks';
    use HasFactory;
    public $guarded = ['id'];
}
