<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayarInfocus extends Model
{
    protected $table = 'layar_infoci';
    use HasFactory;
    public $guarded = ['id'];
}
