<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foldable extends Model
{
    protected $table = 'foldables';
    use HasFactory;
    public $guarded = ['id'];
}
