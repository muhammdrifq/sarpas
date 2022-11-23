<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerminalKabel extends Model
{
    protected $table = 'terminal_kabels';
    use HasFactory;
    public $guarded = ['id'];
}
