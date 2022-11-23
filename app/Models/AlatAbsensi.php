<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatAbsensi extends Model
{
    protected $table = 'alat_absensis';
    use HasFactory;
    public $guarded = ['id'];
}
