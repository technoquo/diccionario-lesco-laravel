<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenasFavoritas extends Model
{
    use HasFactory;

    protected $table = "senas_favoritas";
    
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['email','id_sena'];
}
