<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mic extends Model
{
    protected $table = 'mics';
    use HasFactory;
    public $guarded = ['id'];
}
