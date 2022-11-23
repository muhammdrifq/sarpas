<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selector extends Model
{
    protected $table = 'selectors';
    use HasFactory;
    public $guarded = ['id'];
}
