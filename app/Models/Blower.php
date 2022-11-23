<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blower extends Model
{
    protected $table = 'blowers';
    use HasFactory;
    public $guarded = ['id'];
}
