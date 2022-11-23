<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    protected $table = 'komputers';
    use HasFactory;
    public $guarded = ['id'];
}
