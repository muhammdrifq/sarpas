<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HT extends Model
{
    protected $table = 'h_t_s';
    use HasFactory;
    public $guarded = ['id'];
}
