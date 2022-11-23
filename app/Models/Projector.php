<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projector extends Model
{
    protected $table = 'projectors';
    use HasFactory;
    public $guarded = ['id'];
}
