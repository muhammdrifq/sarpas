<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RanjangPasien extends Model
{
    protected $table = 'ranjang_pasiens';
    use HasFactory;
    public $guarded = ['id'];
}
