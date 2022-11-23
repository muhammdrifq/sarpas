<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payung extends Model
{
    protected $table = 'payungs';
    use HasFactory;
    public $guarded = ['id'];
}
