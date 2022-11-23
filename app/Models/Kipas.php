<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kipas extends Model
{
    protected $table = 'kipas';
    use HasFactory;
    public $guarded = ['id'];
}
