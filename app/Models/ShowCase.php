<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowCase extends Model
{
    protected $table = 'show_cases';
    use HasFactory;
    public $guarded = ['id'];
}
