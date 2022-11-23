<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AC extends Model
{
    protected $table = 'a_c_s';
    use HasFactory;
    public $guarded = ['id'];
}
