<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestObjection extends Model
{
    protected $fillable = [
        'suggest_name',
        'suggest_phone',
        'suggest_email',
        'suggest_desc',
    ];

    use HasFactory;
}
