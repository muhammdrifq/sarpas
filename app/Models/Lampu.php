<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampu extends Model
{
    protected $table = 'lampus';
    use HasFactory;
    public $guarded = ['id'];
}
