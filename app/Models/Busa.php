<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busa extends Model
{
    protected $table = 'busas';
    use HasFactory;
    public $guarded = ['id'];
}
