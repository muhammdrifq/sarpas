<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UPS extends Model
{
    protected $table = 'u_p_s';
    use HasFactory;
    public $guarded = ['id'];
}
