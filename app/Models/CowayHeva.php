<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CowayHeva extends Model
{
    protected $table = 'coway_hevas';
    use HasFactory;
    public $guarded = ['id'];
}
