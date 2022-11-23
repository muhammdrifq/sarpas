<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilingCabinet extends Model
{
    protected $table = 'filing_cabinets';
    use HasFactory;
    public $guarded = ['id'];
}
