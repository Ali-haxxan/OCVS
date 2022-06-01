<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccines extends Model
{
    
    use HasFactory;
    protected $table = 'vaccines';
    protected $fillable = [
        'name',
        'type',
        'diseases_prevent',
        'causes',
        'vaccination_time',
    ];
}
