<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghancurKertas extends Model
{
    protected $table = 'penghancur_kertas';
    use HasFactory;
    public $guarded = ['id'];
}
