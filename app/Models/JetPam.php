<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JetPam extends Model
{
    protected $table = 'jet_pams';
    use HasFactory;
    public $guarded = ['id'];
}
