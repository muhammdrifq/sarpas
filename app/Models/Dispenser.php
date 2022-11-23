<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispenser extends Model
{
    protected $table = 'dispensers';
    use HasFactory;
    public $guarded = ['id'];
}
