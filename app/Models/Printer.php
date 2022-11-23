<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $table = 'printers';
    use HasFactory;
    public $guarded = ['id'];
}
