<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socket extends Model
{
    protected $table = 'sockets';
    use HasFactory;
    public $guarded = ['id'];
}
