<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baterai extends Model
{
    protected $table = 'baterais';
    use HasFactory;
    public $guarded = ['id'];
}
