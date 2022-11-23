<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Godox extends Model
{
    protected $table = 'godoxes';
    use HasFactory;
    public $guarded = ['id'];
}
