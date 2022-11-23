<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiangTongkat extends Model
{
    protected $table = 'tiang_tongkats';
    use HasFactory;
    public $guarded = ['id'];
}
