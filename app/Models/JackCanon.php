<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JackCanon extends Model
{
    protected $table = 'jack_canons';
    use HasFactory;
    public $guarded = ['id'];
}
