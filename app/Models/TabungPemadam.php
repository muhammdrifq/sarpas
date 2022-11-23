<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabungPemadam extends Model
{
    protected $table = 'tabung_pemadams';
    use HasFactory;
    public $guarded = ['id'];
}
