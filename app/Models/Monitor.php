<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $table = 'monitors';
    use HasFactory;
    public $guarded = ['id'];
}
