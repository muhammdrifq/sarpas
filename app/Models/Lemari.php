<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lemari extends Model
{
    protected $table = 'lemaris';
    use HasFactory;
    public $guarded = ['id'];
}
