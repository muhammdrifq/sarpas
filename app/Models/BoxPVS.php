<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxPVS extends Model
{
    protected $table = 'box_p_v_s';
    use HasFactory;
    public $guarded = ['id'];
}
