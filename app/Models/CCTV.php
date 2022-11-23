<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCTV extends Model
{
    protected $table = 'c_c_t_v_s';
    use HasFactory;
    public $guarded = ['id'];
}
