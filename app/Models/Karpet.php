<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karpet extends Model
{
    protected $table = 'karpets';
    use HasFactory;
    public $guarded = ['id'];
}
