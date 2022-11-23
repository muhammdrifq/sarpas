<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HDMI extends Model
{
    protected $table = 'h_d_m_i_s';
    use HasFactory;
    public $guarded = ['id'];
}
