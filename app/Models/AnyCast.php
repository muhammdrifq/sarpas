<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnyCast extends Model
{
    protected $table = 'any_casts';
    use HasFactory;
    public $guarded = ['id'];
}
