<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sofa extends Model
{
    protected $table = 'sofas';
    use HasFactory;
    public $guarded = ['id'];
}
