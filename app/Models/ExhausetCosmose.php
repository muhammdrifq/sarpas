<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhausetCosmose extends Model
{
    protected $table = 'exhauset_cosmoses';
    use HasFactory;
    public $guarded = ['id'];
}
