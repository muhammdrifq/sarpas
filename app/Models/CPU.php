<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
    protected $table = 'c_p_u_s';
    use HasFactory;
    public $guarded = ['id'];
}
