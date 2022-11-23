<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PABX extends Model
{
    protected $table = 'p_a_b_x_e_s';
    use HasFactory;
    public $guarded = ['id'];
}
