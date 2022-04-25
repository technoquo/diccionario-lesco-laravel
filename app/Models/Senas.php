<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senas extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['cod_categoria','palabra','video','estado','letra'];    
}
