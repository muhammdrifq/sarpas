<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table = 'mesins';
    use HasFactory;
    public $guarded = ['id'];
}
