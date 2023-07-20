<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class person_detail extends Model
{
    use HasFactory;

    protected $table = 'person_details';
    
    protected $fillable = [
        'person_id',            
        'answer',
        'answerBy',
    ];

    
    
}
