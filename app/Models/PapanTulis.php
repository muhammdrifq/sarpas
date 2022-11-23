<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PapanTulis extends Model
{
    protected $table = 'papan_tulis';
    use HasFactory;
    public $guarded = ['id'];
}
