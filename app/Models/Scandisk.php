<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scandisk extends Model
{
    protected $table = 'scandisks';
    use HasFactory;
    public $guarded = ['id'];
}
