<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LttGdS extends Model
{
    protected $table = 'ltt_gd_s';
    use HasFactory;
    public $guarded = ['id'];
}
