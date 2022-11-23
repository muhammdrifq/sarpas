<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figura extends Model
{
    protected $table = 'figuras';
    use HasFactory;
    public $guarded = ['id'];
}
