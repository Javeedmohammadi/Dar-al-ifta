<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scholars extends Model
{
    use HasFactory;

    protected $table = 'scholars';
    protected $fillable = [        
        'scholar_name',
        'scholar_self_desc',
        'scholar_photo'
    ]; 
    
}
