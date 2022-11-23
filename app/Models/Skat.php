<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skat extends Model
{
    protected $table = 'skats';
    use HasFactory;
    public $guarded = ['id'];
}
