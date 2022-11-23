<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extensen extends Model
{
    protected $table = 'extensens';
    use HasFactory;
    public $guarded = ['id'];
}
