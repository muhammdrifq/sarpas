<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatCuciTangan extends Model
{
    protected $table = 'alat_cuci_tangans';
    use HasFactory;
    public $guarded = ['id'];
}
