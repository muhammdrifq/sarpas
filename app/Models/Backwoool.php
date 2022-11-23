<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backwoool extends Model
{
    protected $table = 'backwoools';
    use HasFactory;
    public $guarded = ['id'];
}
