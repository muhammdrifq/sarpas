<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrawerTroley extends Model
{
    protected $table = 'drawer_troleys';
    use HasFactory;
    public $guarded = ['id'];
}
