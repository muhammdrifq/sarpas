<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotakKayu extends Model
{
    protected $table = 'kotak_kayus';
    use HasFactory;
    public $guarded = ['id'];
}
