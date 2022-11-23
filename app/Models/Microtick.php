<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Microtick extends Model
{
    protected $table = 'microticks';
    use HasFactory;
    public $guarded = ['id'];
}
