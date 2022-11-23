<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamDinding extends Model
{
    protected $table = 'jam_dindings';
    use HasFactory;
    public $guarded = ['id'];
}
